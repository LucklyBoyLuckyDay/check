 <!DOCTYPE html>
 <html>
 <head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>填写考核意见</title>
	
</head>


<body>
<center>
<?php
require_once "SqlTool.class.php";

$id=$_GET['id'];

?>


<h3>自我工作反馈</h3>
<?php
	


?>
<form action="save_to_db_self_remark.php" method="get">
<?php
echo "<input type=\"hidden\" name=\"temp_id\" value=\"$id\"/> ";
?>
<textarea name="self_remark" rows="10px" cols="100px">请填写自我工作反馈..</textarea>
<br><br><br><br><br><br>

<input type="submit" value="保存">
</form>
<center>

</body>

<html>
