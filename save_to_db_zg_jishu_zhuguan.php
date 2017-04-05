<?php
	//技术组组长数据库操作

	require_once "SqlTool.class.php";
	//1.接收从表单zg_caiwuzu_zhuguan_tianxie.php传过来的数据
	
	//
	
	//接收表单主人的id
	$id=$_GET['branch_id'];
	
	//接收填写的各项分数
$a1=$_GET['a1'];
$a2=$_GET['a2'];
$a3=$_GET['a3'];
$a4=$_GET['a4'];
$a5=$_GET['a5'];

$b1=$_GET['b1'];
$b2=$_GET['b2'];
$b3=$_GET['b3'];

$c1=$_GET['c1'];
$c2=$_GET['c2'];
$c3=$_GET['c3'];

$d1=$_GET['d1'];
$d2=$_GET['d2'];
$d3=$_GET['d3'];

$leader_advice=$_GET['leader_advice'];

//$total_score=$a1+$a2+$a3+$a4+$a5+$b1+$b2+$b3+$c1+$c2+$c3+$d1+$d2+$d3;


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


b1=$b1,
b2=$b2,
b3=$b3,

c1=$c1,
c2=$c2,
c3=$c3,

d1=$d1,
d2=$d2,
d3=$d3,

leader_advice=\"$leader_advice\"

		where self_id=$id";
	
	$SqlTool=new SqlTool();
	$res=$SqlTool->execute_dml($sql);
	/*if($res==1){
		echo "保存成功";
	}
	else{
		echo "保存不成功";
	}*/
	if($res){
		//echo "保存成功";
		//echo "ok!";
		$flag=1;
		header("Location: save_or_not_save.php?flag=$flag");
	}
	else{
		//echo "保存不成功";
		//echo "no";
		$flag=0;
		header("Location: save_or_not_save.php?flag=$flag");
	}
	
?>

