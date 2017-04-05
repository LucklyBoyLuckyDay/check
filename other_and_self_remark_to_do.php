 <!DOCTYPE html>
 <html>
 <head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>填写考核意见</title>
	
</head>
<body>
<center>
<!--<h3>他人与自己评语</h3>-->
<h3>员工自评</h3>
<?php
	//接收信息
	//$branch_id=$_GET['branch_id'];
	$id=$_GET['id'];
	$id_name=$_GET['id_name'];
	//$branch_name=$_GET['branch_name'];
	
?>
<form action="save_to_db_other_and_self_remark.php" method="get">
<?php
	//echo "<input type=\"hidden\" name=\"temp_branch_id\" value=\"$branch_id\"/> ";
	echo "<input type=\"hidden\" name=\"temp_id\" value=\"$id\"/> ";
?>
<textarea name="self_remark" rows="10px" cols="100px">请填写员工评语</textarea>
<br><br><br>
<!--
<?php
	echo "点评人：$id_name     "."被评人：$branch_name"."<br>";
?>

<textarea name="other_remark" rows="10px" cols="100px">请填写他人评语</textarea>
-->
<br><br>

<input type="submit" value="保存">
</form>
</center>

</body>

<html>
