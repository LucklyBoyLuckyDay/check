   <!DOCTYPE html>
 <html>
 <head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>填写考核意见</title>
	
</head>


<body>
<?php

//1.接收id
$id=$_GET['id'];


?>
<center>


<h3>员工评语</h3>
<?php
	


?>
<form action="yuangong_remark.php" method="get">
<textarea name="self_remark" rows="10px" cols="100px">请填写员工评语</textarea>

<br><br><br><br><br><br>

<input type="submit" value="保存">
</form>
<center>

</body>


<html>

<?php
require_once "SqlTool.class.php";

if(!empty($_GET['self_remark'])){
	
	//3.self_remark
	$self_remark=$_GET['self_remark'];
	//存入数据库
	$sql="select score_tb_name from main_tb where id=$id";//将员工评价存入数据库
	$res=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res);
	$score_tb_name=$row['score_tb_name'];
	
	$sql="update $score_tb_name set self_remark=$self_remark where self_id=$id";
	$res_self=$SqlTool->execute_dml($sql);
	
	if($res_self){
		echo "保存成功";	
	}
	}else{
		echo "保存失败";
	}

}





?>