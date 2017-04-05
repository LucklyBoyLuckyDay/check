<!DOCTYPE html>
 <html>
 <head>
 	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>组长互评</title>
</head>
<body>
<center>

<?php
//1.接收消息
$id=$_GET['id'];
$zg_zhuguan_random_id=$_GET['zg_zhuguan_random_id'];
$id_name=$_GET['id_name'];
$zg_zhuguan_random_name=$_GET['zg_zhuguan_random_name'];
?>
<h3>组长互评</h3>

<form action="save_to_db_zg_zhuguan_random.php" method="get">
<?php
	echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
	echo "<input type=\"hidden\" name=\"zg_zhuguan_random_id\" value=\"$zg_zhuguan_random_id\">";
?>

<?php
	echo "点评人：$id_name     "."被评人：$zg_zhuguan_random_name";
?>
<br><br>
<textarea name="zg_zhuguan_random_remark" rows="10px" cols="100px">请填写组长评语</textarea>
<br><br>
组长打分(满分4分)<input type="text" name="zg_zhuguan_random_score"/>
<br><br>


<br><br><br><br><br><br>

<input type="submit" value="保存">
</form>
<center>

</body>
</html>
