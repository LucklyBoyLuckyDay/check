   <!DOCTYPE html>
 <html>
 <head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>填写考核意见</title>
	
</head>


<body>
<center>


<h3>考核组评语</h3>
<?php
//1.接收id	
if(!empty($_GET['id'])){
	$id=$_GET['id'];
}
?>
<form action="save_to_db_check_group_remark.php" method="get">
<?php 
	//if(!empty($id)){
		echo "<input type=\"hidden\" name=\"temp_id\" value=\"$id\"/>";
	//}
	
?>
<textarea name="check_advice" rows="10px" cols="100px">请填写考核组评语</textarea>

<br><br><br><br><br><br>

<input type="submit" value="保存">
</form>
<center>

</body>
<html>

