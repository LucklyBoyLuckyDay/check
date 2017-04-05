 <!DOCTYPE html>
 <html>
 <head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>资产主管考核表</title>
	<style>
		.total_score,.buzhang_advice,.zhuguan_feedback,.check_advice{
			/*border:1px solid blue;
			width :1225px;
			margin-top:80px;*/
			border:1px solid #C2D5E8;
			width :900px;
			margin-top:20px;
		}
		/*.total_score{
			width :1225px;
			margin-top:80px;*/
			border:1px solid red;
			width :1128px;
			margin-top:20px;
		}*/
	</style>
</head>
<?php
	require_once "zichan_by_caiwuzu_zhuguan_chakan.php";
	require_once "zichan_by_anquan_zhuguan_chakan.php";
?>
<?php
require_once "SqlTool.class.php";
//1.接收branch_id
$id=$_GET['branch_id'];
$sql="select apartment,name,score_tb_name,position from main_tb where id=$id";
$SqlTool=new SqlTool();
$res_1=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res_1);
$name=$row['name'];
$position=$row['position'];
$apartment=$row['apartment'];
$score_tb_name=$row['score_tb_name'];
mysql_free_result($res_1);
/*
$sql="select leader from score_relationship_tb where branch=\"$position\" and leader_apartment=\"$apartment\"";
$res_2=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res_2);
$leader=$row['leader'];
mysql_free_result($res_2);

$sql="select name from main_tb where position=\"$leader\" and apartment=\"$apartment\"";
//echo "$sql";
$res_3=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res_3);
$leader_name=$row['name'];
mysql_free_result($res_3);*/
?>
<?php
$sql="select total_score_by_zichan,total_score_by_anquan,buzhang_advice,zhuguan_feedback,check_advice from $score_tb_name where self_id=$id";
$res=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res);
$buzhang_advice=$row['buzhang_advice'];
$zhuguan_feedback=$row['zhuguan_feedback'];
$check_advice=$row['check_advice'];

$total_score_by_zichan=$row['total_score_by_zichan'];
$total_score_by_anquan=$row['total_score_by_anquan'];
mysql_free_result($res);

//将总得分存入数据库
$total_score=$total_score_by_zichan + $total_score_by_anquan + 100;
$sql="update $score_tb_name set total_score=$total_score  where self_id=$id";

$res=$SqlTool->execute_dml($sql);
?>

<body>
<center>
	<div class="total_score">总得分：<?php echo "$total_score";?></div>	
	<div class="buzhang_advice"><h4>部长评语</h4><?php	echo "$buzhang_advice";?></div>
	<div class="zhuguan_feedback"><h4>主管反馈</h4><?php echo "$zhuguan_feedback";?></div>
	<div class="check_advice"><h4>考核组意见</h4><?php	echo "$check_advice";?></div>

</center>
</body>
</html>