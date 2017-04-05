   <!DOCTYPE html>
 <html>
 <head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>填写考核意见</title>
	
</head>


<body>
<center>
<?php
//1.接收branch_id
if(!empty($_GET['id'])){
	$id=$_GET['id'];
}
?>


<h3>主管反馈</h3>

<form action="#" method="get">
<textarea name="zhuguan_feedback" rows="10px" cols="100px">请填写主管反馈</textarea>
<?php 
	if(!empty($id)){
		echo "<input type =\"hidden\" name=\"temp_id\" value =\"$id\">";
	}
	
?>

<br><br><br><br><br><br>

<input type="submit" value="保存">
</form>
<center>

</body>


<html>
<?php
require_once "SqlTool.class.php";
//1.
//2.接收zhuguan_feedback
if(!empty($_GET['temp_id'])&&!empty($_GET['zhuguan_feedback'])){
	$temp_id=$_GET['temp_id'];
	$zhuguan_feedback=$_GET['zhuguan_feedback'];

	$sql="select score_tb_name,name,position from main_tb where id = $temp_id";
	$SqlTool=new SqlTool();
	$res_1=$SqlTool->execute_dql($sql);
	if($row=mysql_fetch_assoc($res_1)){
		$id_name=$row['name'];
		$id_position=$row['position'];
		$score_tb_name=$row['score_tb_name'];
	}
	mysql_free_result($res_1);
	//保存到数据库
	$sql = "update $score_tb_name set zhuguan_feedback= \"$zhuguan_feedback\" where self_id=$temp_id";
	$res=$SqlTool->execute_dml($sql);
	/*if($res){
		echo "保存成功";
	}else{
		echo "保存失败";
	}*/
	if($res){
		//echo "保存成功";
		$flag=1;
		header("Location: save_or_not_save.php?flag=$flag");
	}
	else{
		//echo "保存不成功";
		$flag=0;
		header("Location: save_or_not_save.php?flag=$flag");
	}
}
?>