 <!DOCTYPE html>
 <html>
 <head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>填写考核意见</title>
	
</head>
<body>
<?php
require_once "SqlTool.class.php";
//1.接收temp_id
//var_dump($_GET['temp_id']);
//var_dump($_GET['self_remark']);
//var_dump(!empty($_GET['temp_id']));
//var_dump(!empty($_GET['self_remark']));
//var_dump((!empty($_GET['temp_id']))&&(!empty($_GET['self_remark'])));
if((!empty($_GET['temp_id']))&&(!empty($_GET['self_remark']))){
	$temp_id=$_GET['temp_id'];
	$self_remark=$_GET['self_remark'];

	//存入数据库
	$sql="select score_tb_name from main_tb where id=$temp_id";//
	//echo "$sql";
	$SqlTool=new SqlTool();
	$res=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res);
	$score_tb_name=$row['score_tb_name'];
	
	$sql="update $score_tb_name set self_remark=\"$self_remark\" where self_id=$temp_id";
	//echo "$sql";
	$res_self=$SqlTool->execute_dml($sql);
	
	if($res_self){
		//echo "保存成功";	
		$flag=1;
		header("Location: save_or_not_save.php?flag=$flag");
	}else{
		//echo "保存失败";
		$flag=0;
		header("Location: save_or_not_save.php?flag=$flag");
	}

}else{
	
	//echo "11";
}
?>

</body>
</html>
