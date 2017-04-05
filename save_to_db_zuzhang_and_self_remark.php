<?php

//功能：综管的员工给组长评语及给组长评分、员工自评存入数据库


require_once "SqlTool.class.php";

if(!empty($_GET['self_remark'])){
//接收数据
	//1.id--员工id
	$id=$_GET['id'];
	//2.zuzhang_id--组长zuzhang_id
	$zuzhang_id=$_GET['zuzhang_id'];
	//3.self_remark
	$self_remark=$_GET['self_remark'];
	//4.zuzhang_remark
	//$zuzhang_remark=$_GET['zuzhang_remark'];
	//5.zu_zhang_score
	//$zu_zhang_score=$_GET['zu_zhang_score'];
	
	//存入数据库
	$sql="select score_tb_name from main_tb where id=$id";//将员工评价存入数据库
	$SqlTool=new SqlTool();
	$res=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res);
	$score_tb_name=$row['score_tb_name'];
	
	$sql="update $score_tb_name set self_remark=\"$self_remark\" where self_id=$id";
	$res_self=$SqlTool->execute_dml($sql);
	
	//将员工给组长的评价和打分存入数据库
	//$sql="select name from main_tb where id=$id";//由员工的id获取员工名字
	//$res=$SqlTool->execute_dql($sql);
	//$row=mysql_fetch_assoc($res);
	//$name=$row['name'];//$name员工名字
	
	//$sql="update zg_leader_branch set zuzhang_remark=\"$zuzhang_remark\",zu_zhang_score=\"$zu_zhang_score\" where name=\"$name\"";
	//$res_zuzhang=$SqlTool->execute_dml($sql);
	
	//echo $sql;
	
	/*if($res_self&&$res_zuzhang){
		echo "保存成功";	
	}
	else{
		echo "组长评语或者组长打分或者员工评语保存失败";
	}*/
	if($res_self){
		//echo "保存成功";
		$flag=1;
		header("Location: save_or_not_save.php?flag=$flag");
	}
	else{
		//echo "保存不成功";
		$flag=0;
		header("Location: save_or_not_save.php?flag=$flag");
	}

}


?>