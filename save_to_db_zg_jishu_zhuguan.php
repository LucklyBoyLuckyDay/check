<?php
	//�������鳤���ݿ����

	require_once "SqlTool.class.php";
	//1.���մӱ�zg_caiwuzu_zhuguan_tianxie.php������������
	
	//
	
	//���ձ����˵�id
	$id=$_GET['branch_id'];
	
	//������д�ĸ������
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
	
	//���·������е�����
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
		echo "����ɹ�";
	}
	else{
		echo "���治�ɹ�";
	}*/
	if($res){
		//echo "����ɹ�";
		//echo "ok!";
		$flag=1;
		header("Location: save_or_not_save.php?flag=$flag");
	}
	else{
		//echo "���治�ɹ�";
		//echo "no";
		$flag=0;
		header("Location: save_or_not_save.php?flag=$flag");
	}
	
?>

