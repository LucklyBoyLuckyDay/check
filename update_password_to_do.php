<?php
require_once "SqlTool.class.php";
//接收消息
$userid=$_POST['userid'];
$old_password=$_POST['old_password'];
$new_password=$_POST['new_password'];
$new_again_password=$_POST['new_again_password'];

$sql="select password,name,id from main_tb where userid = \"$userid\"";
	$SqlTool=new SqlTool();
	$res=$SqlTool->execute_dql($sql);
	if($row=mysql_fetch_assoc($res)){
		if($old_password==$row['password']){
			
			/* echo "登陆成功";
			//说明合法
			//取出用户名字
			$name=$row['name'];
			//取出用户id
			$id=$row['id']; */
			//echo "欢迎$name$id";
			
			//header("Location: main_page.php?id=$id&name=$name"); 
			//exit();
			if($new_password==$new_again_password){
				$sql="update main_tb set password=\"$new_password\" where userid=\"$userid\"";
				$res=$SqlTool->execute_dml($sql);
				if($res){
					$flag=1;
					header("Location: update_password_to_do_isOk.php?flag=$flag"); 
				}else{
					$flag=0;
					header("Location: update_password_to_do_isOk.php?flag=$flag"); 
				}
				
				exit();
			}
			
			
		}
		
	}




?>