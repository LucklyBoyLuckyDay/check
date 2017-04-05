 <!DOCTYPE html>
 <html>
 <head>
 	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>综管人事员工月度考核表</title>

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
	}
	input{
		
		border:0px;
		width:50px;
		text-align:center;
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
综管人事员工月度考核表
</div>
<center>
<form action="save_to_db_ren_zong_yuangong.php" method="get">
<?php

	echo "<input type =\"hidden\" name=\"id\" value=\"$branch_id\">";

?>

<table border="1px"  cellspacing="0px" bordercolor = "black">

<tr>
	<td align ="left" colspan="6">姓名：
	<?php 
		echo "$branch_name";//输出表主人的姓名
	?>
	
	</td>
</tr>
<tr>
	<td align ="center" colspan="2" rowspan="2">考核指标</td><td rowspan="2" class="work_weight">权重</td><td align ="center" rowspan="2" colspan="2">考  核  内  容</td><td align ="center" class="score" >得分</td>
</tr>
<tr>
	<td align ="center" id="display_check_month"><!--9月--></td>
</tr>
<!-- ------------工作任务------------------------------------------------------ -->
<!-- ------------------------------------------------------------------ -->
<tr>
	<td rowspan ="21" class="work_weight">工作任务</td><td rowspan="7" class="zhiban"class="zhiban">值班</td><td class="work_weight" rowspan="7">10%</td><td class="check_content_tb1" colspan="2" >1.迟到或早退十五分钟及以上扣2分/次。</td><td class="score"><input type="text"name="a1"/></td>
</tr>
<tr>
	<td class="check_content_tb1" colspan="2">2.病假扣1分/次，事假扣2分/次，无故缺勤5分/次。</td><td class="score"><input type="text"name="a2"/></td>
</tr>
<tr>
	<td class="check_content_tb1" colspan="2">3.脱岗/睡岗/干私活/看闲书/玩游戏等与值班工作无关事项，扣2分/次。</td><td class="score"><input type="text"name="a3"/></td>
</tr>
<tr>
	<td class="check_content_tb1" colspan="2">4.卫生责任区打扫不彻底/室内物品乱摆放/垃圾、杂物乱扔，扣2分/次。</td><td class="score"><input type="text"name="a4"/></td>
</tr>
<tr>
	<td class="check_content_tb1" colspan="2">5.下班后最后一人离岗，办公室水、电、空调、门窗等未关，扣2分/次。</td><td class="score"><input type="text"name="a5"/></td>
</tr>
<tr>
	<td class="check_content_tb1" colspan="2">6.造成财物损失，根据受损金额大小，扣5-10分。</td><td class="score"><input type="text"name="a6"/></td>
</tr>
<tr>
	<td class="check_content_tb1" colspan="2">7.此项基本分为10分，无加分，累计不低于0分。</td><td class="score"><input type="text"name="a7"/></td>
</tr>
<!-- ------------------------------------------------------------------ -->
<tr>
	<td rowspan ="4"class="zhiban">部门例会</td><td class="work_weight" rowspan ="4">10%</td><td class="check_content_tb1" colspan="2">1.迟到或早退十五分钟及以上扣2分/次。</td><td class="score"><input type="text"name="b1"/></td>
</tr>
<tr>
	<td class="check_content_tb1" colspan="2">2.病假扣1分/次，事假扣2分/次，无故缺勤5分/次。</td><td class="score"><input type="text"name="b2"/></td>
</tr>
<tr>
	<td class="check_content_tb1" colspan="2">3.会上积极发言参与加2分/次。</td><td class="score"><input type="text"name="b3"/></td>
</tr>
<tr>
	<td class="check_content_tb1" colspan="2">4此项基本分为5分，累计不超过10分。</td><td class="score"><input type="text"name="b4"/></td>
</tr>
<!-- ------------------------------------------------------------------ -->
<tr>
	<td rowspan="3"class="zhiban">基地主管会</td><td class="work_weight" rowspan="3">10%</td><td class="check_content_tb1" colspan="2">1.参加基地主管会加2分/次。</td><td class="score"><input type="text"name="c1"/></td>
</tr>
<tr>
	<td class="check_content_tb1" colspan="2">2.会上积极发言加2分/次。</td><td class="score"><input type="text"name="c2"/></td>
</tr>
<tr>
	<td class="check_content_tb1" colspan="2">3.此项基本分为0分，累计不超过10分。</td><td class="score"><input type="text"name="c3"/></td>
</tr>
<!-- ------------------------------------------------------------------ -->
<tr>
	<td rowspan="3"class="zhiban">其它任务</td><td class="work_weight" rowspan="3">10%</td><td class="check_content_tb1" colspan="2">1.按时按量完成基地上级交待的任务2分。</td><td class="score"><input type="text"name="d1"/></td>
</tr>
<tr>
	<td class="check_content_tb1" colspan="2">2.完成效果按情况加2-3分。</td><td class="score"><input type="text"name="d2"/></td>
</tr>
<tr>
	<td class="check_content_tb1" colspan="2">3.此项基本分为5分，累计不超过10分。</td><td class="score"><input type="text"name="d3"/></td>
</tr>
<!-- ------------------------------------------------------------------ -->

<tr>
	<td rowspan="3"class="zhiban">基地活动</td><td class="work_weight" rowspan="3">10%</td><td class="check_content_tb1" colspan="2">1.积极参加基地和部门的各项活动加2分。</td><td class="score"><input type="text"name="e1"/></td>
</tr>
<tr>
	<td class="check_content_tb1" colspan="2">2.组织活动按效果加2-3分。</td><td class="score"><input type="text"name="e2"/></td>
</tr>
<tr>
	<td class="check_content_tb1" colspan="2">3.此项基本分为5分，累计不超过10分。</td><td class="score"><input type="text"name="e3"/></td>
</tr>
<!-- ------------------------------------------------------------------ -->
<tr>
	<td colspan ="2" class="check_group_tag"class="zhiban">考核组标记</td><td colspan="6">---</td>
</tr>

</table>
<!--紧接着第二张表-->
<br><hr><br>
<!-- 分割线 -->
<!-- ------------------------------------------------------------------ -->
<!-- -----------------------工作态度------------------------------------------- -->

<table border="1px"  cellspacing="0px" bordercolor = "black">

<tr>
	<td rowspan ="12" class="work_weight">工作态度</td><td rowspan="4"class="zhiban">积极性</td><td class="work_weight" rowspan="4" >8%</td><td class="check_content">1.工作一贯积极主动，做事从来不需要上级督促。</td><td>7-8分</td><td class="score" rowspan="4"><input type="text"name="f"/></td>
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
	<td rowspan="4"class="zhiban">责任心</td><td class="work_weight" rowspan="4">8%</td><td class="check_content">1.工作十分负责，除了本职工作，还非常关心其他工作。</td><td>7-8分</td><td class="score" rowspan="4"><input type="text"name="g"/></td>
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
	<td rowspan="4"class="zhiban">协作性</td><td class="work_weight" rowspan="4">8%</td><td class="check_content">1.能够主动配合、帮助同事和其他部门开展工作。</td><td>7-8分</td><td class="score" rowspan="4"><input type="text"name="h"/></td>
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
	<td rowspan ="13" class="work_weight">工作能力</td><td rowspan="4"class="zhiban">执行力</td><td class="work_weight" rowspan="4">8%</td><td class="check_content">1.没有顶撞上级现象，能完全按上级要求完成工作。</td><td>7-8分</td><td class="score" rowspan="4"><input type="text"name="i"/></td>
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
	<td rowspan="3"class="zhiban">判断力</td><td class="work_weight" rowspan="3">6%</td><td class="check_content">1.工作认真仔细，遇到问题能全面、深入考虑，独立、圆满解决。</td><td>5-6分</td><td class="score" rowspan="3"><input type="text"name="j"/></td>
</tr>

<tr>
	<td class="check_content">2.常规性工作认真仔细，遇到问题大多能考虑全面、独立解决或在少量协助下解决。</td><td>3-4分</td>
</tr>
<tr>
	<td class="check_content">3.不够认真仔细，日常工作多浮于表面，很少思考、独立解决问题。</td><td>1-2分</td>
</tr>


<tr>
	<td rowspan="3"class="zhiban">计划性</td><td class="work_weight" rowspan="3">6%</td><td class="check_content">1.所有工作有计划性，对工作内容、时间、数量、程序安排合理、有效。</td><td>5-6分</td><td class="score" rowspan="3"><input type="text"name="k"/></td>
</tr>

<tr>
	<td class="check_content">2.大部分工作有计划性，对工作内容、时间、数量、程序安排比较合理、有效。</td><td>3-4分</td>
</tr>
<tr>
	<td class="check_content">3.工作不讲究计划性，对工作内容、时间、数量、程序安排不一定合理、有效。</td><td>1-2分</td>
</tr>


<tr>
	<td rowspan="3"class="zhiban">工作量</td><td class="work_weight" rowspan="3">6%</td><td class="check_content">1.工作品质高，与工作标准和目标一致，工作过程准确性高、几乎无反复工作。</td><td>5-6分</td><td class="score" rowspan="3"><input type="text"name="l"/></td>
</tr>

<tr>
	<td class="check_content">2.大多数工作能达到工作标准和目标，工作过程准确性一般、偶尔有反复工作。</td><td>3-4分</td>
</tr>
<tr>
	<td class="check_content">3.经常达不到工作标准和目标，工作过程准确性差、经常反复工作。</td><td>1-2分</td>
</tr>

<!-- ------------------------------------------------------------------ -->

</table>
<!-- ------填写主管意见------------------------------------------------------------ -->
<h4>主管评语</h4>
<textarea name="zhuguan_remark" rows="10px" cols="120px">请填写主管评语</textarea>
<br><br><br>
<input align ="center" type="submit" value="保存"/>
</form>
</center>
<br><br><br><br><br><br><br><br>
</body>

</html>