 <!DOCTYPE html>
 <html>
 <head>
 	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>网上考核</title>

<style>
body{
	border:0px solid red;
	width:500px;
	margin : 15% auto;
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
</head>

<body>
<center>
<?php

//接收传过来的信息保存是否成功的标准$flag
//$flag=1----保存成功
//$flag=2----保存不成功
$flag=$_GET['flag'];

if($flag==1){
	echo "修改成功！请重新登陆";
	echo "<br><br>";
	echo "<a href=\"login.php\">点击我重新登陆<a>";
}
	
else if($flag==0){
	echo "修改不成功，请返回重新修改";
	echo "<br><br>";
	echo "<a href=\"update_password.php\">点击我重新修改<a>";
}else{
	
	echo "情况不明";
}
?>
<center>
</body>
</html>