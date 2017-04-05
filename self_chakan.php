 <?php
 require_once "SqlTool.class.php";
 
 //接收数据
 $id=$_GET['id'];
 $choice=$_GET['choice'];
 $sql="select position,apartment,name from main_tb where id = $id";
 $SqlTool=new SqlTool();
$res=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res);
$position=$row['position'];
$apartment=$row['apartment'];
$name=$row['name'];

if($position=="员工"){
	$sql="select check_name,leader from score_relationship_tb where branch = \"$position\" and leader_apartment = \"$apartment\"";
}else{
	$sql="select check_name,leader from score_relationship_tb where branch = \"$position\"";	
}
//echo "$sql";

$res=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res);
$check_name=$row['check_name'];
$leader_position=$row['leader'];

$sql="select passive_tb_html from check_table_name where check_name=\"$check_name\" and choice=$choice";
$res=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res);
$passive_tb_html=$row['passive_tb_html'];

$branch_id=$id;
$branch_name=$name;

//模糊处理
$sql="select name from main_tb where position=\"$leader_position\" and apartment=\"$apartment\"";
$res=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res);
$leader_name=$row['name'];


header("Location: $passive_tb_html?branch_id=$branch_id&leader_name=$leader_name&branch_name=$branch_name");
 
 ?>