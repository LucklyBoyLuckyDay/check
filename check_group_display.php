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
		
	//	echo "$position";
		if(preg_match('/主管$/',$position)||preg_match('/组长$/',$position)||preg_match('/员工$/',$position)){
			$name=$row['name'];
		//	echo "$name";
			$id=$row['id'];			
			echo "<a href=\"check_group_remark.php?id=$id\">$name</a>";
			if(($temp_i+1)%5==0)echo "<br>";
			$temp_i++;
		}	
	}
	mysql_free_result($res_all);
?>
 </body>
 </html>
