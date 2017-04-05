<?php
//使用php绘图技术，画验证码
$checkCode="";
for($i=0;$i<4;$i++){
	$checkCode.=dechex(rand(1,15));
}
session_start();
$_SESSION['checkCode']=$checkCode;

//imagestring
//1.创建画布
 $im = imagecreatetruecolor(55,21);
 $background = imagecolorallocate( $im,192,191,197);
 $textcolor = imagecolorallocate( $im,255,0,0);

$red = imagecolorallocate($im, 255, 0, 0);
$green = imagecolorallocate($im, 0, 255, 0);
imagefilledrectangle($im, 0, 0,55,21, $background);
imagestring($im, 5, rand(1,21), rand(1,5),$checkCode, $textcolor );
for($i=0;$i<5;$i++)
{
	imageline($im,rand(1,55),rand(1,21),rand(1,55),rand(1,21),imagecolorallocate( $im,rand(1,255),rand(1,255),rand(1,255)));
}
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>