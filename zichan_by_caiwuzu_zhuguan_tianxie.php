 <!DOCTYPE html>
 <html>
 <head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>财务组主管考核表</title>
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
		#input_save_button_id{
			width:60px;
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
		.note{
			font-size :small ;
			border:0px solid red;
			width:900px;
			text-align:left;
			margin-top:20px;
			color :red;
		}
	
	</style>
</head>
<?php
require_once "SqlTool.class.php";
//1.接收branch_id
if(!empty($_GET['branch_id'])){
	$branch_id=$_GET['branch_id'];
	
	$sql="select name,apartment from main_tb where id=$branch_id";
	$SqlTool=new SqlTool();
	$res_1=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res_1);
	$name=$row['name'];
	$apartment=$row['apartment'];
	mysql_free_result($res_1);
}
?>
<body>
<center>
<div class="tb_header">
<h3>财务组主管考核表</h3>
</div>
<center>

<form action="save_to_db_zichan_zhuguan_score_by_caiwu.php" method="get">
<?php
	echo "<input type=\"hidden\" name=\"id\" value=\"$branch_id\">";
?>

	<table border="1px" width="900px" cellspacing="0px" bordercolor = "black">
	
	<tr>
		<td class="group">部门</td><td class="wuting"><?php echo "$apartment"; ?></td><td class="xingming">姓名：</td><td class="xingming_content"><?php echo "$name"; ?></td>
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
		<td colspan="3">1、参加基地主管会，每次加3分。</td><td class="score"><input type="text" name="a1"/></td><td class="beizhu"><input type="text" name="c1"/></td>
	</tr>
	<tr>
		<td colspan="3">2、参加资产主管会，每次加2分</td><td class="score"><input type="text" name="a2"/></td><td class="beizhu"><input type="text" name="c2"/></td>
	</tr>
	<tr>
		<td colspan="3">3、在值班时间上签到2次、3次的，分别加1、2分/项；</td><td class="score"><input type="text" name="a3"/></td><td class="beizhu"><input type="text" name="c3"/></td>
	</tr>
	<tr>
		<td colspan="3">4、在基地主管会、资产主管会上积极发言的（指<br>出工作不足，提出工作意见，表达自己想法等），加2分/次。</td>
		<td class="score"><input type="text" name="a4"/></td><td class="beizhu"><input type="text" name="c4"/></td>
	</tr>
	<tr>
		<td colspan="3">5、在不影响工作质量下，有效的缩减部门开支的，视具体情况加2-5<br>分不等。</td>
		<td class="score"><input type="text" name="a5"/></td><td class="beizhu"><input type="text" name="c5"/></td>
	</tr>
	<tr>
		<td colspan="3">6、主动对部门报销进行分析，向财务组提出优化报销建议的，加<br>5分/次。</td>
		<td class="score"><input type="text" name="a6"/></td><td class="beizhu"><input type="text" name="c6"/></td>
	</tr>
	<tr>
		<td colspan="3">7、向财务组提出合理的工作建议的（报服务人数与时间、报销、打<br>印、物资领取等方面均可）并被采纳的，视具体情况加2-5分不等。</td>
		<td class="score"><input type="text" name="a7"/></td><td class="beizhu"><input type="text" name="c7"/></td>
	</tr>
	<tr>
		<td colspan="3">8、对本职或部门工作有创新想法并行之有效的，视具体情况加5-10<br>分不等。	</td>
		<td class="score"><input type="text" name="a8"/></td><td class="beizhu"><input type="text" name="c8"/></td>
	</tr>
	<!-- -------------------------扣分项------------------------- -->
	
	<tr>
		<td rowspan="5" class="group">扣分项</td>
		<td colspan="3">1、服务人数与时间的汇报。服务人数与时间的报表上主要有以下几<br>项：报数日期、部门、编号、服务人数与时间总计和平均值、报<br>数人姓名，以上各项出现错误的，每项扣1分/次。</td>
		<td class="score"><input type="text" name="b1"/></td><td class="beizhu"><input type="text" name="d1"/></td>
	</tr>
	<tr>
		<td colspan="3">2、出勤率。值班中连续2次、3次、4次未签到的分别扣1分、2分、<br>3分；基地主管会和资产主管会以及每月资产主管交流会未参加<br>的，病假扣1分/次，事假扣2分/次，无故缺勤扣4分/次。	</td>
		<td class="score"><input type="text" name="b2"/></td><td class="beizhu"><input type="text" name="d2"/></td>
	</tr>
	<tr>
		<td colspan="3">3、采购。进行自行采购之前未和财务组报备具体情况（物资名称、 数<br>量、单价、购买时间），  每项扣2分/次。		</td><td class="score"><input type="text" name="b3"/></td><td class="beizhu"><input type="text" name="d3"/></td>
	</tr>
	<tr>
		<td colspan="3">4、打印。打印事项未提前至少1天和财务组报备的（允许当天根据<br>实际有所变动，但需和财务组说明）、未在值班时间内填写申请表<br>的，每项扣2分/次。	</td>
		<td class="score"><input type="text" name="b4"/></td><td class="beizhu"><input type="text" name="d4"/></td>
	</tr>
	<tr>
		<td colspan="3">5、报销。报销事项未提前至少一周和财务组或相关人员报备（报销<br>缘由、金额）、当月的报销发票未在下月1号之前上交的，每项扣 <br>3分/次。						
		</td>
		<td class="score"><input type="text" name="b5"/></td><td class="beizhu"><input type="text" name="d5"/></td>
	</tr>
	<!-- -------------------------合计------------------------- -->
	
	<tr>
		<td class="group">合计</td><td colspan="3">--</td><td class="score"><!--<input type="text" name="e"/>-->--</td><td class="beizhu"><!--<input type="text" name="f"/>-->--</td>
	</tr>
	<!-- -------------------------总评------------------------- -->
	<tr>
		<td class="group">总评</td><td colspan="3">--</td><td class="score"><!--<input type="text" name="g"/>-->--</td><td class="beizhu"><!--<input type="text" name="h"/>-->--</td>
	</tr>
	</table>
	<div class="note">若无需备注，则相应项输入"--"
		<br>打分时，若该项加分，则输入正整数，如：加5分，则输入   5<br>
		若该项扣分，则输入负整数，如：减5分，则输入   -5<br>
		若该项无加分无扣分，则输入0，如：输入   0<br>
	
	
	</div>
	<br><br>
	
<!-- ------填写上级评价------------------------------------------------------------ -->
<!--<h4>上级评价</h4>-->
<!--修改用词-->
<h4>财务组评语</h4>
<textarea name="leader_advice_by_zichan" rows="10px" cols="100px">请填写财务组评语</textarea>
<br><br><br><br>
	<input type="submit" id="input_save_button_id" value="保存"/>
	<br><br><br><br>
</form>
</center>
</body>
	
	
	
	
	
	
	
	