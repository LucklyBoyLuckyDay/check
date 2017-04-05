 <!DOCTYPE html>
 <html>
 <head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>技术组主管考核评分表</title>
	
	
	
	<style>
		.header_font {
			font-style:"宋体";
			font-size:30px ;
			text-align:center;
			padding-top:50px;
			padding-bottom :50px;
			border:0px solid red;
		}	
		.check_content{
			width:806px;
			
		
		}
		.check_content_header{
			text-align:center;
		}
		.zhiban{
			width:140px;
			text-align:center;
		}
		.score{
			width:55px;
			text-align:center;
		}
		.tb1_bottom{
			border-bottom :0;
			text-align:center;
		}
		tr{
			height:35px;
		}
		.tb1_header{
			text-align:center;
		}
		.content_left{
			text-align:left;
			float:left;
		}
		.content_right{
			text-align:right;
			float:right;
		}
		div{
			border:0px solid red;
		}
		input{
			text-align:center;
			width:55px;
			border:0;
		}
		.zuzhang_remark,.zg_zhuguan_random_remark,.buzhang_advice,.check_advice,.zhuguan_feedback,.leader_advice{
			border:1px solid #C2D5E8;
			width :1020px;
			margin-top:20px;
		}
		.total_score_div{
			border:1px solid #C2D5E8;
			height:32px;
			width:1020px;
		}
		
		.zu_zhang_score,.zg_zhuguan_random_score{
			border:1px solid #C2D5E8;
			width:1020px;
			
		}
	</style>
	<script language="JavaScript" src="./extend/js/isEmptyForm.js"></script>
</head>
<?php
require_once "back_to_mainPage_login.php"

?>
<?php
require_once "SqlTool.class.php";
//获取信息
$leader_name=$_GET['leader_name'];
//var_dump($leader_name);
//
$id=$_GET['branch_id'];
$sql="select name,score_tb_name from main_tb where id=$id";
$SqlTool=new SqlTool();
$res_1=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res_1);
$name=$row['name'];
$score_tb_name=$row['score_tb_name'];
mysql_free_result($res_1);

//获取类似xx_score
//从分数评语数表$score_tb_name中获取数据
$sql="select * from $score_tb_name";
$res_2=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res_2);

//http://localhost/kaohe_web/table_html_chakan/zg_jishu_zhuguan.php?a1=&a2=&a3=&a4=&a5=&b1=&b2=&b3=&c1=&c2=&c3=&d1=&d2=&d3=#

$a1=$row['a1'];
$a2=$row['a2'];
$a3=$row['a3'];
$a4=$row['a4'];
$a5=$row['a5'];

$b1=$row['b1'];
$b2=$row['b2'];
$b3=$row['b3'];

$c1=$row['c1'];
$c2=$row['c2'];
$c3=$row['c3'];

$d1=$row['d1'];
$d2=$row['d2'];
$d3=$row['d3'];


$buzhang_advice=$row['buzhang_advice'];
$check_advice=$row['check_advice'];
$zhuguan_feedback=$row['zhuguan_feedback'];
$leader_advice=$row['leader_advice'];
mysql_free_result($res_2);

/*******从zg_leader_branch中获取$zuzhang_remark(组员给组长的评语),$zu_zhang_score(组员给组长打分)******/
$sql="select position from main_tb where name=\"$name\"";
$res_position=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res_position);
$position=$row['position'];
mysql_free_result($res_position);

$sql="select branch from score_relationship_tb where leader=\"$position\"";
//echo $sql;	
$res_leader=$SqlTool->execute_dql($sql);
while($row=mysql_fetch_assoc($res_leader))
{
	$position=$row['branch'];
	if($position != '资产主管')break;
}

mysql_free_result($res_leader);

$sql="select name from zg_leader_branch where position=\"$position\"";
//echo $sql;
$res=$SqlTool->execute_dql($sql);
$i = 0;//统计$name 数组长度

mysql_free_result($res);


/**************END**************/

$total_score=$a1+$a2+$a3+$a4+$a5+$b1+$b2+$b3+$c1+$c2+$c3+$d1+$d2+$d3;


//将总得分存入数据库
$sql="update $score_tb_name set total_score=$total_score  where self_id=$id";

$res=$SqlTool->execute_dml($sql);

?>


<body>
<center>
<div class="header_font">
技术组主管考核评分表
</div>
<!--<form action="#" method="get"> -->

<!-- -------------------------------表头--------------------------- -->
<table border="1px" width="1020" cellspacing="0px" bordercolor = "black">
<tr>


	<td class="tb1_header">考核部门</td><td class="tb1_header">综合管理部技术组</td><td class="tb1_header">考核年月</td><td class="tb1_header" id="display_check_date"><!--2016.3.10-2016.4.10--></td>
</tr>
<tr>


	<td class="tb1_bottom">考核人员</td><td class="tb1_bottom"><?php echo "$name"; ?></td><td class="tb1_bottom">考核评分人员</td><td class="tb1_bottom"><?php echo "$leader_name"; ?></td>
</tr>

</table>

<!-- -------------------------------表主体--------------------------- -->
<!-- -------------------------------值班工作-------------------------------------------- -->
<table border="1px" width="1020" cellspacing="0px" bordercolor = "black">
<tr>

	<td colspan="5"class="check_content_header" </td>考核内容<td class="score">得分</td>
</tr>
<tr>

	<td rowspan="5" class="zhiban">值班工作</td>
	<td colspan ="4" class="check_content"><div class="content_left">1、努力学习相关技术知识。</div><div class="content_right">（认真学习：8分——未学习：0分）</div></td><td class="score">
	<?php
		if(isset($a1)&&$a1!=null){
			echo "$a1";
		}
		else{
			echo "<input type=\"text\"name=\"a1\"/>";
		}	
	?>
	</td>

</tr>
<tr>

	<td colspan ="4" class="check_content"><div class="content_left">2、帮助基地人员解决技术上的问题。</div><div class="content_right">（热心帮助：7分——未帮助：0分）</div></td><td class="score">
	<?php
		if(isset($a2)&&$a2!=null){
			echo "$a2";
		}
		else{
			echo "<input type=\"text\"name=\"a2\"/>";
		}	
	?>
	</td>
</tr>

<tr>

	<td colspan ="4" class="check_content"><div class="content_left">3、定期做技术交流：学习资料、经验等分享交流</div><div class="content_right">（经验交流：7分——未交流：0分）</div></td>
	<td class="score">
	<?php
		if(isset($a3)&&$a3!=null){
			echo "$a3";
		}
		else{
			echo "<input type=\"text\"name=\"a3\"/>";
		}	
	?>
	</td>
</tr>

<tr>

	<td colspan ="4" class="check_content"><div class="content_left">4、基地网站的定期更新与维护。</div><div class="content_right">（更新维护：8分——未维护：0分）</div></td><td class="score">
	<?php
		if(isset($a4)&&$a4!=null){
			echo "$a4";
		}
		else{
			echo "<input type=\"text\"name=\"a4\"/>";
		}	
	?>
	</td>
</tr>
<tr>

	<td colspan ="4" class="check_content"><div class="content_left">5、每月做好本组总结，透彻分析本月工作。</div><div class="content_right">（总结良好：7分——未总结：0分）</div></td><td class="score">
	<?php
		if(isset($a5)&&$a5!=null){
			echo "$a5";
		}
		else{
			echo "<input type=\"text\"name=\"a5\"/>";
		}	
	?>
	</td>
</tr>
<!-- -------------------------------参与会议-------------------------------------------- -->
<tr>

	<td rowspan="3" class="zhiban">参与会议</td>
	<td colspan ="4" class="check_content"><div class="content_left">1、按时参加基地主管会议。</div><div class="content_right">（全勤：7分——缺席两次及两次以上：0分）</div></td><td class="score">
	<?php
		if(isset($b1)&&$b1!=null){
			echo "$b1";
		}
		else{
			echo "<input type=\"text\"name=\"b1\"/>";
		}	
	?>
	</td>
</tr>

<tr>

	<td colspan ="4" class="check_content"><div class="content_left">2、准时参加本部门会议。</div><div class="content_right">（全勤：7分——缺席两次及两次以上：0分）</div></td><td class="score">
	<?php
		if(isset($b2)&&$b2!=null){
			echo "$b2";
		}
		else{
			echo "<input type=\"text\"name=\"b2\"/>";
		}	
	?>
	</td>
</tr>
<tr>

	<td colspan ="4" class="check_content"><div class="content_left">3、组内成员的会议到勤情况。</div><div class="content_right">（全勤：7分——缺席两次及两次以上：0分）</div></td><td class="score">
	<?php
		if(isset($b3)&&$b3!=null){
			echo "$b3";
		}
		else{
			echo "<input type=\"text\"name=\"b3\"/>";
		}	
	?>
	</td>
</tr>
<!-- -------------------------------值班纪律-------------------------------------------- -->
<tr>

	<td rowspan="3" class="zhiban">值班纪律</td>
	<td colspan ="4" class="check_content"><div class="content_left">1、值班期间保证值班室的卫生纪律。</div><div class="content_right">（纪律卫生良好：7分——纪律和卫生均不好：0分）</div></td><td class="score">
	<?php
		if(isset($c1)&&$c1!=null){
			echo "$c1";
		}
		else{
			echo "<input type=\"text\"name=\"c1\"/>";
		}	
	?>
	</td>
</tr>
<tr>

	<td colspan ="4" class="check_content"><div class="content_left">2、值班期间严禁吃饭等影响值班室形象的不良行为。</div><div class="content_right">（行为良好：7分——行为不好：0分）</div></td><td class="score">
	<?php
		if(isset($c2)&&$c2!=null){
			echo "$c2";
		}
		else{
			echo "<input type=\"text\"name=\"c2\"/>";
		}	
	?>
	</td>
</tr>

<tr>

	<td colspan ="4" class="check_content"><div class="content_left">3、穿着正式，举止良好，佩戴工作证。</div><div class="content_right">（穿着得体：7分——穿着不整：0分）</div></td><td class="score">
	<?php
		if(isset($c3)&&$c3!=null){
			echo "$c3";
		}
		else{
			echo "<input type=\"text\"name=\"c3\"/>";
		}	
	?>
	</td>
</tr>

<!-- -------------------------------其它-------------------------------------------- -->
<tr>

	<td rowspan="3" class="zhiban">其它</td><td colspan ="4" class="check_content"><div class="content_left">1、积极参加基地、部门举办的各类活动。</div><div class="content_right">（积极参与各项活动：6分——消极对待各项活动：0分）</div></td><td class="score">
	<?php
		if(isset($d1)&&$d1!=null){
			echo "$d1";
		}
		else{
			echo "<input type=\"text\"name=\"d1\"/>";
		}	
	?>
	</td>
</tr>

<tr>

	<td colspan ="4" class="check_content"><div class="content_left">2、与组员良好沟通，并交接工作顺利。</div><div class="content_right">（沟通良好：5分——未沟通：0分）</div></td><td class="score">
	<?php
		if(isset($d2)&&$d2!=null){
			echo "$d2";
		}
		else{
			echo "<input type=\"text\"name=\"d2\"/>";
		}	
	?>
	</td>
</tr>
<tr>

	<td colspan ="4" class="check_content"><div class="content_left">3、与各部门资产主管经常沟通交流。</div><div class="content_right">（沟通良好：5分——未沟通：0分）</div></td><td class="score">
	<?php
		if(isset($d3)&&$d3!=null){
			echo "$d3";
		}
		else{
			echo "<input type=\"text\"name=\"d3\"/>";
		}	
	?>
	</td>
</tr>


</table>
<br><br>
<div class="total_score_div">
总得分：<?php echo "$total_score";?>
</div>
<!--<input type="submit" value="保存"/>
</form>-->


	<!--<div class="zuzhang_remark"><h4>组员为组长评语</h4>/*<?php	//echo "$zuzhang_remark";?></div>-->
	<!--<div class="zg_zhuguan_random_remark"><h4>组长互评</h4><?php	echo "$zg_zhuguan_random_remark";?></div>-->
	<div class="buzhang_advice"><h4>部长评语</h4><?php echo "$buzhang_advice";?></div>
	<div class="zhuguan_feedback"><h4>主管反馈</h4><?php	echo "$zhuguan_feedback";?></div>
	<div class="leader_advice"><h4>上级评语</h4><?php	echo "$leader_advice";?></div>
	<div class="check_advice"><h4>考核组意见</h4><?php	echo "$check_advice";?></div>
	
	<!--zuzhang_remark,.zg_zhuguan_random_remark,.buzhang_advice,.check_advice,.zhuguan_feedback,.leader_advice -->
<br><br><br><br><br><br>
</center>
</body>

</html>

