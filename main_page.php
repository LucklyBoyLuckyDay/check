<!DOCTYPE html>
 <html>
 <head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>主页</title>
	<style>
		div{
			
			
			
			
			
		}
		.whole{
			width:50%;
			margin-top:150px;
			position :relative ;
			top :10px;
			border:0px solid red;
		}
		.div_top{
			margin-top:20px;
			border:0px solid green;
			font-size:25px;
			
			
		}
		.div_bottom{
			border:0px solid blue;
			margin-top:20px;
			font-size:25px;
			
			
		}
		a{
			text-decoration:none;
			
		}
		body{
			width:500px;
			height:500px;
			border:1px solid #E0EDF7;
			margin:5% auto;
		}
		.cls_name{
			border:0px solid red;
			margin-top:10%;
			margin-bottom:10%;
		}
		.cls_content{
			border:0px solid blue;
			width:320px;
			text-align:center   ;
			
		}
	
	</style>
</head>
<body>

<?php
	
	//接收用户的数据
	//1.id
	$id=$_GET['id'];
	//2.name
	$name=$_GET['name'];
	
	
?>
<?php
	require_once "SqlTool.class.php";
	$sql="select name,position,apartment from main_tb where id =  $id";
	$SqlTool=new SqlTool();
	$res=$SqlTool->execute_dql($sql);
	if($row=mysql_fetch_assoc($res)){
		$id_name=$row['name'];
		$id_position=$row['position'];
		$id_apartment=$row['apartment'];
		if(preg_match('/员工$/',$id_position)){//各部门员工
			if($id_apartment=="俱乐部"){
				$main_page_display_flag=1;
			}
			if($id_apartment=="升升活动中心"){
				$main_page_display_flag=2;
			}
			if($id_apartment=="综合管理部"){
				$main_page_display_flag=3;
			}
			if($id_apartment=="人事部"){
				if($id_position == "考核组员工")
				{
					$main_page_display_flag=4.1;//考核组员工
				}else{
					$main_page_display_flag=4;//人事部除考核组以外的员工
				}
				
			}		
		}
		
		if(preg_match('/组长$/',$id_position)){
			if($id_apartment=="综合管理部"){
				$main_page_display_flag=5;
/* 				if($id_position=="资产组组长"||$id_position=="安全组组长"){
					$main_page_display_flag=5.1;
				} */
			}
			if($id_apartment=="人事部"){
				$main_page_display_flag=6;
				if($id_position=="考核组组长"){
					$main_page_display_flag=6.1;
				}
			}
		}
		if(preg_match('/主管$/',$id_position)){
			if($id_apartment=="综合管理部"){
				$main_page_display_flag=7;
			}
			if($id_apartment=="俱乐部"){
				$main_page_display_flag=8;
				if($id_position=="人事主管"){
					$main_page_display_flag=8.1;
				}
			}
			if($id_apartment=="升升活动中心"){
				$main_page_display_flag=9;
				if($id_position=="人事主管"){
					$main_page_display_flag=9.1;
				}
			}
		}
		if(preg_match('/部长$/',$id_position)){
			if($id_apartment=="综合管理部"){
				$main_page_display_flag=10;
			}
			if($id_apartment=="人事部"){//人事部部长
				$main_page_display_flag=11;
			}
			if($id_apartment=="俱乐部"){
				$main_page_display_flag=12;
			}
			if($id_apartment=="升升活动中心"){
				$main_page_display_flag=13;
			}
			
		}
		if(preg_match('/副部长$/',$id_position)){
			if($id_apartment=="综合管理部"){
				$main_page_display_flag=14;
			}
			if($id_apartment=="人事部"){//
				$main_page_display_flag=15;
			}
			
			
		}
		
	}
	mysql_free_result($res);
	
$sql="select name from main_tb where id =$id";
	
	$res=$SqlTool->execute_dql($sql);
	if($row=mysql_fetch_assoc($res)){
		$branch_name=$row['name'];
		
	}
	mysql_free_result($res);

//var_dump($main_page_display_flag);
?>
<center>
<?php
	echo "<div class=\"cls_name\">";
	echo "登陆成功  欢迎您!&nbsp;&nbsp;$name<br>";
	echo "</div>";

?>
<?php
	echo "<div class=\"cls_content\">";
?>
<?php
//var_dump($main_page_display_flag);
	if($main_page_display_flag==1||$main_page_display_flag==2){//俱乐部员工或者升升员工
		echo "<a href=\"other_and_self_remark.php?id=$id\">填写自我工作反馈</a><br><br>";
		
		echo "<a href=\"self_chakan.php?id=$id&choice=3\">查看本人考核表</a><br><br>";
	}
	if($main_page_display_flag==3){//综合管理部员工
		echo "<a href=\"zuzhang_and_self_remark.php?id=$id\">填写自我工作反馈</a><br><br>";	
		
		echo "<a href=\"self_chakan.php?id=$id&choice=3\">查看本人考核表</a><br><br>";
	}
	if($main_page_display_flag ==4.1)//人事部考核组员工员工
	{
		echo "<a href=\"self_remark.php?id=$id\">填写自我工作反馈</a><br><br>";			
		echo "<a href=\"self_chakan.php?id=$id&choice=3\">查看本人考核表</a><br><br>";	
		echo "<a href=\"all_chakan.php?id=$id&choice=3\">查看所有人考核表</a><br><br>";		
		echo "<a href=\"isFilled.php\">查看考核表填写进度</a><br><br>";
		echo "<a href=\"check_result.php\">查看本次考核结果</a><br><br>";
	}
	if($main_page_display_flag==4){//人事部员工
		echo "<a href=\"self_remark.php?id=$id\">填写自我工作反馈</a><br><br>";	
		
		echo "<a href=\"self_chakan.php?id=$id&choice=3\">查看本人考核表</a><br><br>";
	}
	
	//综管认人事的主管意见放到打分表中填
 	if($main_page_display_flag==5){//综合管理部组长
		echo "<a href=\"getBranchById.php?id=$id&choice=1\">填写员工考核表</a><br><br>";
		//echo "<a href=\"zg_zhuguan_random.php?id=$id\">填写随机人员意见及评分</a><br><br>";
		echo "<a href=\"zhuguan_feedback.php?id=$id\">填写主管反馈</a><br><br>";
		
		echo "<a href=\"getBranchById.php?id=$id&choice=3\">查看员工考核表</a><br><br>";
		
		echo "<a href=\"self_chakan.php?id=$id&choice=3\">查看本人考核表</a><br><br>";
	}
/* 	if($main_page_display_flag==5.1){//资产组长或者安全组长
		
		echo "<a href=\"zg_zhuguan_random.php?id=$id\">填写随机人员意见及评分</a><br><br>";
		echo "<a href=\"zhuguan_feedback.php?id=$id\">填写主管反馈</a><br><br>";
		echo "<a href=\"getBranchById.php?id=$id&choice=3\">查看员工考核表</a><br><br>";
		echo "<a href=\"self_chakan.php?id=$id&choice=3\">查看本人考核表</a><br><br>";

	} */
	if($main_page_display_flag==6){//人事部组长
		echo "<a href=\"getBranchById.php?id=$id&choice=1\">填写员工考核表</a><br><br>";
		echo "<a href=\"zhuguan_feedback.php?id=$id\">填写主管反馈</a><br><br>";
		echo "<a href=\"getBranchById.php?id=$id&choice=3\">查看员工考核表</a><br><br>";
		echo "<a href=\"self_chakan.php?id=$id&choice=3\">查看本人考核表</a><br><br>";
	}
	if($main_page_display_flag==6.1){//考核组组长
		echo "<a href=\"getBranchById.php?id=$id&choice=1\">填写员工考核表</a><br><br>";
		echo "<a href=\"zhuguan_feedback.php?id=$id\">填写主管反馈</a><br><br>";
		echo "<a href=\"check_group_display.php?id=$id&choice=3\">填写考核组意见</a><br><br>";
		echo "<a href=\"getBranchById.php?id=$id&choice=3\">查看员工考核表</a><br><br>";
		echo "<a href=\"self_chakan.php?id=$id&choice=3\">查看本人考核表</a><br><br>";
		
		echo "<a href=\"all_chakan.php?id=$id&choice=3\">查看所有人考核表</a><br><br>";
	}
	 
	if($main_page_display_flag==7){//综管的人事主管
		echo "<a href=\"zhuguan_feedback.php?id=$id\">填写主管反馈</a><br><br>";
		echo "<a href=\"self_chakan.php?id=$id&choice=3\">查看本人考核表</a><br><br>";
		echo "<a href=\"isFilled.php\">查看考核表填写进度</a><br><br>";
	}
	
	if($main_page_display_flag==8||$main_page_display_flag==9){//资产主管
		//
		echo "<a href=\"zhuguan_feedback.php?id=$id\">填写主管反馈</a><br><br>";
		echo "<a href=\"self_chakan.php?id=$id&choice=3\">查看本人考核表</a><br><br>";
	}
	if($main_page_display_flag==8.1||$main_page_display_flag==9.1){//俱乐部or升升人事主管
		echo "<a href=\"getBranchById.php?id=$id&choice=1\">填写员工考核表</a><br><br>";
		echo "<a href=\"zhuguan_feedback.php?id=$id\">填写主管反馈</a><br><br>";
		echo "<a href=\"getBranchById.php?id=$id&choice=3\">查看员工考核表</a><br><br>";
		echo "<a href=\"self_chakan.php?id=$id&choice=3\">查看本人考核表</a><br><br>";
		echo "<a href=\"isFilled.php\">查看考核表填写进度</a><br><br>";
	}
	if(($main_page_display_flag==10)||($main_page_display_flag==13)||($main_page_display_flag==12)){//综合管理部、升升、俱乐部部长
		echo "<a href=\"buzhang_advice_display.php?id=$id\">填写部长意见</a><br><br>";
		echo "<a href=\"all_chakan.php?id=$id&choice=3\">查看所有人考核表</a><br><br>";
		
		//考核系统内容扩展
		// date:9:15 2016/12/13
		echo "<a href=\"getBranchById.php?id=$id&choice=1\">填写各部门人事主管考核表</a><br><br>";
		echo "<a href=\"getBranchById.php?id=$id&choice=3\">查看各部门人事主管考核表</a><br><br>";
		
		
	}
	if($main_page_display_flag==11){//人事部部长
		echo "<a href=\"buzhang_advice_display.php?id=$id\">填写部长意见</a><br><br>";
		echo "<a href=\"getBranchById.php?id=$id&choice=1\">填写各部门人事主管考核表</a><br><br>";
		echo "<a href=\"getBranchById.php?id=$id&choice=3\">查看各部门人事主管考核表</a><br><br>";
		echo "<a href=\"all_chakan.php?id=$id&choice=3\">查看所有人考核表</a><br><br>";
	}
	if(($main_page_display_flag==14)||($main_page_display_flag==15)){//综合管理部、人事部副部长
		echo "<a href=\"getBranchById.php?id=$id&choice=1\">填写本部门各组长考核表</a><br><br>";
		echo "<a href=\"getBranchById.php?id=$id&choice=3\">查看本部门各组长考核表</a><br><br>";
	}
	
	if($main_page_display_flag==6.1){
		echo "<a href=\"isFilled.php\">查看考核表填写进度</a><br><br>";
		echo "<a href=\"check_result.php\">查看本次考核结果</a><br><br>";
		echo "<a href=\"./extend/downloadCheckResult/download2.php\">下载本次考核记录</a><br><br>";
	}
	
?>
<?php
	echo "</div>";


?>

</center>
</body>

</html>





