 <?php
	
	/* //接收用户的数据
	//1.id
	$userid=$_GET['userid'];
	//2.密码
	$password=$_GET['password'];
	
	
	//到数据库去验证.mysql扩展库, mysqli扩展库
	
	//1.得到连接
	$conn=mysql_connect("localhost","root","123");
	if(!$conn){
		die("连接失败".mysql_errno());
	}
	//设置访问数据库的编码
	mysql_query("set names utf8",$conn) or die(mysql_errno());
	
	//选择数据库
	mysql_select_db("check_base",$conn) or die(mysql_errno());
	
	//发送sql语句，验证
	//防止sql注入攻击
	//变化验证逻辑 mysqli 预处理 
	
	$sql="select password,name,id from main_tb where userid=$userid";
	
	//1.通过输入的userid来获取数据库的密码，然后再和输入的密码比对.
	
	$res=mysql_query($sql,$conn);
	
	if($row=mysql_fetch_assoc($res)){
		//查询到.
		//2.取出数据库密码
		if($row['password']==$password){
			//说明合法
			//取出用户名字
			//$name=$row['name'];
			//取出用户id
			$id=$row['id'];
			
			header("Location: main_page.php?id=$id"); 
			exit();
		}
		
	}
	header("Location: login.php?errno=1");
	exit();
	
	//关闭资源
	mysql_free_result($res);
	mysql_close($conn); */
	
	
	
	
	//简单验证(不到数据库)
//	if($id=="100"&&$password=="123"){
//		//合法,跳转到empManage.php
//		header("Location: empManage.php");  
//		//如果要跳转，则最好exit();
//		exit();
//	}else{
//		//非法用户
//		header("Location: login.php?errno=1");
//		exit();
//	}
?> 
<?php
//启动session的初始化
session_start();

?>
<?php
//date:2017/2/12
//1.添加验证码处理
$checkCode = $_SESSION['checkCode'];
//2.接收填入的验证码数据
$yzm = $_POST['yzm'];
if($yzm != $checkCode)
{
	header("Location: login.php?errno=2");
	exit();
}



?>
<?php
	require_once "SqlTool.class.php";
	//接收用户的数据
	//1.id
	$userid=$_POST['userid'];
	//2.密码
	$password=$_POST['password'];
	
	
	$sql="select password,name,id from main_tb where userid = \"$userid\"";
	$SqlTool=new SqlTool();
	$res=$SqlTool->execute_dql($sql);
	if($row=mysql_fetch_assoc($res)){
		if($password==$row['password']){
			
			echo "登陆成功";
			//说明合法
			//取出用户名字
			$name=$row['name'];
			//取出用户id
			$id=$row['id'];
			//echo "欢迎$name$id";
			
			//session
			//注册session变量，赋值为一个用户的名称
			$_SESSION["name"]=$name;
	
			
			header("Location: main_page.php?id=$id&name=$name"); 
			exit();
			
		}
		
	}
	header("Location: login.php?errno=1");
	exit();
	
	//关闭资源
	mysql_free_result($res);	
?>

