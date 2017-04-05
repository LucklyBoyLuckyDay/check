 <!DOCTYPE html>
 <html>
 <head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>资产主管考核表之财务组</title>
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
		.leader_advice_by_zichan{
			border:1px solid #C7D7EB;
			width:900px;
		}
		.total_score_by_zichan{
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
$sql="select name,apartment,score_tb_name from main_tb where id=$id";
$SqlTool=new SqlTool();
$res=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res);
$name=$row['name'];
$apartment=$row['apartment'];
$score_tb_name=$row['score_tb_name'];
mysql_free_result($res);

//获取类似xx_score
//从分数评语数表$score_tb_name中获取数据
$sql="select * from $score_tb_name where self_id=$id";
$res=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res);

//http://localhost/kaohe_web/table_html_chakan/wuting_by_caiwuzu_zhuguan.php?star_grade=&a1=&c1=&a2=&c2=&a3=&c3=&a4=&c4=&a5=&c5=&a6=&c6=&a7=&c7=&a8=&c8=&b1=&d1=&b2=&d2=&b3=&d3=&b4=&d4=&b5=&d5=&e=&f=&g=&h=#

$a1=$row['a1'];
$a2=$row['a2'];
$a3=$row['a3'];
$a4=$row['a4'];
$a5=$row['a5'];
$a6=$row['a6'];
$a7=$row['a7'];
$a8=$row['a8'];

$b1=$row['b1'];
$b2=$row['b2'];
$b3=$row['b3'];
$b4=$row['b4'];
$b5=$row['b5'];

$c1=$row['c1'];
$c2=$row['c2'];
$c3=$row['c3'];
$c4=$row['c4'];
$c5=$row['c5'];
$c6=$row['c6'];
$c7=$row['c7'];
$c8=$row['c8'];


$d1=$row['d1'];
$d2=$row['d2'];
$d3=$row['d3'];
$d4=$row['d4'];
$d5=$row['d5'];
/*
$e=$row['e'];

$f=$row['f'];

$g=$row['g'];

$h=$row['h'];
*/
$leader_advice_by_zichan=$row['leader_advice_by_zichan'];

$total_score_by_zichan=$row['total_score_by_zichan'];

mysql_free_result($res);

?>

<body>
<center>
<div class="tb_header">
<h3>资产主管考核表之财务组</h3>
</div>
<center>

<!--<form action="#" method="get">-->
	<table border="1px" width="900px" cellspacing="0px" bordercolor = "black">
	
	<tr>
		<td class="group">部门</td><td class="wuting"><!--学海舞厅--><?php echo "$apartment";?></td><td class="xingming">姓名：</td><td class="xingming_content"><!--郭清清	--><?php echo "$name";?></td>
		<td colspan="2" rowspan="3" class="xingji" > <font>星级：</font><!--<input class="display_star" type="text" name="star_grade"/>-->--</td>
	</tr>
	<tr>
		<td class="group">月份</td><td class="wuting">3</td><td class="xingming">总得分</td><td class="xingming_content">--</td>
	</tr>
	<tr>
		<td class="group">考核方面</td><td colspan="3" class="wuting">财务组	</td>
	</tr>
	<tr>
		<td class="group">考核指标</td><td colspan="3" class="wuting">考核内容</td><td class="score">得分</td><td class="beizhu">备注</td>
	</tr>
	
	<!-- -------------------------加分项------------------------- -->
	<tr>
		<td rowspan="8" class="group">加分项</td>
		<td colspan="3">1、参加基地主管会，每次加3分。</td><td class="score">
		<?php
			if(isset($a1)&&$a1!=null){
				echo "$a1";
			}
			else{
				echo "<input type=\"text\"name=\"a1\"/>";
			}
		?>
		</td><td class="beizhu">
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
		<td colspan="3">2、参加资产主管会，每次加2分</td><td class="score">
		<?php
			if(isset($a2)&&$a2!=null){
				echo "$a2";
			}
			else{
				echo "<input type=\"text\"name=\"a2\"/>";
			}
			
		?>
		</td><td class="beizhu">
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
		<td colspan="3">3、在值班时间上签到2次、3次的，分别加1、2分/项；</td><td class="score">
		<?php
			if(isset($a3)&&$a3!=null){
				echo "$a3";
			}
			else{
				echo "<input type=\"text\"name=\"a3\"/>";
			}
		?>
		</td><td class="beizhu">
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
	<tr>
		<td colspan="3">4、在基地主管会、资产主管会上积极发言的（指<br>出工作不足，提出工作意见，表达自己想法等），加2分/次。</td>
		<td class="score">
		<?php
			if(isset($a4)&&$a4!=null){
				echo "$a4";
			}
			else{
				echo "<input type=\"text\"name=\"a4\"/>";
			}
		?>
		</td><td class="beizhu">
		<?php
			if(isset($c4)&&$c4!=null){
				echo "$c4";
			}
			else{
				echo "<input type=\"text\"name=\"c4\"/>";
			}
		?>
		</td>
	</tr>
	<tr>
		<td colspan="3">5、在不影响工作质量下，有效的缩减部门开支的，视具体情况加2-5<br>分不等。</td>
		<td class="score">
		<?php
			if(isset($a5)&&$a5!=null){
				echo "$a5";
			}
			else{
				echo "<input type=\"text\"name=\"a5\"/>";
			}
		?>
		</td><td class="beizhu">
		<?php
			if(isset($c5)&&$c5!=null){
				echo "$c5";
			}
			else{
				echo "<input type=\"text\"name=\"c5\"/>";
			}
		?>
		</td>
	</tr>
	<tr>
		<td colspan="3">6、主动对部门报销进行分析，向财务组提出优化报销建议的，加<br>5分/次。</td>
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
		<td class="beizhu">
		<?php
			if(isset($c6)&&$c6!=null){
				echo "$c6";
			}
			else{
				echo "<input type=\"text\"name=\"c6\"/>";
			}
		?>
		</td>
	</tr>
	<tr>
		<td colspan="3">7、向财务组提出合理的工作建议的（报服务人数与时间、报销、打<br>印、物资领取等方面均可）并被采纳的，视具体情况加2-5分不等。</td>
		<td class="score">
		<?php
			if(isset($a7)&&$a7!=null){
				echo "$a7";
			}
			else{
				echo "<input type=\"text\"name=\"a7\"/>";
			}
		?>
		</td><td class="beizhu">
		<?php
			if(isset($c7)&&$c7!=null){
				echo "$c7";
			}
			else{
				echo "<input type=\"text\"name=\"c7\"/>";
			}
		?>
		</td>
	</tr>
	<tr>
		<td colspan="3">8、对本职或部门工作有创新想法并行之有效的，视具体情况加5-10<br>分不等。	</td>
		<td class="score">
		<?php
			if(isset($a8)&&$a8!=null){
				echo "$a8";
			}
			else{
				echo "<input type=\"text\"name=\"a8\"/>";
			}
		?>
		</td><td class="beizhu">
		<?php
			if(isset($c8)&&$c8!=null){
				echo "$c8";
			}
			else{
				echo "<input type=\"text\"name=\"c8\"/>";
			}
		?>
		</td>
	</tr>
	<!-- -------------------------扣分项------------------------- -->
	
	<tr>
		<td rowspan="5" class="group">扣分项</td>
		<td colspan="3">1、服务人数与时间的汇报。服务人数与时间的报表上主要有以下几<br>项：报数日期、部门、编号、服务人数与时间总计和平均值、报<br>数人姓名，以上各项出现错误的，每项扣1分/次。</td>
		<td class="score">
		<?php
			if(isset($b1)&&$b1!=null){
				echo "$b1";
			}
			else{
				echo "<input type=\"text\"name=\"b1\"/>";
			}
		?>
		</td><td class="beizhu">
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
		<td colspan="3">2、出勤率。值班中连续2次、3次、4次未签到的分别扣1分、2分、<br>3分；基地主管会和资产主管会以及每月资产主管交流会未参加<br>的，病假扣1分/次，事假扣2分/次，无故缺勤扣4分/次。	</td>
		<td class="score">
		<?php
			if(isset($b2)&&$b2!=null){
				echo "$b2";
			}
			else{
				echo "<input type=\"text\"name=\"b2\"/>";
			}
		?>
		</td><td class="beizhu">
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
		<td colspan="3">3、采购。进行自行采购之前未和财务组报备具体情况（物资名称、 数<br>量、单价、购买时间），  每项扣2分/次。		</td><td class="score">
		<?php
			if(isset($b3)&&$b3!=null){
				echo "$b3";
			}
			else{
				echo "<input type=\"text\"name=\"b3\"/>";
			}
		?>
		</td><td class="beizhu">
		<?php
			if(isset($d3)&&$d3!=null){
				echo "$d3";
			}
			else{
				echo "<input type=\"text\"name=\"d3\"/>";
			}
		?>
	</tr>
	<tr>
		<td colspan="3">4、打印。打印事项未提前至少1天和财务组报备的（允许当天根据<br>实际有所变动，但需和财务组说明）、未在值班时间内填写申请表<br>的，每项扣2分/次。	</td>
		<td class="score">
		<?php
			if(isset($b4)&&$b4!=null){
				echo "$b4";
			}
			else{
				echo "<input type=\"text\"name=\"b4\"/>";
			}
		?>
		</td><td class="beizhu">
		<?php
			if(isset($d4)&&$d4!=null){
				echo "$d4";
			}
			else{
				echo "<input type=\"text\"name=\"d4\"/>";
			}
		?>
		</td>
	</tr>
	<tr>
		<td colspan="3">5、报销。报销事项未提前至少一周和财务组或相关人员报备（报销<br>缘由、金额）、当月的报销发票未在下月1号之前上交的，每项扣 <br>3分/次。						
		</td>
		<td class="score">
		<?php
			if(isset($b5)&&$b5!=null){
				echo "$b5";
			}
			else{
				echo "<input type=\"text\"name=\"b5\"/>";
			}
		?>
		</td><td class="beizhu">
		<?php
			if(isset($d5)&&$d5!=null){
				echo "$d5";
			}
			else{
				echo "<input type=\"text\"name=\"d5\"/>";
			}
		?>
		</td>
	</tr>
	<!-- -------------------------合计------------------------- -->
	
	<tr>
		<td class="group">合计</td><td colspan="3">--</td><td class="score">
		<?php
			/*if(isset($e)&&$e!=null){
				echo "$e";
			}
			else{
				echo "<input type=\"text\"name=\"e\"/>";
			}*/
			echo "--";
		?>
		</td><td class="beizhu">
		<?php
			/*if(isset($f)&&$f!=null){
				echo "$f";
			}
			else{
				echo "<input type=\"text\"name=\"f\"/>";
			}*/
			echo "--";
		?>
		</td>
	</tr>
	<!-- -------------------------总评------------------------- -->
	<tr>
		<td class="group">总评</td><td colspan="3">--</td><td class="score">
		<?php
			/*if(isset($g)&&$g!=null){
				echo "$g";
			}
			else{
				echo "<input type=\"text\"name=\"g\"/>";
			}*/
			echo "--";
		?>
		</td><td class="beizhu">
		<?php
			/*if(isset($h)&&$h!=null){
				echo "$h";
			}
			else{
				echo "<input type=\"text\"name=\"h\"/>";
			}*/
			echo "--";
		?>
		</td>
	</tr>
	
	</table>
	<br><br>
	<div class="total_score_by_zichan">资产组评分：<?php echo "$total_score_by_zichan";?></div>
	
	<!--<input type="submit" value="保存"/>-->
	
	<div class="leader_advice_by_zichan"><h4>财务组评语</h4><?php	echo "$leader_advice_by_zichan";?></div>
	<br><br><br><br>
<!--</form>-->
</center>
</body>
	
	
	
	
	
	
	
	