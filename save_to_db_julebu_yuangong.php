<?php
	//���ֲ�Ա�����ݿ����

	require_once "SqlTool.class.php";
	//1.���մӱ�julebu_yuangong_tianxie.php������������
	//���ֲ�Ա��
	//
	
	//���ձ����˵�id
	$id=$_GET['id'];
	
	//������д�ĸ������
	

	$a1=$_GET['a1'];
	$a2=$_GET['a2'];
	$a3=$_GET['a3'];
	$a4=$_GET['a4'];

	$b=$_GET['b'];

	$c1=$_GET['c1'];
	$c2=$_GET['c2'];

	$d=$_GET['d'];

	$e=$_GET['e'];
	
	$total_score=$a1+$a2+$a3+$a4+$b+$c1+$c2+$d+$e;
	
	$leader_advice=$_GET['leader_advice'];

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

		b=$b,

		c1=$c1,
		c2=$c2,

		d=$d,

		e=$e,
		
		total_score=$total_score,
		
		leader_advice=\"$leader_advice\"
		where self_id=$id";
	//echo "$sql";
	$SqlTool=new SqlTool();
	$res=$SqlTool->execute_dml($sql);
	//var_dump($res);
	/* if($res==1){
		echo "����ɹ�";
	}
	else{
		echo "���治�ɹ�";
	} */
	if($res){
		//echo "����ɹ�";
		//echo "ok";
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

