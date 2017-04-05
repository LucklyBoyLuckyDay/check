<!DOCTYPE html>
 <html>
 <head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>网上考核</title>
	<style>
		body{
			border:0px solid red;
			margin:110px auto;
			width:400px;
		}
	</style>
</head>
<body>
<form action="update_password_to_do.php" method="post">
请输入用户名：　　<input type="text" name="userid"><br><br>
请输入原密码：　　<input type="password" name="old_password"><br><br>
请输入新密码：　　<input type="password" name="new_password"><br><br>
请再次输入新密码：<input type="password" name="new_again_password"><br><br><br>
　　　　　　　　　<input type="submit" value="提交"><br><br>
</form>

</body>
</html>