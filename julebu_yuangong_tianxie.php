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
	</style>
	<script language="JavaScript" src="./extend/js/isEmptyForm.js"></script>
</head>
<?php

//branch_id=$branch_id&leader_name=$leader_name&branch_name=$branch_name"
	//填表人，即表主人的上司
	$leader_name=$_GET['leader_name'];
	//表主人
	$branch_id=$_GET['branch_id'];
	$branch_name=$_GET['branch_name'];
	
?>


<body>

<div class="header_font">
俱乐部员工月度考核表
</div>
<form action="save_to_db_julebu_yuangong.php" method="get">
<?php
echo "<input type =\"hidden\" name=\"id\" value =\"$branch_id\">";//输出表主人的id
?> 
<center>
	<table border="1px"  cellspacing="0px" bordercolor = "black">
	
	<tr>
	
	<td  class="weidu">姓名</td><td colspan="2">
	<?php 
		echo "$branch_name";//输出表主人的姓名
	?>
	
	</td><td class="weight"></td><td class="checked_time">考核时间</td>
	
	</tr>
	<tr>
	<td  class="weidu">维度</td>
	<td class="zhibiao">指标</td>
	<td class="biaozhun" id="biaozhun_id">标准</td>
	<td class="weight">权重</td>
	<td class="checked_time"id="display_check_month"><!--3月--></td>
	
	</tr>
	<tr>
	<td rowspan="4"  class="weidu">值班工作</td><td class="zhibiao">出勤</td><td>值班时出现迟到、早退情况，因紧急事情请假者：一次扣1分；<br>无通知者：一次扣2分。<br>
基本分为10分。</td><td class="weight">10%</td><td class="checked_time"><input type="text" name="a1"/></td>
	
	</tr>
	<tr>
	<td class="zhibiao"><font>违纪</font></td>
	<td class="biaozhun">	
		<font>
		值班时出现旷班、睡班情况，一次扣5分<br>
		出现玩手机或其他娱乐与值班工作无关的情况，一次扣2分。<br>
		基本分为10分。
		</font>
	</td><td class="weight"><font>10%</font></td><td class="checked_time"><input type="text"  name="a2"/></td>
	
	</tr>
	<tr>
	<td class="zhibiao">换班</td>
	<td class="biaozhun">
		该本人值班时，出现换班情况，一次扣1分。<br>
		基本分为5分。
	</td>
	<td class="weight">5%</td><td class="checked_time"><input type="text"  name="a3"/></td>
	
	</tr>
	<tr>
	<td class="zhibiao">日常工作</td>
	<td class="biaozhun">
		值班时出现忘记打扫卫生、洗手套、关电源等情况，一次<br>扣2分。<br>
		基本分为10分。
	</td>
	<td class="weight">10%</td><td class="checked_time"><input type="text"  name="a4"/></td>
	
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
	<td class="weight">10%</td><td class="checked_time"><input type="text"  name="b"/></td>
	
	</tr>
	<tr>
	<td rowspan="2"  class="weidu">部门活动</td><td class="zhibiao">部门工作</td>
	<td class="biaozhun">
		积极参加部门工作，作为主负责人，加5分；<br>
		积极参加部门工作，辅助部门活动，加2分；<br>
		无故不参加部门工作，扣五分；<br>
		<font>基本分为5分，最高不超过10分</font>
	</td>
	<td class="weight">10%</td><td class="checked_time"><input type="text"  name="c1"/></td>
	
	</tr>
	<tr>
	<td class="zhibiao">部门聚会活动</td><td class="biaozhun">
		积极参加部门聚会活动，作为主负责人。加五分；<br>
		积极参加部门聚会活动，加2分；<br>
		无故不参加，扣五分；<br>
		<font>基本分为5分，最高不超过10分</font>
	</td>
	<td class="weight">10%</td><td class="checked_time"><input type="text"  name="c2"/></td>
	
	</tr>
	<tr>
	<td  class="weidu">基地活动</td><td class="zhibiao">基地活动</td>
	<td class="biaozhun">
		积极参加基地活动，作为活动总负责人，加10分；<br>
		积极参加基地活动，作为部门主负责人，加5分；<br>
		积极参加基地活动，协助开展基地工作，加2分；<br>
		<font>基本分为0分，最高不超过15分</font>
	</td>
	<td class="weight"><font>15%</font></td><td class="checked_time"><input type="text"  name="d"/></td>
	
	</tr>
	<tr>
	<td  class="weidu">工作态度</td><td class="zhibiao">工作态度</td>
	<td class="biaozhun">
		对待工作认真负责，值班工作无差错，积极参加部门活动，共同创建部门家文化；（15-20分）<br>
		对待工作态度一般，参加部门活动；（10-15分）<br>
		对待工作态度差，不愿参加部门活动；（1-10分）<br>
	</td>
	<td class="weight">20%</td><td class="checked_time"><input type="text"  name="e"/></td>
	
	</tr>
	
	</table>
	<br><br>
	<!-- ------填写上级评价------------------------------------------------------------ -->
	<h4>上级评价</h4>
	<textarea name="leader_advice" rows="10px" cols="100px">请填写上级评价</textarea>
	
	<br><br><br>
	<input type="submit" value="保存">
	<br><br><br><br><br><br>
<center>

</form>
</body>
