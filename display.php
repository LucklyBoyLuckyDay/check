<?php


	require_once "SqlTool.class.php";
	
	
	
//接收数据
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
		$leader_position=$row['position'];//获取上司职位
		$leader_apartment=$row['apartment'];//获取上司部门
		$leader_name=$row['name'];
		mysql_free_result($res_1);
		
			
		$sql="select name,position from main_tb where id=$branch_id";
	//	echo "$sql<br>";
		$res_2=$SqlTool->execute_dql($sql);
		$row=mysql_fetch_assoc($res_2);
		$branch_position=$row['position'];//获取下属职位
		$branch_name=$row['name'];
		mysql_free_result($res_2);
		
		$sql="select check_name from score_relationship_tb where leader=\"$leader_position\" and branch=\"$branch_position\" and leader_apartment=\"$leader_apartment\"";
	//	echo "$sql<br>";
		$res_3=$SqlTool->execute_dql($sql);
		if($row=mysql_fetch_assoc($res_3)){
			$check_name=$row['check_name'];//获取score_relationship_tb中的check_name
		}
		mysql_free_result($res_3);
		
		
		
		
		
	
	
	if(($choice==1)||($choice==3))//填写或查看考核打分表
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
	//if($choice==2)//填写考核意见
	//{
//	if($choice==2)//填写考核意见
	//}
	//if($choice==3)//查看考核打分表
	//if($choice==4)//查看考核意见
?>