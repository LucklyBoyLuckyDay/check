 <!DOCTYPE html>
 <html>
 <head>
 	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>俱乐部员工月度考核表</title>
	
	<style>
		.header_font {
			font-style:"宋体";
			font-size:30px ;
			text-align:center;
			padding-top:50px;
			padding-bottom :50px;
			border:0px solid red;
		}
		tr{
			height:30px;
		}
		.weidu{
			
			
			width:122px;
			text-align:center;
		}
		.zhibiao{
			text-align:center;
			width:120px;
		}
		.weight{
			text-align:center;
			width:50px;
		}
		.biaozhun{
			width:482px;
			/*text-align:center;*/
		}
		#biaozhun_id{
			text-align:center;
		}
		.checked_time{
			text-align:center;
			width:70px;
		}
		font{
			color:red;
		}
		input{
			
			width:60px;
			text-align:center;
			border:0;
		}
		.leader_advice,.self_remark,.other_remark,.check_advice{
			border:1px solid #C2D5E8;
			width :867px;
			margin-top:50px;
		}
		.total_score_div{
			border:1px solid #C2D5E8;
			height:32px;
			width:868px;
			margin-top:20px;
		}
		
	</style>
	<script language="JavaScript" src="./extend/js/isEmptyForm.js"></script>
</head>
	
<?php
require_once "SqlTool.class.php";
//获取信息
//var_dump($_GET['branch_id']);
//var_dump(empty($_GET['branch_id']));
if(!empty($_GET['branch_id'])){
$id=$_GET['branch_id'];
$sql="select name,score_tb_name from main_tb where id=$id";
//echo "$sql";
$SqlTool=new SqlTool();
$res_1=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res_1);
$name=$row['name'];
$score_tb_name=$row['score_tb_name'];
mysql_free_result($res_1);
//echo "$score_tb_name";
//获取类似xx_score
//从分数评语数表$score_tb_name中获取数据
$sql="select * from $score_tb_name where self_id=$id";
$res=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res);
//http://localhost/kaohe_web/table_html_chakan/julebu_yuangong.php?a1=&a2=&a3=&a4=&b=&c1=&c2=&d=&e=#

$a1=$row['a1'];
$a2=$row['a2'];
$a3=$row['a3'];
$a4=$row['a4'];

$b=$row['b'];

$c1=$row['c1'];
$c2=$row['c2'];

$d=$row['d'];

$e=$row['e'];

$total_score=$row['total_score'];

$self_remark=$row['self_remark'];

$leader_advice=$row['leader_advice'];

//$other_remark=$row['other_remark'];

$check_advice=$row['check_advice'];

mysql_free_result($res);

//echo "$self_remark";
}

?>

<body>

<div class="header_font">
武汉理工大学勤工助学基地
</div>
<!--<form action="#" method="get">-->
<center>
	<table border="1px"  cellspacing="0px" bordercolor = "black">
	
	<tr>
	
	<td  class="weidu">姓名</td><td colspan="2"><?php echo "$name"; ?></td><td class="weight"></td><td class="checked_time">考核时间</td>
	
	</tr>
	<tr>
	<td  class="weidu">维度</td>
	<td class="zhibiao">指标</td>
	<td class="biaozhun" id="biaozhun_id">标准</td>
	<td class="weight">权重</td>
	<td class="checked_time" id="display_check_month"><!--3月--></td>
	
	</tr>
	<tr>
	<td rowspan="4"  class="weidu">值班工作</td><td class="zhibiao">出勤</td><td>值班时出现迟到、早退情况，因紧急事情请假者：一次扣1分；<br>无通知者：一次扣2分。<br>
基本分为10分。</td><td class="weight">10%</td>
<td class="checked_time">
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
	<td class="zhibiao"><font>违纪</font></td>
	<td class="biaozhun">	
		<font>
		值班时出现旷班、睡班情况，一次扣5分<br>
		出现玩手机或其他娱乐与值班工作无关的情况，一次扣2分。<br>
		基本分为10分。
		</font>
	</td><td class="weight"><font>10%</font></td>
	<td class="checked_time">
	<?php
	
		if(isset($a2)&&$a2!=null){
			echo "$a2";
		}
		else{
			echo "<input type=\"text\"name=a2\"/>";
		}
		
	
	?>
	</td>
	
	</tr>
	<tr>
	<td class="zhibiao">换班</td>
	<td class="biaozhun">
		该本人值班时，出现换班情况，一次扣1分。<br>
		基本分为5分。
	</td>
	<td class="weight">5%</td><td class="checked_time">
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
	<td class="zhibiao">日常工作</td>
	<td class="biaozhun">
		值班时出现忘记打扫卫生、洗手套、关电源等情况，一次<br>扣2分。<br>
		基本分为10分。
	</td>
	<td class="weight">10%</td>
	<td class="checked_time">
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
	<td  class="weidu">部门例会</td><td class="zhibiao">出勤</td>
	<td class="biaozhun">
		迟到五分钟以内，一次扣一分；<br>
		请假一次扣2分；<br>
		旷到部门例会一次，扣5分。<br>
		参加基地例会一次，加2分。<br>
		基本分为10分

	</td>
	<td class="weight">10%</td>
	<td class="checked_time">
	<?php
	
		if(isset($b)&&$b!=null){
			echo "$b";
		}
		else{
			echo "<input type=\"text\"name=\"b\"/>";
		}
		
	
	?>
	</td>
	
	</tr>
	<tr>
	<td rowspan="2"  class="weidu">部门活动</td><td class="zhibiao">部门工作</td>
	<td class="biaozhun">
		积极参加部门工作，作为主负责人，加5分；<br>
		积极参加部门工作，辅助部门活动，加2分；<br>
		无故不参加部门工作，扣五分；<br>
		<font>基本分为5分，最高不超过10分</font>
	</td>
	<td class="weight">10%</td>
	<td class="checked_time">
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
	<td class="zhibiao">部门聚会活动</td><td class="biaozhun">
		积极参加部门聚会活动，作为主负责人。加五分；<br>
		积极参加部门聚会活动，加2分；<br>
		无故不参加，扣五分；<br>
		<font>基本分为5分，最高不超过10分</font>
	</td>
	<td class="weight">10%</td>
	<td class="checked_time">
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
	<td  class="weidu">基地活动</td><td class="zhibiao">基地活动</td>
	<td class="biaozhun">
		积极参加基地活动，作为活动总负责人，加10分；<br>
		积极参加基地活动，作为部门主负责人，加5分；<br>
		积极参加基地活动，协助开展基地工作，加2分；<br>
		<font>基本分为0分，最高不超过15分</font>
	</td>
	<td class="weight"><font>15%</font></td>
	<td class="checked_time">
	<?php
	
		if(isset($d)&&$d!=null){
			echo "$d";
		}
		else{
			echo "<input type=\"text\"name=\"d\"/>";
		}
		
	
	?>
	
	</tr>
	<tr>
	<td  class="weidu">工作态度</td><td class="zhibiao">工作态度</td>
	<td class="biaozhun">
		对待工作认真负责，值班工作无差错，积极参加部门活动，共同创建部门家文化；（15-20分）<br>
		对待工作态度一般，参加部门活动；（10-15分）<br>
		对待工作态度差，不愿参加部门活动；（1-10分）<br>
	</td>
	<td class="weight">20%</td>
	<td class="checked_time">
	<?php
	
		if(isset($e)&&$e!=null){
			echo "$e";
		}
		else{
			echo "<input type=\"text\"name=\"e\"/>";
		}
		
	
	?>
	
	</tr>
	
	</table>
	<div class="total_score_div">
	总得分：<?php echo "$total_score";?>
	</div>
	<br><br>   
	<div class="self_remark"><h4>员工评语</h4><?php	echo "$self_remark";?></div>
	<div class="leader_advice"><h4>主管评语</h4><?php	echo "$leader_advice";?></div>
	<!--<div class="other_remark"><h4>他人评语</h4><?php echo "$other_remark";?></div>-->
	<div class="check_advice"><h4>考核组意见</h4><?php	echo "$check_advice";?></div>
<!--	<input type="submit" value="保存">-->
	<br><br><br><br><br><br>
<center>

<!--</form>-->
</body>
