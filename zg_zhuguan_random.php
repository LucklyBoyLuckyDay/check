<!DOCTYPE html>
 <html>
 <head>
 	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>组长互评</title>
</head>
<body>
<center>
<?php
 require_once "SqlTool.class.php";
//1.接收id
$id=$_GET['id'];
$sql="select name from main_tb where id = $id";
$SqlTool=new SqlTool();
$res=$SqlTool->execute_dql($sql);
if($row=mysql_fetch_assoc($res)){
	$id_name=$row['name'];	
}
//先判断点评人是否已经为别人点过了
$sql ="select to_fill from main_tb where id =$id";
$res=$SqlTool->execute_dql($sql);
if($row=mysql_fetch_assoc($res)){
	$to_fill=$row['to_fill'];
	if(!$to_fill){
		do{
			$rand_num=mt_rand(0,5);
			switch($rand_num){
				case 0:$temp_id=15;break;
				case 1:$temp_id=17;break;
				case 2:$temp_id=18;break;
				case 3:$temp_id=19;break;
				case 4:$temp_id=21;break;
				case 5:$temp_id=23;break;		
			}
			$sql="select other_filled from main_tb where id = $temp_id";
			//$SqlTool=new SqlTool();
			$res=$SqlTool->execute_dql($sql);
			if($row=mysql_fetch_assoc($res)){
				$other_filled=$row['other_filled'];
				if($other_filled==1){//他人评语已经被填写
					continue;
				}
			}
		}while($temp_id==$id);

		$zg_zhuguan_random_id=$temp_id;
		$sql="select name from main_tb where id = $zg_zhuguan_random_id";
		//$SqlTool=new SqlTool();
		$res=$SqlTool->execute_dql($sql);
		if($row=mysql_fetch_assoc($res)){
			$zg_zhuguan_random_name=$row['name'];	
		}
		//echo "Location: zg_zhuguan_random_to_do.php?id=$id&zg_zhuguan_random_id=$zg_zhuguan_random_id&id_name=$id_name&zg_zhuguan_random_name=$zg_zhuguan_random_name";
		header("Location: zg_zhuguan_random_to_do.php?id=$id&zg_zhuguan_random_id=$zg_zhuguan_random_id&id_name=$id_name&zg_zhuguan_random_name=$zg_zhuguan_random_name");
	}
	else
	{
		//echo "您已经为别人点评过，无需再次点评";
		header("Location: hasFilled.php");
	}
}


?>