<?php

//���ܣ��۹ܵ�Ա�����鳤���Ｐ���鳤���֡�Ա�������������ݿ�


require_once "SqlTool.class.php";

if(!empty($_GET['self_remark'])){
//��������
	//1.id--Ա��id
	$id=$_GET['id'];
	//2.zuzhang_id--�鳤zuzhang_id
	$zuzhang_id=$_GET['zuzhang_id'];
	//3.self_remark
	$self_remark=$_GET['self_remark'];
	//4.zuzhang_remark
	//$zuzhang_remark=$_GET['zuzhang_remark'];
	//5.zu_zhang_score
	//$zu_zhang_score=$_GET['zu_zhang_score'];
	
	//�������ݿ�
	$sql="select score_tb_name from main_tb where id=$id";//��Ա�����۴������ݿ�
	$SqlTool=new SqlTool();
	$res=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res);
	$score_tb_name=$row['score_tb_name'];
	
	$sql="update $score_tb_name set self_remark=\"$self_remark\" where self_id=$id";
	$res_self=$SqlTool->execute_dml($sql);
	
	//��Ա�����鳤�����ۺʹ�ִ������ݿ�
	//$sql="select name from main_tb where id=$id";//��Ա����id��ȡԱ������
	//$res=$SqlTool->execute_dql($sql);
	//$row=mysql_fetch_assoc($res);
	//$name=$row['name'];//$nameԱ������
	
	//$sql="update zg_leader_branch set zuzhang_remark=\"$zuzhang_remark\",zu_zhang_score=\"$zu_zhang_score\" where name=\"$name\"";
	//$res_zuzhang=$SqlTool->execute_dml($sql);
	
	//echo $sql;
	
	/*if($res_self&&$res_zuzhang){
		echo "����ɹ�";	
	}
	else{
		echo "�鳤��������鳤��ֻ���Ա�����ﱣ��ʧ��";
	}*/
	if($res_self){
		//echo "����ɹ�";
		$flag=1;
		header("Location: save_or_not_save.php?flag=$flag");
	}
	else{
		//echo "���治�ɹ�";
		$flag=0;
		header("Location: save_or_not_save.php?flag=$flag");
	}

}


?>