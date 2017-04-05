<?php
	//人事部综管员工数据库操作

	require_once "SqlTool.class.php";
	//1.接收从表单ren_zong_yuangong_tianxie.php传过来的数据
	//人事部综管员工
	//
	
	//接收表单主人的id
	$id=$_GET['id'];
	
	//接收填写的各项分数
	
$a1=$_GET['a1'];
$a2=$_GET['a2'];
$a3=$_GET['a3'];
$a4=$_GET['a4'];
$a5=$_GET['a5'];
$a6=$_GET['a6'];
$a7=$_GET['a7'];

$b1=$_GET['b1'];
$b2=$_GET['b2'];
$b3=$_GET['b3'];
$b4=$_GET['b4'];

$c1=$_GET['c1'];
$c2=$_GET['c2'];
$c3=$_GET['c3'];

$d1=$_GET['d1'];
$d2=$_GET['d2'];
$d3=$_GET['d3'];

$e1=$_GET['e1'];
$e2=$_GET['e2'];
$e3=$_GET['e3'];

$f=$_GET['f'];

$g=$_GET['g'];

$h=$_GET['h'];

$i=$_GET['i'];

$j=$_GET['j'];

$k=$_GET['k'];

$l=$_GET['l'];

//计算总得分
//$total_score=$a1+$a2+$a3+$a4+$a5+$a6+$a7+$b1+$b2+$b3+$b4+$c1+$c2+$c3+$d1+$d2+$d3+$e1+$e2+$e3+$f+$g+$h+$i+$j+$k+$l;
$total_score=$a7+$b4+$c3+$d3+$e3+$f+$g+$h+$i+$j+$k+$l;
$zhuguan_remark=$_GET['zhuguan_remark'];

	$sql="select score_tb_name from main_tb where id=$id ";
	$SqlTool=new SqlTool();
	$res_1=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res_1);
	$score_tb_name=$row['score_tb_name'];
	mysql_free_result($res_1);
	
	//更新分数表中的数据
	$sql="update $score_tb_name set 
a1=$a1,
a2=$a2,
a3=$a3,
a4=$a4,
a5=$a5,
a6=$a6,
a7=$a7,

b1=$b1,
b2=$b2,
b3=$b3,
b4=$b4,

c1=$c1,
c2=$c2,
c3=$c3,

d1=$d1,
d2=$d2,
d3=$d3,

e1=$e1,
e2=$e2,
e3=$e3,

f=$f,

g=$g,

h=$h,

i=$i,

j=$j,

k=$k,

l=$l,

total_score=$total_score,

zhuguan_remark=\"$zhuguan_remark\"

where self_id=$id";
	
	//echo "$sql";
	$SqlTool=new SqlTool();
	$res=$SqlTool->execute_dml($sql);
	if($res==1){
		//echo "保存成功";
		$flag=1;
		header("Location: save_or_not_save.php?flag=$flag");
	}
	else{
		//echo "保存不成功";
		$flag=0;
		header("Location: save_or_not_save.php?flag=$flag");
	}
	
?>