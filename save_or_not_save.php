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
	echo "保存成功！";
}
else if($flag==0){
	echo "保存不成功";
}else if($flag==2)//$flag==2--->重复保存
{
	echo "重复保存";
}
else{
	
	echo "情况不明";
}
?>
<center>
</body>
</html>