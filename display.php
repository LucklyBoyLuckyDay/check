<?php


	require_once "SqlTool.class.php";
	
	
	
//��������
	$branch_id=$_GET['branch_id'];

	$choice=$_GET['choice'];
		
	$id=$_GET['id'];
	var_dump($id);
	var_dump($branch_id);
	var_dump($choice);
		$sql="select name,apartment,position from main_tb where id=$id";
	//	echo "$sql<br>";
		$SqlTool=new SqlTool();
		$res_1=$SqlTool->execute_dql($sql);
		$row=mysql_fetch_assoc($res_1);
		$leader_position=$row['position'];//��ȡ��˾ְλ
		$leader_apartment=$row['apartment'];//��ȡ��˾����
		$leader_name=$row['name'];
		mysql_free_result($res_1);
		
			
		$sql="select name,position from main_tb where id=$branch_id";
	//	echo "$sql<br>";
		$res_2=$SqlTool->execute_dql($sql);
		$row=mysql_fetch_assoc($res_2);
		$branch_position=$row['position'];//��ȡ����ְλ
		$branch_name=$row['name'];
		mysql_free_result($res_2);
		
		$sql="select check_name from score_relationship_tb where leader=\"$leader_position\" and branch=\"$branch_position\" and leader_apartment=\"$leader_apartment\"";
	//	echo "$sql<br>";
		$res_3=$SqlTool->execute_dql($sql);
		if($row=mysql_fetch_assoc($res_3)){
			$check_name=$row['check_name'];//��ȡscore_relationship_tb�е�check_name
		}
		mysql_free_result($res_3);
		
		
		
		
		
	
	
	if(($choice==1)||($choice==3))//��д��鿴���˴�ֱ�
	//{
		$sql="select passive_tb_html from check_table_name where check_name=\"$check_name\" and choice=$choice ";
	//	echo "$sql<br>";
		$res_4=$SqlTool->execute_dql($sql);
		$row=mysql_fetch_assoc($res_4);
		$passive_tb_html=$row['passive_tb_html'];
		
		
	//	echo "$passive_tb_html";
		mysql_free_result($res_4);
		
		//echo $passive_tb_html;
	//echo "{$passive_tb_html}===branch_id=$branch_id&leader_name=$leader_name&branch_name=$branch_name";
		//exit;
		header("Location: $passive_tb_html?branch_id=$branch_id&leader_name=$leader_name&branch_name=$branch_name");
		
	//}
	//if($choice==2)//��д�������
	//{
//	if($choice==2)//��д�������
	//}
	//if($choice==3)//�鿴���˴�ֱ�
	//if($choice==4)//�鿴�������
?>