<?php
	require './lib/init.lib.php';
	$title = input_post('title');
	$max = input_post('max');
	$count = input_post('count');
	$options = $_POST['option'];
	db_query("insert into t_voting_topics(title,max_check,count) values('$title',$max,$count)");
	$id = db_fetch_column("select id from t_voting_topics where title='$title' and max_check=$max and count=$count");
	foreach($options as $option){
		$a = $option;
		db_query("insert into `t_voting_options`(`option`,`voteid`) values('$a',$id)");
	}
	echo "<script>
		alert('添加成功！');
		history.back(-1);
		</script>";
?>