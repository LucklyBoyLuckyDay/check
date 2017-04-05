<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>登陆</title>
<style>
.login{
	width:320px;
	height:300px;
	border:1px solid #E0EDF7;
	position :relative ;
	top :30%;
	left :49%;
	padding-left:4%;
}
h3{
	border:0px solid red;
	
}
div{
	border:0px solid blue;
}
img{
	border:0px solid green;
	/*margin-top :auto;*/
	position :relative ;
	top :10px;
	display：none;
}
body{
	vertical-align :middle ;
}
input{
	width:128px;
	/*border:1px solid green;*/
}
.cls_submit{
	margin-top:20px;
	text-align :center;
}
.cls_error{
	border:0px solid green;
	position :relative ;
	top :180px;
	padding-left:763px;
	color :red;
}
a{
	display:block;
	border:0px solid red;
	float:left;
	margin-left:40px;
}

a:link {
	text-decoration:none ;
	color:black;
	font-size:small ;
}
a:visited {
	text-decoration:none ;
	color:#F055AF;
	font-size:small ;
}

</style>
<script language="JavaScript" src="./extend/js/isEmptyForm.js"></script>
</head>

<div class="login">
<h3>网上考核系统</h3>
<form action="loginProcess.php" method="post" onsubmit="return checkForm(this)">

<div><img src="image/user.png"/>&nbsp;&nbsp;&nbsp;用户名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="userid"/></div>
<div><img src="image/password.png"/>&nbsp;&nbsp;密&nbsp;&nbsp;&nbsp;码&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="password"/></div><br>
<div>&nbsp;请填入验证码：<input type="text" name="yzm"/>&nbsp;&nbsp;<img src = "./extend/yzm.php" onclick ="this.src='./extend/yzm.php?aa = ' +Math.random()" alt="点击变换"/></div>
<div class="cls_submit"><input type="submit" value="登  录"/></div>
<!--<div><input type="reset" value="重现填写"/></div>-->

</form>

<a href="update_password.php"> 修改密码</a><a href="forget_password_to_contact.php">忘记密码</a>
</div>

<?php 
 	//接收errno
	/**
	 *errno = 1=>你的用户名或者密码错误
	 *error = 2=>验证码错误
	*/
	if(!empty($_GET['errno'])){
		
		//接收错误编号
		$errno=$_GET['errno'];
		if($errno==1){
			echo "<br/><div class=\"cls_error\">你的用户名或者密码错误</div>";
		}else if($errno==2){
			echo "<br/><div class=\"cls_error\">验证码错误</div>";
		}
	}
?>
</html>
