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
//var_dump($_GET['check_advice']);
//var_dump(!empty($_GET['temp_id']));
//var_dump(!empty($_GET['check_advice']));
//var_dump((!empty($_GET['temp_id']))&&(!empty($_GET['check_advice'])));
if((!empty($_GET['temp_id']))&&(!empty($_GET['check_advice']))){
	$temp_id=$_GET['temp_id'];
	$check_advice=$_GET['check_advice'];

	//存入数据库
	$sql="select score_tb_name from main_tb where id=$temp_id";//
//	echo "$sql";
	$SqlTool=new SqlTool();
	$res=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res);
	$score_tb_name=$row['score_tb_name'];
	
	$sql="update $score_tb_name set check_advice=\"$check_advice\" where self_id=$temp_id";
	//echo "$sql";
	$res_self=$SqlTool->execute_dml($sql);
	
	/*if($res_self){
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

}else{
	
	//echo "11";
}
?>

</body>
</html>
