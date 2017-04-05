 <!DOCTYPE html>
 <html>
 <head>
 	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>网上考核</title>

<style>
a{
	border:0px solid red;
	width:71px;
	position  :relative ;
	/*top :2px;*/
	/*left:20px;*/
	margin-top :20px;
	margin-left :30px;
	display :block ;
	text-align:center ;
	float:left ;
	text-decoration: none;
	
}

body{
		width:600px;
		height:600px;
		border:1px solid #E0EDF7;
		margin:5% auto;
		text-align:center ;
	}

</style>
</head>
<body>
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
?>

<?PHP

	require_once "SqlTool.class.php";
//接收用户的数据
	//1.id
	$id=$_GET['id'];
	//2.choice
	$choice=$_GET['choice'];
	//如果是有下属，则通过id号获取与id号关联的下属名即查询score_relationship_tb
		
	$sql="select position,apartment from main_tb where id=$id";
	$SqlTool=new SqlTool();
	$res_1=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res_1);//取出id的职位和部门
	$position=$row['position'];//取出id的职位
	
	$apartment=$row['apartment'];//取出id的部门
	
	/*echo $position;
	echo $apartment;*/
	mysql_free_result($res_1);
	
	$sql="select branch from score_relationship_tb where leader=\"$position\" and leader_apartment
=\"$apartment\"";
//echo "$sql<br>";
//if(count()
	$res_2=$SqlTool->execute_dql($sql);

//var_dump(mysql_fetch_assoc($res_2));
//var_dump(mysql_fetch_assoc($res_2));
//var_dump(mysql_fetch_assoc($res_2));
//echo "okkkk";
	while($row=mysql_fetch_assoc($res_2)){//取出下属的职位
		$branch=$row['branch'];//取出下属的职位
		//echo "$branch";
		if($branch=="员工"){
			$sql="select name,id from main_tb where position=\"$branch\" and apartment=\"$apartment\"";
			
			//echo "$sql";
		}else{
			if(($branch == '人事主管')&&($apartment != '人事部')&&($position == '部长'))//当为人事主管填写评分时，若上司不为人事部长
			{
				$sql="select name,id from main_tb where position=\"$branch\" and apartment=\"$apartment\"";
			}
			else
			{
				$sql="select name,id from main_tb where position=\"$branch\"";
			//echo "$sql<br>";
			}
		}	
		
		
		//echo "$sql<br>";
		
		//exit;
		$res_3=$SqlTool->execute_dql($sql);
		//$branch_name="";
		//$branch_id="";
		$branch_name=Array();
		$branch_id=Array();
		$i=0;
		
		while($row=mysql_fetch_assoc($res_3))
		{
			
			$branch_name[$i]=$row['name'];
			$branch_id[$i]=$row['id'];
			//echo "$branch_name[$i]"."$branch_id[$i]<br>";
			$i++;
		}
		mysql_free_result($res_3);
		//echo "<br>".count($branch_name);
		for($i=0;$i<count($branch_name);$i++){
			echo "<a href=\"display.php?id=$id&branch_id=$branch_id[$i]&choice=$choice\">$branch_name[$i]</a>	";
			//echo "<br>$i";
			//echo "hah<br>";
			
			
			if(($i+1)%5==0)echo "<br>";
		}
	}
	mysql_free_result($res_2);

?>

</body>
</html>