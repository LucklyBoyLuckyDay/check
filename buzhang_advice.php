   <!DOCTYPE html>
 <html>
 <head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>填写考核意见</title>
	
</head>


<body>
<center>


<h3>部长评语</h3>
<?php
//1.接收branch_id
if(!empty($_GET['branch_id'])){
	$branch_id=$_GET['branch_id'];
}
?>
<form action="buzhang_advice.php" method="get">

<?php 
	if(!empty($branch_id)){
		echo "<input type =\"hidden\" name=\"temp_id\" value =\"$branch_id\">";
	}
	
?>

<textarea name="buzhang_advice" rows="10px" cols="100px">请填写部长评语</textarea>

<br><br><br><br><br><br>

<input type="submit" value="保存">
</form>
</center>

</body>


<html>
<center>
<?php
require_once "SqlTool.class.php";
//1.接收temp_id
//var_dump($_GET['buzhang_advice']);
//var_dump($_GET['temp_id']);
if(!empty($_GET['temp_id'])&&!empty($_GET['buzhang_advice'])){
	$temp_id=$_GET['temp_id'];
	$buzhang_advice=$_GET['buzhang_advice'];
	
	$sql="select score_tb_name from main_tb where id=$temp_id";
	$SqlTool=new SqlTool();
	$res_1=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res_1);
	$score_tb_name=$row['score_tb_name'];
	mysql_free_result($res_1);
	
	$sql="update $score_tb_name set buzhang_advice=\"$buzhang_advice\" where self_id=$temp_id";
	echo "$sql";
	$res_self=$SqlTool->execute_dml($sql);
	/*if($res_self==1){
		echo "保存成功";	
	}else{
		echo "保存失败";
	}*/
	if($res_self){
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
</center>