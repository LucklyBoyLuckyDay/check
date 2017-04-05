<?php
	//资产主管数据库操作

	require_once "SqlTool.class.php";
	//1.接收从表单zichan_zhuguan_by_caiwu_zhuguan_tianxie.php传过来的数据
	
	//
	
	//接收表单主人的id
	$id=$_GET['id'];
	
	//接收填写的各项分数
	
//caiwu表单
	$a1=$_GET['a1'];
$a2=$_GET['a2'];
$a3=$_GET['a3'];
$a4=$_GET['a4'];
$a5=$_GET['a5'];
$a6=$_GET['a6'];
$a7=$_GET['a7'];
$a8=$_GET['a8'];

$b1=$_GET['b1'];
$b2=$_GET['b2'];
$b3=$_GET['b3'];
$b4=$_GET['b4'];
$b5=$_GET['b5'];

$c1=$_GET['c1'];
$c2=$_GET['c2'];
$c3=$_GET['c3'];
$c4=$_GET['c4'];
$c5=$_GET['c5'];
$c6=$_GET['c6'];
$c7=$_GET['c7'];
$c8=$_GET['c8'];


$d1=$_GET['d1'];
$d2=$_GET['d2'];
$d3=$_GET['d3'];
$d4=$_GET['d4'];
$d5=$_GET['d5'];
/*
$e=$_GET['e'];

$f=$_GET['f'];

$g=$_GET['g'];

$h=$_GET['h'];
*/
$leader_advice_by_zichan=$_GET['leader_advice_by_zichan'];
//http://localhost/kaohe_web/huizong07/save_to_db_zichan_zhuguan_score_by_caiwu.php?id=27&a1=1&c1=--&a2=1&c2=--&a3=1&c3=--&a4=1&c4=--&a5=1&c5=--&a6=1&c6=--&a7=1&c7=--&a8=1&c8=--&b1=1&d1=--&b2=1&d2=--&b3=1&d3=--&b4=1&d4=--&b5=1&d5=--&leader_advice_by_zichan=请填写上级评价请填写上级评价请填写上级评价张家伟
$total_score_by_zichan=$a1+$a2+$a3+$a4+$a5+$a6+$a7+$a8+$b1+$b2+$b3+$b4+$b5;

	$sql="select score_tb_name from main_tb where id=$id ";
	$SqlTool=new SqlTool();
	$res=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res);
	$score_tb_name=$row['score_tb_name'];
	mysql_free_result($res);
	
	//更新分数表中的数据
	$sql="update $score_tb_name set 
		a1=$a1,
a2=$a2,
a3=$a3,
a4=$a4,
a5=$a5,
a6=$a6,
a7=$a7,
a8=$a8,

b1=$b1,
b2=$b2,
b3=$b3,
b4=$b4,
b5=$b5,

c1=\"$c1\",
c2=\"$c2\",
c3=\"$c3\",
c4=\"$c4\",
c5=\"$c5\",
c6=\"$c6\",
c7=\"$c7\",
c8=\"$c8\",


d1=\"$d1\",
d2=\"$d2\",
d3=\"$d3\",
d4=\"$d4\",
d5=\"$d5\",

total_score_by_zichan=$total_score_by_zichan,

leader_advice_by_zichan=\"$leader_advice_by_zichan\"


		where self_id=$id";
	
	$SqlTool=new SqlTool();
	$res=$SqlTool->execute_dml($sql);
	if($res==1){
		//echo "保存成功";
		echo "ok";
	}
	else{
		//echo "保存不成功";
		echo "no";
	}
	
?>

