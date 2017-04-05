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
	require_once "SqlTool.class.php";
	$sql="select position,id,apartment,name from main_tb";
	//echo "$sql";
	$SqlTool=new SqlTool();
	$res_all=$SqlTool->execute_dql($sql);
	$temp_i=0;
	while($row=mysql_fetch_assoc($res_all)){
		//var_dump($row);
		$position=$row['position'];//取职位
		$apartment=$row['apartment'];//取部门
	//	echo "$position";
		if(preg_match('/主管$/',$position)||preg_match('/组长$/',$position)||preg_match('/员工$/',$position)){
			$name=$row['name'];
		//	echo "$name";
			$id=$row['id'];
			$branch_id=$id;
			if($position=="员工"){
				$sql="select check_name,leader from score_relationship_tb where branch =\"$position\" and leader_apartment=\"$apartment\"";
			}else{
				$sql="select check_name,leader from score_relationship_tb where branch =\"$position\"";
			}
			
			//echo $sql."2";
			$res_1=$SqlTool->execute_dql($sql);
			$row=mysql_fetch_assoc($res_1);
			$check_name=$row['check_name'];
			$leader_position=$row['leader'];
			mysql_free_result($res_1);
			
			
			$choice=3;//确定为查看
			$sql="select passive_tb_html from check_table_name where check_name=\"$check_name\" and choice=$choice ";
			$res_2=$SqlTool->execute_dql($sql);
			$row=mysql_fetch_assoc($res_2);
			$passive_tb_html=$row['passive_tb_html'];
			mysql_free_result($res_2);
			

			//模糊处理
			//$sql="select name from main_tb where position=\"$leader_position\"";
			//改为精准处理
			if(($position=="员工")||($leader_position=="副部长")){
				$sql="select name from main_tb where position=\"$leader_position\" and apartment= \"$apartment\"";
			}else{
				
				$sql="select name from main_tb where position=\"$leader_position\"";
			}
			
			//echo "$sql";
			
			$res_3=$SqlTool->execute_dql($sql);
			$row=mysql_fetch_assoc($res_3);
			//var_dump($row);
			$leader_name=$row['name'];
			//echo "$leader_name";
			$branch_name=$name;
			mysql_free_result($res_3);
			
			echo "<a href=\"$passive_tb_html?branch_id=$branch_id&leader_name=$leader_name&branch_name=$branch_name\">$name</a>";
			//echo "$name<br>";
			if(($temp_i+1)%5==0)echo "<br>";
			$temp_i++;
		}
	}
	mysql_free_result($res_all);
?>
 
 </body>
 </html>
