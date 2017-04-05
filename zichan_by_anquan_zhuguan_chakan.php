 <!DOCTYPE html>
 <html>
 <head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>资产主管考核表之安全组</title>
	<style>
	
		tr{
			height:35px;
		}
		.group{
			text-align:center;
			width:86px;
		}
		.wuting{
		
			text-align:center;
			width:215px;
		
		}
		.xingming{
			text-align:center;
			width:75px;
		}
		.xingming_content{
			width:286px;
			text-align:center;
		}
		.score{
			width:126px;
			text-align:center;
		}
		.beizhu{
			width:132px;
			text-align:center;
		}
		.xingji{
			
			text-align:center;
		}
		input{
			width:120px;
			text-align:center;
			border:0;
		
		}
		.display_star{
			color:red;
			font-size:25px;
		
		}
		font{
			font-size:25px;
		
		}
		.tb_header{
			padding-top:30px;
			padding-bottom:30px;
		}
		.check_content{
		
			width:551px;
		
		}
		.leader_advice_by_anquan{
			border:1px solid #C7D7EB;
			width:900px;
		}
		.total_score_by_anquan{
			border:1px solid #C7D7EB;
			width:900px;
			margin-bottom:20px;
		}
	
	</style>
</head>
<?php

require_once "SqlTool.class.php";
//获取信息

$id=$_GET['branch_id'];
$sql="select name,score_tb_name from main_tb where id=$id";
$SqlTool=new SqlTool();
$res=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res);
$name=$row['name'];
$score_tb_name=$row['score_tb_name'];
mysql_free_result($res);

//获取类似xx_score
//从分数评语数表$score_tb_name中获取数据
$sql="select * from $score_tb_name where self_id=$id";
$res=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res);


//http://localhost/kaohe_web/table_html_chakan/wuting_by_anquan_zhuguan.php?an_quan_a1=&an_quan_c1=&an_quan_a2=&an_quan_c2=&an_quan_b1=&an_quan_d1=&an_quan_e=&an_quan_f=&an_quan_g=&an_quan_h=#

$anquan_a1=$row['anquan_a1'];
$anquan_a2=$row['anquan_a2'];

$anquan_c1=$row['anquan_c1'];
$anquan_c2=$row['anquan_c2'];

$anquan_b1=$row['anquan_b1'];

$anquan_d1=$row['anquan_d1'];

/*$anquan_e=$row['anquan_e'];

$anquan_f=$row['anquan_f'];

$anquan_g=$row['anquan_g'];

$anquan_h=$row['anquan_h'];*/

$leader_advice_by_anquan=$row['leader_advice_by_anquan'];

$total_score_by_anquan=$row['total_score_by_anquan'];

mysql_free_result($res);
?>
<body>
<center>
<div class="tb_header">
<h3>资产主管考核表之安全组</h3>
</div>
<center>



<!--<form action="#" method="get">-->
	<table border="1px" width="900px" cellspacing="0px" bordercolor = "black">
	
	
	<tr>
	<td class="group">考核方面</td><td class="wuting">安全组</td><td class="score">3</td><td class="beizhu">4</td>
	</tr>
	<tr>
	<td class="group">考核指标</td><td class="wuting">考核内容</td><td class="score">得分</td><td class="beizhu">备注</td>
	</tr>
	
<!---------------------------------- 加分项----------------------------- -->
	
	<tr>
	<td rowspan="2" class="group">加分项</td>
	<td class="check_content">1、资产主管对自己部门固定资产的了解程度。非常熟悉、较熟悉各加3分、2分。</td>
	<td class="score">
	<?php
		if(isset($anquan_a1)&&$anquan_a1!=null){
			echo "$anquan_a1";
		}
		else{
			echo "<input type=\"text\"name=\"anquan_a1\"/>";
		}
	?>
	</td>
	<td class="beizhu">
	<?php
		if(isset($anquan_c1)&&$anquan_c1!=null){
			echo "$anquan_c1";
		}
		else{
			echo "<input type=\"text\"name=\"anquan_c1\"/>";
		}
	?>
	</td>
	</tr>
	<tr>
	<td class="check_content">2、资产主管发现隐患或资产的损坏，并和安全组联系，每次加2分。</td>
	<td class="score">
	<?php
		if(isset($anquan_a2)&&$anquan_a2!=null){
			echo "$anquan_a2";
		}
		else{
			echo "<input type=\"text\"name=\"anquan_a2\"/>";
		}
	?>
	</td>
	<td class="beizhu">
	<?php
		if(isset($anquan_c2)&&$anquan_c2!=null){
			echo "$anquan_c2";
		}
		else{
			echo "<input type=\"text\"name=\"anquan_c2\"/>";
		}
	?>
	</td>
	</tr>
<!---------------------------------- 扣分项----------------------------- -->
	
	<tr>
	<td class="group">扣分项</td>
	<td class="check_content">1、固定资产缺少，而资产主管又难以解释清楚，根据资产重要程度扣1-3分。</td>
	<td class="score">
	<?php
		if(isset($anquan_b1)&&$anquan_b1!=null){
			echo "$anquan_b1";
		}
		else{
			echo "<input type=\"text\"name=\"anquan_b1\"/>";
		}
	?>
	</td>
	<td class="beizhu">
	<?php
		if(isset($anquan_d1)&&$anquan_d1!=null){
			echo "$anquan_d1";
		}
		else{
			echo "<input type=\"text\"name=\"anquan_d1\"/>";
		}
	?>
	</td>
	</tr>
<!---------------------------------- 合计----------------------------- -->
	
	<tr>
	<td class="group">合计</td>
	<td class="check_content">--</td>
	<td class="score">
	<?php
		/*if(isset($anquan_e)&&$anquan_e!=null){
			echo "$anquan_e";
		}
		else{
			echo "<input type=\"text\"name=\"anquan_e\"/>";
		}*/
		echo "--";
	?>
	</td>
	<td class="beizhu">
	<?php
		/*if(isset($anquan_f)&&$anquan_f!=null){
			echo "$anquan_f";
		}
		else{
			echo "<input type=\"text\"name=\"anquan_f\"/>";
		}*/
		echo "--";
	?>
	</td>
	
	</tr>
<!---------------------------------- 总评----------------------------- -->
	<tr>
	<td class="group">总评</td>
	<td class="check_content">--</td>
	<td class="score">
	<?php
		/*if(isset($anquan_g)&&$anquan_g!=null){
			echo "$anquan_g";
		}
		else{
			echo "<input type=\"text\"name=\"anquan_g\"/>";
		}*/
		echo "--";
	?>
	</td>
	<td class="beizhu">
	<?php
		/*if(isset($anquan_h)&&$anquan_h!=null){
			echo "$anquan_h";
		}
		else{
			echo "<input type=\"text\"name=\"anquan_h\"/>";
		}*/
		echo "--";
	?>
	</td>
	</tr>
	</table>
	<br><br>
	<div class="total_score_by_anquan">安全组评分：<?php echo "$total_score_by_anquan";?></div>
	
	<!--<input type="submit" value="保存"/>-->
	<div class="leader_advice_by_anquan"><h4>安全组评语</h4><?php	echo "$leader_advice_by_anquan";?></div>
	<br><br><br><br>
<!--</form>-->
</center>
</body>
	
	
	
	
	
	
	
	