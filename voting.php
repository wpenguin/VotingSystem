<?php
	require './lib/init.lib.php';
	
	$vid = input_post('vid');
	$id = input_post('a');
	$code = input_post('code');
	
	session_start();
	
	if(empty($_SESSION['captcha_code'])){
		echo "<script>
			alert('验证码过期！');
			location.href = 'index.php?id1=$vid';
			</script>";
	} elseif(strtolower($code) != strtolower($_SESSION['captcha_code'])) {
		echo "<script>
			alert('验证码错误！');
			location.href = 'index.php?id1=$vid';
			</script>";
	} else {
		$count = db_fetch_column("select count from t_voting_options where id=$id");
		db_query("update t_voting_options set count=$count+1 where id=$id");
		echo "<script>
			alert('投票成功！');
			location.href = 'index.php?id2=$vid';
			</script>";
	}
	unset($_SESSION['captcha_code']);
?>