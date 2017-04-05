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
 //1.接收数据
$id = $_GET['id'];
$sql = "select apartment from main_tb where id=$id";
$SqlTool=new SqlTool();
$res=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res);
$apartment=$row['apartment'];//取出id的部门
mysql_free_result($res);

$sql="select id,name,position from main_tb where apartment=\"$apartment\"";
$res_1=$SqlTool->execute_dql($sql);
while($row=mysql_fetch_assoc($res_1)){
	$position=$row['position'];
	if(preg_match('/主管$/',$position)||preg_match('/组长$/',$position)||preg_match('/员工$/',$position)){
		$name=$row['name'];
		//echo "$name";
		$branch_id=$row['id'];
		echo "<a href=\"buzhang_advice.php?branch_id=$branch_id\">$name</a>";
	}
}
mysql_free_result($res_1);
 ?>	
 
  </body>
 </html>