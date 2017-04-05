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
if(!empty($_GET['id'])){
	$id=$_GET['id'];


	$sql="select name,apartment from main_tb where id = $id";
	$SqlTool=new SqlTool();
	$res_1=$SqlTool->execute_dql($sql);
	if($row=mysql_fetch_assoc($res_1)){
		$id_name=$row['name'];
		$id_apartment=$row['apartment'];
	}
	mysql_free_result($res_1);
	//先判断点评人是否已经为别人点过了
/*	$sql ="select to_fill from main_tb where id =$id";
	$res=$SqlTool->execute_dql($sql);
	if($row=mysql_fetch_assoc($res))
	{
		$to_fill=$row['to_fill'];
		if(!$to_fill){
			if($id_apartment=="俱乐部"){
				do{
					$rand_num=mt_rand(29,49);
					$sql="select other_filled from main_tb where id = $rand_num";
					$res_2=$SqlTool->execute_dql($sql);
					if($row=mysql_fetch_assoc($res_2)){
						$other_filled=$row['other_filled'];
						if($other_filled==1){//他人评语已经被填写
							continue;
						}
						
					}
					mysql_free_result($res_2);
				}while($rand_num==$id);
			}
			if($id_apartment=="升升活动中心"){
				do{
					$rand_num=mt_rand(53,76);
					$sql="select other_filled from main_tb where id = $rand_num";
					$res_3=$SqlTool->execute_dql($sql);
					if($row=mysql_fetch_assoc($res_3)){
						$other_filled=$row['other_filled'];
						if($other_filled==1){//他人评语已经被填写
							continue;
						}
					}
					mysql_free_result($res_3);
					
				}while($rand_num==$id);
			}
			
			$sql="select name from main_tb where id = $rand_num";
			$res_4=$SqlTool->execute_dql($sql);
			if($row=mysql_fetch_assoc($res_4)){
				
				$branch_name=$row['name'];
			}
			$branch_id=$rand_num;
			mysql_free_result($res_4);
			header("Location: other_and_self_remark_to_do.php?id=$id&branch_id=$branch_id&id_name=$id_name&branch_name=$branch_name");
			//echo "Location: other_and_self_remark_to_do.php?id=$id&branch_id=$branch_id&id_name=$id_name&branch_name=$branch_name";
		}
		else
		{
			//echo "您已经为别人点评过，无需再次点评";
			header("Location: hasFilled.php");
		}
	}*/
	/**
	 *  date：2017/2/13
	 *  1.将俱乐部为他人评价部分去掉，相应代码27行-83行注释掉
	 *  2.直接跳转至填写员工自评
	*/
	//echo "Location: other_and_self_remark_to_do.php?id=$id&id_name=$id_name";
	header("Location: other_and_self_remark_to_do.php?id=$id&id_name=$id_name");
}	
?>
</center>
</body>
</html>

