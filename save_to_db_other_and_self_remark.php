
<?php
//功能：将评语存入数据库
require_once "SqlTool.class.php";


/**
 * date:2017/02/13
 *由于去掉员工自评部分，故将去掉temp_branch_id
 */
//if((!empty($_GET['temp_branch_id']))&&(!empty($_GET['temp_id']))){
if(!empty($_GET['temp_id'])){
//接收数据
	//1.temp_branch_id
	//$temp_branch_id=$_GET['temp_branch_id'];
	//2.temp_id
	$temp_id=$_GET['temp_id'];
	//3.self_remark
	$self_remark=$_GET['self_remark'];
	//4.other_remark
	//$other_remark=$_GET['other_remark'];
	
	//存入数据库
	$sql="select apartment from main_tb where id=$temp_id";
	$SqlTool=new SqlTool();
	$res_5=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res_5);
	$apartment=$row['apartment'];//取出id的部门
	mysql_free_result($res_5);
	
	
	if($apartment=="俱乐部"){
		$temp="julebu_yuangong";
	}
	if($apartment=="升升活动中心"){
		$temp="shengsheng_yuangong";//echo $temp;
	}
	//var_dump($apartment='升升活动中心') ;
	
	$sql="update $temp set self_remark=\"$self_remark\" where self_id=$temp_id";
	$res_self=$SqlTool->execute_dml($sql);
	//$sql="update $temp set other_remark=\"$other_remark\" where self_id=$temp_branch_id";
	//$res_other=$SqlTool->execute_dml($sql);
	
	
	//if($res_self&&$res_other){
	if($res_self){
		//将互评标志置为1，表示该员工已经被评价且评价成功
		//$sql="update main_tb set other_filled =1 where id =$temp_branch_id";
		//$res_temp_branch_id_update_ok=$SqlTool->execute_dml($sql);
		
		//$sql="update main_tb set to_fill = 1 where id = $temp_id";
		/* $res_temp_id_update_ok=$SqlTool->execute_dml($sql);
		if($res_temp_branch_id_update_ok&&$res_temp_id_update_ok){//标识他人评语已经填写同时评语保存成功
			$flag=1;
			echo "ok";
			header("Location: save_or_not_save.php?flag=$flag");
		}else{
			echo "no";
			$flag=0;
			//header("Location: save_or_not_save.php?flag=$flag");
		} */
		/**
		 *$res_sel !=0表示update成功=====>$flag=1
		 *$res_sel ==0表示update失败=====>$flag=0
		 */	
		 $flag=1;
		 
	}else{
		echo "error";
		$flag=0;
		//header("Location: save_or_not_save.php?flag=$flag");
	}
	/**
	 *页面跳转---->通知保存成功或者不成功
	 */
	header("Location: save_or_not_save.php?flag=$flag");
	
}
?>