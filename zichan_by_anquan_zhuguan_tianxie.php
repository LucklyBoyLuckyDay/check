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
		.check_content{
		
			width:551px;
		
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
<h3>资产主管考核表之安全组</h3>
</div>
<center>



<form action="save_to_db_zichan_zhuguan_score_by_anquan.php" method="get">
<?php
	echo "<input type=\"hidden\" name=\"id\" value=\"$branch_id\">";
?>
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
	<td class="score"><input type="text" name="anquan_a1"/></td>
	<td class="beizhu"><input type="text" name="anquan_c1"/></td>
	</tr>
	<tr>
	<td class="check_content">2、资产主管发现隐患或资产的损坏，并和安全组联系，每次加2分。</td>
	<td class="score"><input type="text" name="anquan_a2"/></td>
	<td class="beizhu"><input type="text" name="anquan_c2"/></td>
	</tr>
<!---------------------------------- 扣分项----------------------------- -->
	
	<tr>
	<td class="group">扣分项</td>
	<td class="check_content">1、固定资产缺少，而资产主管又难以解释清楚，根据资产重要程度扣1-3分。</td>
	<td class="score"><input type="text" name="anquan_b1"/></td>
	<td class="beizhu"><input type="text" name="anquan_d1"/></td>
	</tr>
<!---------------------------------- 合计----------------------------- -->
	
	<tr>
	<td class="group">合计</td>
	<td class="check_content">--</td>
	<td class="score"><!--<input type="text" name="anquan_e"/>-->--</td>
	<td class="beizhu"><!--<input type="text" name="anquan_f"/>-->--</td>
	
	</tr>
<!---------------------------------- 总评----------------------------- -->
	<tr>
	<td class="group">总评</td>
	<td class="check_content">--</td>
	<td class="score"><!--<input type="text" name="anquan_g"/>-->--</td>
	<td class="beizhu"><!--<input type="text" name="anquan_h"/>-->--</td>
	</tr>
	</table>
	<div class="note">若无需备注，则相应项输入"--"
		<br>打分时，若该项加分，则输入正整数，如：加5分，则输入   5<br>
		若该项扣分，则输入负整数，如：减5分，则输入   -5<br>
		若该项无加分无扣分，则输入0，如：输入   0<br>
	
	
	</div>
	<br><br>
	<!-- ------填写上级评价------------------------------------------------------------ -->
<h4>安全组评语</h4>
<textarea name="leader_advice_by_anquan" rows="10px" cols="100px">请填写安全组评语</textarea>
<br><br><br><br>
	<input type="submit" id="input_save_button_id" value="保存"/>
	<br><br><br><br>
</form>
</center>
</body>
	
	
	
	
	
	
	
	