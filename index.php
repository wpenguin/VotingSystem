<?php
	require './lib/init.lib.php';
	require 'userislogin.php';
	if($login){
		$page_size1 = 5;
		$res1 = db_query('select count(*) from t_voting_topics');
		if(!$res1){
			exit(mysqli_error());
		}
		$count1 = mysqli_fetch_row($res1);
		$count1 = $count1[0];
		$max_page1 = ceil($count1 / $page_size1);
		$page1 = isset($_GET['page1']) ? intval($_GET['page1']) : 1;
		$page1 = $page1 > $max_page1 ? $max_page1 : $page1;
		$page1 = $page1 < 1 ? 1 : $page1;
		$page_html1 = "<a href='./index.php?page1=1'>首页</a>&nbsp;";
		$page_html1 .= "<a href='./index.php?page1=" . (($page1-1) > 0 ? ($page1-1) : 1)."'>上一页</a>&nbsp;";
		$page_html1 .= "<a href='./index.php?page1=" . (($page1+1) < $max_page1 ? ($page1+1) : $max_page1)."'>下一页</a>&nbsp;";
		$page_html1 .= "<a href='./index.php?page1={$max_page1}'>尾页</a>";
		$lim1 = ($page1-1) * $page_size1;
		$sql = "select * from t_voting_topics limit {$lim1},{$page_size1}";
		$res1 = db_fetch_all($sql);
		
		$page_size2 = 5;
		$res2 = db_query('select count(*) from t_voting_topics');
		if(!$res2){
			exit(mysqli_error());
		}
		$count2 = mysqli_fetch_row($res2);
		$count2 = $count2[0];
		$max_page2 = ceil($count2 / $page_size2);
		$page2 = isset($_GET['page2']) ? intval($_GET['page2']) : 1;
		$page2 = $page2 > $max_page2 ? $max_page2 : $page2;
		$page2 = $page2 < 1 ? 1 : $page2;
		$page_html2 = "<a href='./index.php?page2=1'>首页</a>&nbsp;";
		$page_html2 .= "<a href='./index.php?page2=" . (($page2-1) > 0 ? ($page2-1) : 1)."'>上一页</a>&nbsp;";
		$page_html2 .= "<a href='./index.php?page2=" . (($page2+1) < $max_page2 ? ($page2+1) : $max_page2)."'>下一页</a>&nbsp;";
		$page_html2 .= "<a href='./index.php?page2={$max_page2}'>尾页</a>";
		$lim2 = ($page2-1) * $page_size2;
		$sql = "select * from t_voting_topics limit {$lim2},{$page_size2}";
		$res2 = db_fetch_all($sql);
		
		if(input_get('id1') != null){
			$id1 = input_get('id1');
			$row1 = db_fetch_row("select * from t_voting_topics where id=$id1");
			$rows1 = db_fetch_all("select * from t_voting_options where voteid=$id1");
		}
		
		if(input_get('id2') != null){
			$id2 = input_get('id2');
			$row2 = db_fetch_row("select * from t_voting_topics where id=$id2");
			$rows2 = db_fetch_all("select * from t_voting_options where voteid=$id2");
			$i = 0;
			foreach($rows2 as $r){
				$i += $r['count'];
			}
		}
		
	}
	require 'index_top.php';
	
	require './view/index.html';
		
?>