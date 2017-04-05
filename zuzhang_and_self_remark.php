<?php
/*功能：
综合管理部组员给组长打分，组员为组长点评，组员自评
*/

?>


   <!DOCTYPE html>
 <html>
 <head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>填写考核意见</title>
	
</head>

<body>

<?php
	require_once "SqlTool.class.php";
	$id=$_GET['id'];
	$sql="select name,position from main_tb where id=$id";
	$SqlTool=new SqlTool();
	if($res=$SqlTool->execute_dql($sql)){
		if($row=mysql_fetch_assoc($res)){
			$position=$row['position'];
			$id_name=$row['name'];
			mysql_free_result($res);
			
			$sql="select leader from score_relationship_tb where branch=\"$position\"";
			if($res=$SqlTool->execute_dql($sql)){
				if($row=mysql_fetch_assoc($res)){
					$position=$row['leader'];
					mysql_free_result($res);
					
					$sql="select name,id from main_tb where position=\"$position\"";
					if($res=$SqlTool->execute_dql($sql)){
						if($row=mysql_fetch_assoc($res)){
							$zuzhang_name=$row['name'];
							$zuzhang_id=$row['id'];
						}
					}
				}
			}
		}
	}
?>

<center>


<h3>自我工作反馈</h3>

<form action="save_to_db_zuzhang_and_self_remark.php" method="get">
<?php
echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
echo "<input type=\"hidden\" name=\"zuzhang_id\" value=\"$zuzhang_id\">";
?>
<textarea name="self_remark" rows="10px" cols="100px">请填写自我工作反馈..</textarea>
<br><br>
<!--<?php
	echo "点评人：$id_name     "."被评人：$zuzhang_name";
?>
<br><br>
<textarea name="zuzhang_remark" rows="10px" cols="100px">请填写组长评语</textarea>
<br><br>
组员给组长打分(满分6分)<input type="text" name="zu_zhang_score"/>
-->
<br><br><br><br>

<input type="submit" value="保存">
</form>
<center>

</body>


</html>

