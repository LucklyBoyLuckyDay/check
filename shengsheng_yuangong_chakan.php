 <!DOCTYPE html>
 <html>
 <head>
 	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>升升活动中心员工月度考核表</title>

<style>
	.header_font {
		font-style:"宋体";
		font-size:30px ;
		text-align:center;
		padding-top:50px;
		padding-bottom :50px;
		border:0px solid red;
	}
	.work_weight{
		width:40px;
		text-align:center;
	}
	td{
		height:27px;
	}
	.check_content{
		width:620px;
	}
	.check_content_tb1{
		width:664px;
	}
	.check_group_tag{
		height:55px;
	}
	.zhiban{
		
		width:90px;
		text-align:center;
	}
	.score{
		width:45px;
		text-align:center;
	}
	input{
		
		border:0px;
		width:50px;
		text-align:center;
	}
	.leader_advice,.self_remark,.other_remark,.check_advice{
			border:1px solid #C2D5E8;
			width :900px;
			margin-top:50px;
	}
	.total_score_div{
		border:1px solid #C2D5E8;
		height:32px;
		width:900px;
		margin-top:20px;
	}
</style>
<script language="JavaScript" src="./extend/js/isEmptyForm.js"></script>
</head>
<?php
require_once "SqlTool.class.php";
//获取信息
//var_dump($_GET['branch_id']);
//var_dump(!empty($_GET['branch_id']));
if(!empty($_GET['branch_id'])){
$id=$_GET['branch_id'];
$sql="select name,score_tb_name from main_tb where id=$id";
$SqlTool=new SqlTool();
$res=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res);
$name=$row['name'];
$score_tb_name=$row['score_tb_name'];
mysql_free_result($res);
//echo "$score_tb_name";
//获取类似xx_score
//从分数评语数表$score_tb_name中获取数据
$sql="select * from $score_tb_name where self_id=$id";
$res=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res);

//http://localhost/kaohe_web/table_html_chakan/shengsheng_yuangong.php?a1=&a2=&a3=&a4=&a5=&a6=&a7=&b1=&b2=&b3=&b4=&d1=&d2=&d3=&e1=&e2=&e3=&f=&g=&h=&i=&j=&k=#
$a1=$row['a1'];
$a2=$row['a2'];
$a3=$row['a3'];
$a4=$row['a4'];
$a5=$row['a5'];
$a6=$row['a6'];
$a7=$row['a7'];

$b1=$row['b1'];
$b2=$row['b2'];
$b3=$row['b3'];
$b4=$row['b4'];

$d1=$row['d1'];
$d2=$row['d2'];
$d3=$row['d3'];

$e1=$row['e1'];
$e2=$row['e2'];
$e3=$row['e3'];

$f=$row['f'];

$g=$row['g'];

$h=$row['h'];

$i=$row['i'];

$j=$row['j'];

$k=$row['k'];

$total_score=$row['total_score'];

$self_remark=$row['self_remark'];
//var_dump($self_remark);
$leader_advice=$row['leader_advice'];

//$other_remark=$row['other_remark'];

$check_advice=$row['check_advice'];

mysql_free_result($res);
}

?>

<body>
<div class="header_font">
升升活动中心员工月度考核表
</div>
<center>
<!--<form action="#" method="get">-->
<table border="1px"  cellspacing="0px" bordercolor = "black">

<tr>
	<td align ="left" colspan="6">姓名：<?php echo "$name";?></td>
</tr>
<tr>
	<td align ="center" colspan="2" rowspan="2">考核指标</td><td rowspan="2" class="work_weight">权重</td><td align ="center" rowspan="2" colspan="2">考  核  内  容</td><td align ="center" class="score" >得分</td>
</tr>
<tr>
	<td align ="center"id="display_check_month"><!--9月--></td>
</tr>
<!-- ------------工作任务------------------------------------------------------ -->
<!-- ------------------------------------------------------------------ -->
<tr>
	<td rowspan ="18" class="work_weight">工作任务</td><td rowspan="7" class="zhiban"class="zhiban">值班</td><td class="work_weight" rowspan="7">20%</td><td class="check_content_tb1" colspan="2" >1.迟到或早退十五分钟及以上扣2分/次。</td>
	<td class="score">
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
	<td class="check_content_tb1" colspan="2">2.病假扣1分/次，事假扣2分/次，无故缺勤5分/次。</td>
	<td class="score">
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
	<td class="check_content_tb1" colspan="2">3.脱岗/睡岗/干私活/看闲书/玩游戏等与值班工作无关事项，扣2分/次。</td>
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
	<td class="check_content_tb1" colspan="2">4.卫生责任区打扫不彻底/室内物品乱摆放/垃圾、杂物乱扔，扣2分/次。</td>
	<td class="score">
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
	<td class="check_content_tb1" colspan="2">5.下班后最后一人离岗，办公室水、电、空调、门窗等未关，扣2分/次。</td>
	<td class="score">
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
<tr>
	<td class="check_content_tb1" colspan="2">6.造成财物损失，根据受损金额大小，扣5-10分。</td>
	<td class="score">
	<?php
	
		if(isset($a6)&&$a6!=null){
			echo "$a6";
		}
		else{
			echo "<input type=\"text\"name=\"a6\"/>";
		}
		
	
	?>
	</td>
</tr>
<tr>
	<td class="check_content_tb1" colspan="2">7.此项基本分为10分，无加分，累计不低于0分。</td>
	<td class="score">
	<?php
	
		if(isset($a7)&&$a7!=null){
			echo "$a7";
		}
		else{
			echo "<input type=\"text\"name=\"a7\"/>";
		}
		
	
	?>
	</td>
</tr>
<!-- ------------------------------------------------------------------ -->
<tr>
	<td rowspan ="4"class="zhiban">部门例会</td><td class="work_weight" rowspan ="4">10%</td><td class="check_content_tb1" colspan="2">1.迟到或早退十五分钟及以上扣2分/次。</td>
	<td class="score">
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
	<td class="check_content_tb1" colspan="2">2.病假扣1分/次，事假扣2分/次，无故缺勤5分/次。</td>
	<td class="score">
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
	<td class="check_content_tb1" colspan="2">3.会上积极发言参与加2分/次。</td>
	<td class="score">
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
<tr>
	<td class="check_content_tb1" colspan="2">4此项基本分为5分，累计不超过10分。</td>
	<td class="score">
	<?php
	
		if(isset($b4)&&$b4!=null){
			echo "$b4";
		}
		else{
			echo "<input type=\"text\"name=\"b4\"/>";
		}
		
	
	?>
	</td>
</tr>
<!-- ------------------------------------------------------------------ -->

<!-- ------------------------------------------------------------------ -->
<tr>
	<td rowspan="3"class="zhiban">其它任务</td><td class="work_weight" rowspan="3">10%</td><td class="check_content_tb1" colspan="2">1.按时按量完成基地上级交待的任务2分。</td>
	<td class="score">
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
	<td class="check_content_tb1" colspan="2">2.完成效果按情况加2-3分。</td>
	<td class="score">
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
	<td class="check_content_tb1" colspan="2">3.此项基本分为5分，累计不超过10分。</td>
	<td class="score">
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
<!-- ------------------------------------------------------------------ -->

<tr>
	<td rowspan="3"class="zhiban">基地活动</td><td class="work_weight" rowspan="3">10%</td><td class="check_content_tb1" colspan="2">1.积极参加基地和部门的各项活动加2分。</td>
	<td class="score">
	<?php
	
		if(isset($e1)&&$e1!=null){
			echo "$e1";
		}
		else{
			echo "<input type=\"text\"name=\"e1\"/>";
		}
		
	
	?>
	</td>
</tr>
<tr>
	<td class="check_content_tb1" colspan="2">2.组织活动按效果加2-3分。</td>
	<td class="score">
	<?php
	
		if(isset($e2)&&$e2!=null){
			echo "$e2";
		}
		else{
			echo "<input type=\"text\"name=\"e2\"/>";
		}
		
	
	?>
	</td>
</tr>
<tr>
	<td class="check_content_tb1" colspan="2">3.此项基本分为5分，累计不超过10分。</td>
	<td class="score">
	<?php
	
		if(isset($e3)&&$e3!=null){
			echo "$e3";
		}
		else{
			echo "<input type=\"text\"name=\"e3\"/>";
		}
		
	
	?>
	</td>
</tr>
<!-- ------------------------------------------------------------------ -->
<tr>
	<td colspan ="2" class="check_group_tag"class="zhiban">考核组标记</td><td colspan="6">4</td>
</tr>

</table>
<!--紧接着第二张表-->
<br><hr><br>
<!-- 分割线 -->
<!-- ------------------------------------------------------------------ -->
<!-- -----------------------工作态度------------------------------------------- -->

<table border="1px"  cellspacing="0px" bordercolor = "black">

<tr>
	<td rowspan ="12" class="work_weight">工作态度</td><td rowspan="4"class="zhiban">积极性</td><td class="work_weight" rowspan="4" >10%</td><td class="check_content">1.工作一贯积极主动，做事从来不需要上级督促。</td><td>7-8分</td>
	<td class="score" rowspan="4">
	<?php
	
		if(isset($f)&&$f!=null){
			echo "$f";
		}
		else{
			echo "<input type=\"text\"name=\"f\"/>";
		}
		
	
	?>
	</td>
</tr>
<tr>
	<td class="check_content">2.工作是积极主动的，但有时需要上级提醒。</td><td>5-6分</td>
</tr>
<tr>
	<td class="check_content">3.工作不是很积极主动，很多时候都需要上级提醒。</td><td>3-4分</td>
</tr>
<tr>
	<td class="check_content">4.工作完全不不积极主动，总是需要上级提醒。</td><td>1-2分</td>
</tr>


<tr>
	<td rowspan="4"class="zhiban">责任心</td><td class="work_weight" rowspan="4">10%</td><td class="check_content">1.工作十分负责，除了本职工作，还非常关心其他工作。</td><td>7-8分</td>
	<td class="score" rowspan="4">
	<?php
	
		if(isset($g)&&$g!=null){
			echo "$g";
		}
		else{
			echo "<input type=\"text\"name=\"g\"/>";
		}
		
	
	?>
	</td>
</tr>
<tr>
	<td class="check_content">2.能够按职责要求工作，对自己的工作负责。</td><td>5-6分</td>
</tr>
<tr>
	<td class="check_content">3.一般能按职责要求工作，偶尔出现推诿现象。</td><td>3-4分</td>
</tr>
<tr>
	<td class="check_content">4.工作马虎，不愿意为自己的工作负责，经常推诿责任。</td><td>1-2分</td>
</tr>


<tr>
	<td rowspan="4"class="zhiban">协作性</td><td class="work_weight" rowspan="4">10%</td><td class="check_content">1.能够主动配合、帮助同事和其他部门开展工作。</td><td>7-8分</td>
	<td class="score" rowspan="4">
	<?php
	
		if(isset($h)&&$h!=null){
			echo "$h";
		}
		else{
			echo "<input type=\"text\"name=\"h\"/>";
		}
		
	
	?>
	</td>
</tr>
<tr>
	<td class="check_content">2.在要求和安排下能够配合、帮助同事和其他部门开展工作。</td><td>5-6分</td>
</tr>
<tr>
	<td class="check_content">3.在要求和安排下多数情况下能够配合其他部门和同事开展部分工作。</td><td>3-4分</td>
</tr>
<tr>
	<td class="check_content">4.不太愿意为其他部门和同事提供帮助和配合。</td><td>1-2分</td>
</tr>

<!-- ------------------------------------------------------------------ -->
<!-- ---------------工作能力--------------------------------------------------- -->
<tr>
	<td rowspan ="10" class="work_weight">工作能力</td><td rowspan="4"class="zhiban">执行力</td><td class="work_weight" rowspan="4">8%</td><td class="check_content">1.没有顶撞上级现象，能完全按上级要求完成工作。</td><td>7-8分</td>
	<td class="score" rowspan="4">
	<?php
	
		if(isset($i)&&$i!=null){
			echo "$i";
		}
		else{
			echo "<input type=\"text\"name=\"i\"/>";
		}
		
	
	?>
	</td>
</tr>
<tr>
	<td class="check_content">2.偶尔发生顶撞上级现象，但是能按要求完成工作。</td><td>5-6分</td>
</tr>
<tr>
	<td class="check_content">3.经常发生顶撞上级现象，但是基本能按要求完成工作。</td><td>3-4分</td>
</tr>
<tr>
	<td class="check_content">4.经常顶撞上级，不按上级的要求完成工作。</td><td>1-2分</td>
</tr>


<tr>
	<td rowspan="3"class="zhiban">判断力</td><td class="work_weight" rowspan="3">6%</td><td class="check_content">1.工作认真仔细，遇到问题能全面、深入考虑，独立、圆满解决。</td><td>5-6分</td>
	<td class="score" rowspan="3">
	<?php
	
		if(isset($j)&&$j!=null){
			echo "$j";
		}
		else{
			echo "<input type=\"text\"name=\"j\"/>";
		}
		
	
	?>
	</td>
</tr>

<tr>
	<td class="check_content">2.常规性工作认真仔细，遇到问题大多能考虑全面、独立解决或在少量协助下解决。</td><td>3-4分</td>
</tr>
<tr>
	<td class="check_content">3.不够认真仔细，日常工作多浮于表面，很少思考、独立解决问题。</td><td>1-2分</td>
</tr>


<tr>
	<td rowspan="3"class="zhiban">建设性</td><td class="work_weight" rowspan="3">6%</td><td class="check_content">1.主动与上层，同事交流，善于发现并提出部门工作中的问题，并积极解决。</td><td>5-6分</td>
	<td class="score" rowspan="3">
	<?php
	
		if(isset($k)&&$k!=null){
			echo "$k";
		}
		else{
			echo "<input type=\"text\"name=\"k\"/>";
		}
		
	
	?>
	</td>
</tr>

<tr>
	<td class="check_content">2.很少主动与上层，同事交流，很少发现并提出部门工作中的问题。</td><td>3-4分</td>
</tr>
<tr>
	<td class="check_content">3.从未主动与上层，同事交流，从未发现并提出部门工作中的问题。</td><td>1-2分</td>
</tr>


<!-- ------------------------------------------------------------------ -->
</table>
<div class="total_score_div">
	总得分：<?php echo "$total_score";?>
	</div>
	<br><br> 
<br>
	<div class="self_remark"><h4>员工评语</h4><?php	echo "$self_remark";?></div>
	<div class="leader_advice"><h4>主管评语</h4><?php	echo "$leader_advice";?></div>
	
	<div class="check_advice"><h4>考核组意见</h4><?php	echo "$check_advice";?></div>
<!--<input align ="center" type="submit" value="保存"/>-->
<!--</form>  -->
</center>
<br><br><br><br><br><br><br><br>
</body>

</html>