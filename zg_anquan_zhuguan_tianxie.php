﻿ <!DOCTYPE html>
 <html>
 <head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>安全组主管考核评分表</title>
	
	
	
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
	</style>
	<script language="JavaScript" src="./extend/js/isEmptyForm.js"></script>
</head>
<?php
require_once "back_to_mainPage_login.php"

?>
<?php

//branch_id=$branch_id&leader_name=$leader_name&branch_name=$branch_name"
	//填表人，即表主人的上司
	$leader_name=$_GET['leader_name'];
	//表主人
	$branch_id=$_GET['branch_id'];
	$branch_name=$_GET['branch_name'];
	
?>

<body>
<center>
<div class="header_font">
安全组主管考核评分表
</div>
 <form action="save_to_db_zg_anquan_zhuguan.php" method="get">
<?php
echo "<input type=\"hidden\" name =\"branch_id\" value=\"$branch_id\">";
?>

<!-- -------------------------------表头--------------------------- -->
<table border="1px" width="1020" cellspacing="0px" bordercolor = "black">
<tr>


	<td class="tb1_header">考核部门</td><td class="tb1_header">综合管理部安全组</td><td class="tb1_header">考核年月</td><td class="tb1_header" id="display_check_date"><!--2016.3.10-2016.4.10--></td>
</tr>
<tr>


	<td class="tb1_bottom">考核人员</td><td class="tb1_bottom">
	<?php 
		echo "$branch_name";//输出表主人的姓名
	?>
	</td><td class="tb1_bottom">考核评分人员</td><td class="tb1_bottom">---</td>
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
	<td colspan ="4" class="check_content"><div class="content_left">1、各部门安全检查并记录。</div><div class="content_right">（认真检查：8分 ——未检查：0分）</div></td><td class="score"><input type="text" name="a1"/></td>

</tr>
<tr>

	<td colspan ="4" class="check_content"><div class="content_left">2、各部门固定资产的核实并记录。</div><div class="content_right">（认真核实：8分——未核实：0分）</div></td><td class="score"><input type="text" name="a2"/></td>
</tr>

<tr>

	<td colspan ="4" class="check_content"><div class="content_left">3、携带固定资产登记表并记录。</div><div class="content_right">（记录无误：7分——未携带：0分）</div></td><td class="score"><input type="text" name="a3"/></td>
</tr>

<tr>

	<td colspan ="4" class="check_content"><div class="content_left">4、及时发现安全隐患，协助值班人员进行解决。</div><div class="content_right">（成功解决：7分——未解决：0分）</div></td><td class="score"><input type="text" name="a4"/></td>
</tr>
<tr>

	<td colspan ="4" class="check_content"><div class="content_left">5、每月做好本组总结，透彻分析本月工作。 </div><div class="content_right">（分析良好：7分——未分析：0分）</div></td><td class="score"><input type="text" name="a5"/></td>
</tr>
<!-- -------------------------------参与会议-------------------------------------------- -->
<tr>

	<td rowspan="3" class="zhiban">参与会议</td>
	<td colspan ="4" class="check_content"><div class="content_left">1、按时参加基地主管会议。</div><div class="content_right">（全勤：7分——缺席两次及两次以上：0分）</div></td><td class="score"><input type="text" name="b1"/></td>
</tr>

<tr>

	<td colspan ="4" class="check_content"><div class="content_left">2、准时参加本部门会议。</div><div class="content_right">（全勤：7分——缺席两次及两次以上：0分）</div></td><td class="score"><input type="text" name="b2"/></td>
</tr>
<tr>

	<td colspan ="4" class="check_content"><div class="content_left">3、每月1号按时召开资产主管交流会。</div><div class="content_right">（顺利召开会议：7分——未召开会议：0分）</div></td><td class="score"><input type="text" name="b3"/></td>
</tr>
<!-- -------------------------------值班纪律-------------------------------------------- -->
<tr>

	<td rowspan="3" class="zhiban">值班纪律</td>
	<td colspan ="4" class="check_content"><div class="content_left">1、值班期间保证值班室的卫生纪律。</div><div class="content_right">（纪律卫生良好：7分——纪律和卫生均不好：0分）</div></td><td class="score"><input type="text" name="c1"/></td>
</tr>
<tr>

	<td colspan ="4" class="check_content"><div class="content_left">2、值班期间严禁吃饭等影响值班室形象的不良行为。</div><div class="content_right">（行为良好：7分——行为不好：0分）</div></td><td class="score"><input type="text" name="c2"/></td>
</tr>

<tr>

	<td colspan ="4" class="check_content"><div class="content_left">3、穿着正式，举止良好，佩戴工作证。</div><div class="content_right">（穿着得体：7分——穿着不整：0分）</div></td><td class="score"><input type="text" name="c3"/></td>
</tr>

<!-- -------------------------------其它-------------------------------------------- -->
<tr>

	<td rowspan="3" class="zhiban">其它</td><td colspan ="4" class="check_content"><div class="content_left">1、积极参加基地、部门举办的各类活动。</div><div class="content_right">（积极参与各项活动：7分——消极对待各项活动：0分）</div></td><td class="score"><input type="text" name="d1"/></td>
</tr>

<tr>

	<td colspan ="4" class="check_content"><div class="content_left">2、与组员良好沟通，并交接工作顺利。</div><div class="content_right">（沟通良好：7分——未沟通：0分）</div></td><td class="score"><input type="text" name="d2"/></td>
</tr>
<tr>

	<td colspan ="4" class="check_content"><div class="content_left">3、与各部门资产主管经常沟通交流。</div><div class="content_right">（沟通良好：7分——未沟通：0分）</div></td><td class="score"><input type="text" name="d3"/></td>
</tr>


</table>
<br><br>
<h4>上级评语</h4>
<textarea name="leader_advice" rows="10px" cols="120px">请填写上级评语</textarea>
<br><br><br>
<input type="submit" value="保存"/>
</form>
<br><br><br><br><br><br>
</center>
</body>

</html>

