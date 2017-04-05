 <!DOCTYPE html>
 <html>
 <head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>人事主管月度考核表</title>
	
	<style>
		tr{
			height:35px;
		}
		.xingming{
			width:80px;
			text-align:center;
		}
		.bumenlihui{
			width:99px;
			text-align:center;
		}
		.weight{
			width:41px;
			text-align:center;
		}
		.check_content{
			width:780px;
		}
		.fenshuduan{
			width:52px;
			text-align:center;
		}
		.buzhang_score{
			text-align:center;
			width:45px;
		}
		.renshibhu_score{
			width:48px;
			text-align:center;
		}
		.zonghe_score{
			width:45px;
			text-align:center;
		}
		.check_content_header{
			text-align:center;
		}
		.score{
			text-align:center;
			
		}
		input{
			text-align:center;
			width:38px;
			border:0;
		}
		div{
			padding-top:10px;
			padding-bottom:10px;
		}
		/*.leader_advice{
			border:1px solid blue;
			width :1225px;
		}
		
		.buzhang_advice{
			border:1px solid blue;
			width :1225px;
		} 
		
		.zhuguan_feedback{
			border:1px solid blue;
			width :1225px;
		}
		
		.check_advice{
			border:1px solid blue;
			width :1225px;
		}*/
		.leader_advice,.buzhang_advice,.zhuguan_feedback,.check_advice{
			border:1px solid #C2D5E8;
			width :1225px;
			margin-top:80px;
		}
		.total_score_div{
			border:1px solid #C2D5E8;
			height:32px;
			width:1225px;
		}
	</style>
	
</head>
<?php
require_once "SqlTool.class.php";
//获取信息

$id=$_GET['branch_id'];
$sql="select apartment,name,score_tb_name from main_tb where id=$id";
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

//http://localhost/kaohe_web/table_html_chakan/bumen_renshi_zhuguan.php?a1=&a2=&a3=&a4=&c1=&c2=&c3=&d=&e=&f=&g=&h=&i=&j=&k=&l=&m=&n=&o=&p=&q=&r=&s=&t=&v=&v=&w=&x=&y=&z=#

$a1=$row['a1'];
$a2=$row['a2'];
$a3=$row['a3'];
$a4=$row['a4'];

$c1=$row['c1'];
$c2=$row['c2'];
$c3=$row['c3'];

$d=$row['d'];

$e=$row['e'];

$f=$row['f'];

$g=$row['g'];

$h=$row['h'];

$i=$row['i'];

$j=$row['j'];

$k=$row['k'];

$l=$row['l'];

$m=$row['m'];

$n=$row['n'];

$o=$row['o'];

$p=$row['p'];

$q=$row['q'];

$r=$row['r'];

$s=$row['s'];

$t=$row['t'];

$u=$row['u'];

$v=$row['v'];

$w=$row['w'];

$x=$row['x'];

$y=$row['y'];

$z=$row['z'];

$score_renshi=$row['score_renshi'];
$score_gebuzhang=$row['score_gebuzhang'];
$buzhang_advice=$row['buzhang_advice'];

$check_advice=$row['check_advice'];

$zhuguan_feedback=$row['zhuguan_feedback'];

//$leader_advice=$row['leader_advice'];


mysql_free_result($res);
/**
 *date:2017/02/13
 *人事主管的总得分是人事部长($score_renshi)和各部门部长($score_gebuzhang)的平均分
 */
$total_score=($score_renshi+$score_gebuzhang)/2;
//将总得分存入数据库
$sql="update $score_tb_name set total_score=$total_score  where self_id=$id";

$res=$SqlTool->execute_dml($sql);

?>



<body>
<div>
<center>
<h3>人事主管月度考核表</h3>
</center>
</div>
<center>
<!--<form action="#" method="get"> -->
	<table border="1px"  cellspacing="0px" bordercolor = "black">
	
	<tr>
	<td class="xingming">姓名</td><td colspan="2"><center><?php echo "$name";?></center></td><td colspan="2" ><?php echo "&nbsp;部门：$apartment";?></td><td colspan="3" class="score">得分</td>
	</tr>
	<tr>
	<td colspan="2" class="xingming">考核指标</td><td class="weight">权重</td><td colspan="2" class="check_content_header">考核内容</td><td class="buzhang_score">部长打分</td><td class="renshibhu_score">人事部打分</td><td class="zonghe_score">综合得分</td>
	</tr>
	<!-- 工作任务 -->
				<!-- 部门例会 -->
	<tr>
		<td rowspan="23" class="xingming">工作任务</td>
		<td class="bumenlihui" rowspan="4">部门例会、基地主管会</td><td class="weight" rowspan="4">8%</td>
		<td colspan="2" class="check_content">1.迟到或早退十五分钟及以上扣2分/次。</td>
		<td class="buzhang_score">
		<?php
	
			if(isset($a1)&&$a1!=null){
				echo "$a1";
			}
			else{
				echo "<input type=\"text\"name=\"a1\"/>";
			}
		?>
		</td><td class="renshibhu_score">---</td><td class="zonghe_score">---</td>
	</tr>
	<tr>
		<td colspan="2" class="check_content">2.病假扣1分/次，事假扣2分/次，无故缺勤扣3分/次。</td>
		<td class="buzhang_score">
		<?php
	
			if(isset($a2)&&$a2!=null){
				echo "$a2";
			}
			else{
				echo "<input type=\"text\"name=\"a2\"/>";
			}
		?>
		</td><td class="renshibhu_score">---</td><td class="zonghe_score">---</td>
	</tr>
	<tr>
		<td colspan="2" class="check_content">3.会上积极发言参与加2分/次。</td>
		<td class="buzhang_score">
		<?php
	
			if(isset($a3)&&$a3!=null){
				echo "$a3";
			}
			else{
				echo "<input type=\"text\"name=\"a3\"/>";
			}
		?>
		</td><td class="renshibhu_score">---</td><td class="zonghe_score">---</td>
	</tr>
	<tr>
		<td colspan="2" class="check_content">4.此项基本分为0分，累计不超过8分。</td>
		<td class="buzhang_score">
		<?php
	
			if(isset($a4)&&$a4!=null){
				echo "$a4";
			}
			else{
				echo "<input type=\"text\"name=\"a4\"/>";
			}
		?>
		</td><td class="renshibhu_score">---</td><td class="zonghe_score">---</td>
	</tr>
	
				<!-- 基地活动 -->
	<tr>
		<td rowspan="3" class="bumenlihui">参加基地活动</td><td rowspan="3" class="weight">8%</td><td colspan="2" class="check_content">1.积极参加基地和部门的各项活动加2分</td>
		<td class="buzhang_score">
		<?php
	
			if(isset($c1)&&$c1!=null){
				echo "$c1";
			}
			else{
				echo "<input type=\"text\"name=\"c1\"/>";
			}
		?>
		</td><td class="renshibhu_score">---</td><td class="zonghe_score">---</td>
	</tr>
	<tr>
		<td colspan="2" class="check_content">2.组织活动按效果加2-3分。</td>
		<td class="buzhang_score">
		<?php
	
			if(isset($c2)&&$c2!=null){
				echo "$c2";
			}
			else{
				echo "<input type=\"text\"name=\"c2\"/>";
			}
		?>
		</td><td class="renshibhu_score">---</td><td class="zonghe_score">---</td>
	</tr>
	<tr>
		<td colspan="2" class="check_content">3.此项基本分为0分，累计不超过8分。</td>
		<td class="buzhang_score">
		<?php
	
			if(isset($c3)&&$c3!=null){
				echo "$c3";
			}
			else{
				echo "<input type=\"text\"name=\"c3\"/>";
			}
		?>
		</td><td class="renshibhu_score">---</td><td class="zonghe_score">---</td>
	</tr>
	
	
				<!-- 其它任务 -->
	<tr>
		<td rowspan="3" class="bumenlihui">其他任务</td><td class="weight" rowspan="3">6%</td><td class="check_content">1.经常检查督促部门近期工作执行情况，并根据实际情况调整相关工作安排</td><td class="fenshuduan">5-6分</td><td rowspan="3" class="buzhang_score">
		<?php
	
			if(isset($d)&&$d!=null){
				echo "$d";
			}
			else{
				echo "<input type=\"text\"name=\"d\"/>";
			}
		?>
		</td>
		<td rowspan="3" class="renshibhu_score">---</td><td rowspan="3" class="zonghe_score">---</td>
	</tr>
	<tr>
		<td class="check_content">2.基本上了解部门近期工作执行情况。</td><td class="fenshuduan">3-4分</td>
	</tr>
	<tr>
		<td class="check_content">3.很少或基本上不了解部门近期工作执行情况。</td><td class="fenshuduan">1-2分</td>
	</tr>
	
	
			<!--e 月度考核 -->
	<tr>
		<td rowspan="3" class="bumenlihui">月度考核</td><td class="weight" rowspan="3">6%</td><td class="check_content">1.每月能够按时完成月度考核任务，在规定时间内完善月度考核表的内容，做好监督和执行工作。</td><td class="fenshuduan">5-6分</td><td rowspan="3" class="buzhang_score">---</td>
		<td rowspan="3" class="renshibhu_score">
		<?php
	
			if(isset($e)&&$e!=null){
				echo "$e";
			}
			else{
				echo "<input type=\"text\"name=\"e\"/>";
			}
		?>
		</td><td rowspan="3" class="zonghe_score">---</td>
	</tr>
	<tr>
		<td class="check_content">2.本月基本上能监督并完成月度考核任务，偶尔需要提醒催促。</td><td class="fenshuduan">3-4分</td>
	</tr>
	<tr>
		<td class="check_content">3.本月不能完成月度考核任务，需要多次提醒催促。</td><td class="fenshuduan">1-2分</td>
	</tr>
	
			<!-- f工资保送 -->
	<tr>
		<td rowspan="4"class="bumenlihui">工资报送</td><td rowspan="4" class="weight">6%</td><td class="check_content">1.本月能够在规定时间内按照工资报送制度填写相关工资报送表格发送至人事部，且内容格式准确无误。</td><td class="fenshuduan">6分</td><td rowspan="4" class="buzhang_score">---</td><td rowspan="4" class="renshibhu_score">
		<?php
	
			if(isset($f)&&$f!=null){
				echo "$f";
			}
			else{
				echo "<input type=\"text\"name=\"f\"/>";
			}
		?>
		</td><td rowspan="4" class="zonghe_score">---</td>
	</tr>
	<tr>
		<td class="check_content">2.本月基本上能够完成工资报送工作，内容格式基本无误。</td><td class="fenshuduan">4-5分</td>
	</tr>
	<tr>
		<td class="check_content">3.本月工资报送不及时，对基地整体工资报送工作造成影响，但内容格式基本无误。</td><td class="fenshuduan">2-3分</td>
	</tr>
	<tr>
		<td class="check_content">4.本月工资报送工作不能按照要求进行，影响基地整体工资报送工作。</td><td class="fenshuduan">1分</td>
	</tr>
			
			<!-- g档案更新 -->
	<tr>
		<td rowspan="3" class="bumenlihui">档案更新</td><td class="weight" rowspan="3">6%</td><td class="check_content">1.本月能够在指定日期前将本部门电子档案按照要求制作完毕并发送至人事部档案组邮箱，内容格式准确无误。</td><td class="fenshuduan">5-6分</td><td rowspan="3" class="buzhang_score">---</td><td rowspan="3" class="renshibhu_score">
		<?php
	
			if(isset($g)&&$g!=null){
				echo "$g";
			}
			else{
				echo "<input type=\"text\"name=\"g\"/>";
			}
		?>
		</td><td rowspan="3" class="zonghe_score">---</td>
	</tr>
	<tr>
		<td class="check_content">2.本月基本上可以完成本部门电子档案制作工作，偶尔需要提醒催促。</td><td class="fenshuduan">3-4分</td>
	</tr>
	<tr>
		<td class="check_content">3.本月未能按时完成本部门电子档案制作工作，需要多次提醒催促。</td><td class="fenshuduan">1-2分</td>
	</tr>
	
			<!--h 聘书 -->		
	<tr>
		<td rowspan="3" class="bumenlihui">聘书入（离）职等手续办理</td><td class="weight" rowspan="3">6%</td><td class="check_content">1.部门人员入（离）职手续、聘书申请等工作能够严格按照人员任用制度进行，在指定日期内完成相关手续的办理。</td><td class="fenshuduan">5-6分</td><td rowspan="3" class="buzhang_score">---</td><td rowspan="3" class="renshibhu_score">
		<?php
	
			if(isset($h)&&$h!=null){
				echo "$h";
			}
			else{
				echo "<input type=\"text\"name=\"h\"/>";
			}
		?>
		</td><td rowspan="3" class="zonghe_score">---</td>
	</tr>
	<tr>
		<td class="check_content">2.部门人员入（离）职手续、聘书申请等工作基本上按照要求进行。</td><td class="fenshuduan">3-4分</td>
	</tr>
	<tr>
		<td class="check_content">3.部门人员入（离）职手续、聘书申请等工作没有按照人员任用制度进行，对基地整体的人事管理工作造成影响。</td><td class="fenshuduan">1-2分</td>
	</tr>
	
	
	
	<!-- 工作态度 -->
			<!-- i j积极性 -->	
	<tr>
		<td rowspan="12" class="xingming">工作态度</td>
		<td rowspan="4" class="bumenlihui">积极性</td><td rowspan="4" class="weight">6%</td><td class="check_content">1.工作一贯积极主动，做事从来不需要上级督促。</td><td class="fenshuduan">6分</td><td rowspan="4" class="buzhang_score">
		<?php
	
			if(isset($i)&&$i!=null){
				echo "$i";
			}
			else{
				echo "<input type=\"text\"name=\"i\"/>";
			}
		?>
		</td><td rowspan="4" class="renshibhu_score">
		<?php
	
			if(isset($j)&&$j!=null){
				echo "$j";
			}
			else{
				echo "<input type=\"text\"name=\"j\"/>";
			}
		?>
		</td><td rowspan="4" class="zonghe_score">---</td>
	</tr>
	<tr>
		<td class="check_content">2.工作是积极主动的，但有时需要上级提醒。</td><td class="fenshuduan">4-5分</td>
	</tr>
	<tr>
		<td class="check_content">3.工作不是很积极主动，很多时候都需要上级提醒。</td><td class="fenshuduan">2-3分</td>
	</tr>
	<tr>
		<td class="check_content">4.工作完全不不积极主动，总是需要上级提醒。</td><td class="fenshuduan">1分</td>
	</tr>
	
			<!-- k,l责任心 -->	
	<tr>
		<td rowspan="4"class="bumenlihui">责任心</td><td rowspan="4"class="weight">6%</td><td class="check_content">1.工作十分负责，除了本职工作，还非常关心其他工作。</td><td class="fenshuduan">6分</td><td rowspan="4" class="buzhang_score">
		<?php
	
			if(isset($k)&&$k!=null){
				echo "$k";
			}
			else{
				echo "<input type=\"text\"name=\"k\"/>";
			}
		?>
		</td><td rowspan="4" class="renshibhu_score">
		<?php
	
			if(isset($l)&&$l!=null){
				echo "$l";
			}
			else{
				echo "<input type=\"text\"name=\"l\"/>";
			}
		?>
		</td><td rowspan="4" class="zonghe_score">---</td>
	</tr>
	<tr>
		<td class="check_content">2.能够按职责要求工作，对自己的工作负责。</td><td class="fenshuduan">4-5分</td>
	</tr>
	<tr>
		<td class="check_content">3.一般能按职责要求工作，偶尔出现推诿现象。</td><td class="fenshuduan">2-3分</td>
	</tr>
	<tr>
		<td class="check_content">4.工作马虎，不愿意为自己的工作负责，经常推诿责任。</td><td class="fenshuduan">1分</td>
	</tr>

	
				<!-- m,n协作性 -->	
	<tr>
		<td rowspan="4"class="bumenlihui">协作性</td><td rowspan="4"class="weight">6%</td><td class="check_content">1.能够主动配合、帮助同事和其他部门开展工作</td><td class="fenshuduan">6分</td><td rowspan="4" class="buzhang_score">
		<?php
	
			if(isset($m)&&$m!=null){
				echo "$m";
			}
			else{
				echo "<input type=\"text\"name=\"m\"/>";
			}
		?>
		</td><td rowspan="4" class="renshibhu_score">
		<?php
	
			if(isset($n)&&$n!=null){
				echo "$n";
			}
			else{
				echo "<input type=\"text\"name=\"n\"/>";
			}
		?>
		</td><td rowspan="4" class="zonghe_score">---</td>
	</tr>
	<tr>
		<td class="check_content">2.在要求和安排下能够配合、帮助同事和其他部门开展工作。</td><td class="fenshuduan">4-5分</td>
	</tr>
	<tr>
		<td class="check_content">3.在要求和安排下多数情况下能够配合其他部门和同事开展部分工作。</td><td class="fenshuduan">2-3分</td>
	</tr>
	<tr>
		<td class="check_content">4.不太愿意为其他部门和同事提供帮助和配合。
</td><td class="fenshuduan">1分</td>
	</tr>
	
	
<!-- 工作能力 -->
			<!-- o,p执行能力 -->	
	<tr>
		<td rowspan="19" class="xingming">工作能力</td>
		<td rowspan="4"class="bumenlihui">执行能力</td><td rowspan="4" class="weight">6%</td><td class="check_content">1.没有顶撞上级现象，能完全按上级要求完成工作。</td><td class="fenshuduan">6分</td><td rowspan="4" class="buzhang_score">
		<?php
	
			if(isset($o)&&$o!=null){
				echo "$o";
			}
			else{
				echo "<input type=\"text\"name=\"o\"/>";
			}
		?>
		</td><td rowspan="4" class="renshibhu_score">
		<?php
	
			if(isset($p)&&$p!=null){
				echo "$p";
			}
			else{
				echo "<input type=\"text\"name=\"p\"/>";
			}
		?>
		</td><td rowspan="4" class="zonghe_score">---</td>
	</tr>
	<tr>
		<td class="check_content">2.偶尔发生顶撞上级现象，但是能按要求完成工作</td><td class="fenshuduan">4-5分</td>
	</tr>
	<tr>
		<td class="check_content">3.经常发生顶撞上级现象，但是基本能按要求完成工作。</td><td class="fenshuduan">2-3分</td>
	</tr>
	<tr>
		<td class="check_content">4.经常顶撞上级，不按上级的要求完成工作。</td><td class="fenshuduan">1分</td>
	</tr>
	
	
				<!-- q,r沟通能力 -->	
	<tr>
		<td rowspan="3" class="bumenlihui">沟通能力</td><td class="weight" rowspan="3">6%</td><td class="check_content">1.与上下级及同事之间有良好的沟通，能够协调好部门间的和部门成员间的工作关系。</td><td class="fenshuduan">5-6分</td><td rowspan="3" class="buzhang_score">
		<?php
	
			if(isset($q)&&$q!=null){
				echo "$q";
			}
			else{
				echo "<input type=\"text\"name=\"q\"/>";
			}
		?>
		</td><td rowspan="3" class="renshibhu_score">
		<?php
	
			if(isset($r)&&$r!=null){
				echo "$r";
			}
			else{
				echo "<input type=\"text\"name=\"r\"/>";
			}
		?>
		</td><td rowspan="3" class="zonghe_score">---</td>
	</tr>
	<tr>
		<td class="check_content">2.与上下级及同事之间的沟通较少，但对工作的展开影响不大。</td><td class="fenshuduan">3-4分</td>
	</tr>
	<tr>
		<td class="check_content">3.与上下级及同事之间的沟通有困难，不能处理好部门间的或部门成员间的工作关系。</td><td class="fenshuduan">1-2分</td>
	</tr>
	
	
	
	
				<!-- s,t分析判断能力 -->	
	<tr>
		<td rowspan="3" class="bumenlihui">分析判断能力</td><td class="weight" rowspan="3">6%</td><td class="check_content">1.工作认真仔细，遇到问题能全面、深入考虑，独立、圆满解决。</td><td class="fenshuduan">5-6分</td><td rowspan="3" class="buzhang_score">
		<?php
	
			if(isset($s)&&$s!=null){
				echo "$s";
			}
			else{
				echo "<input type=\"text\"name=\"s\"/>";
			}
		?>
		</td><td rowspan="3" class="renshibhu_score">
		<?php
	
			if(isset($t)&&$t!=null){
				echo "$t";
			}
			else{
				echo "<input type=\"text\"name=\"t\"/>";
			}
		?>
		</td><td rowspan="3" class="zonghe_score">---</td>
	</tr>
	<tr>
		<td class="check_content">2.常规性工作认真仔细，遇到问题大多能考虑全面、独立解决或在少量协助下解决。</td><td class="fenshuduan">3-4分</td>
	</tr>
	<tr>
		<td class="check_content">3.不够认真仔细，日常工作多浮于表面，很少思考、独立解决问题。</td><td class="fenshuduan">1-2分</td>
	</tr>
	
	
	
				<!-- u,v决策能力 -->	
	<tr>
		<td rowspan="3" class="bumenlihui">决策能力</td><td class="weight" rowspan="3">6%</td><td class="check_content">1.处理部门事务时，能独立思考，有一定的决策能力。</td><td class="fenshuduan">5-6分</td><td rowspan="3" class="buzhang_score">
		<?php
	
			if(isset($u)&&$u!=null){
				echo "$u";
			}
			else{
				echo "<input type=\"text\"name=\"u\"/>";
			}
		?>
		</td><td rowspan="3" class="renshibhu_score">
		<?php
	
			if(isset($v)&&$v!=null){
				echo "$v";
			}
			else{
				echo "<input type=\"text\"name=\"v\"/>";
			}
		?>
		</td>
		<td rowspan="3" class="zonghe_score">---</td>
	</tr>
	<tr>
		<td class="check_content">2.处理部门事务时，大多能独立思考，有基本的决策能力。</td><td class="fenshuduan">3-4分</td>
	</tr>
	<tr>
		<td class="check_content">3.处理部门事务时，很少独立思考，决策能力不强。</td><td class="fenshuduan">1-2分</td>
	</tr>
	
					<!--w,x 知人善任 -->	
	<tr>
		<td rowspan="3" class="bumenlihui">知人善任</td><td class="weight" rowspan="3">6%</td><td class="check_content">1.积极关注部门员工发展状况，有针对性对部门员工进行培养</td><td class="fenshuduan">5-6分</td><td rowspan="3" class="buzhang_score">
		<?php
	
			if(isset($w)&&$w!=null){
				echo "$w";
			}
			else{
				echo "<input type=\"text\"name=\"w\"/>";
			}
		?>
		</td><td rowspan="3" class="renshibhu_score">
		<?php
	
			if(isset($x)&&$x!=null){
				echo "$x";
			}
			else{
				echo "<input type=\"text\"name=\"x\"/>";
			}
		?>
		</td><td rowspan="3" class="zonghe_score">---</td>
	</tr>
	<tr>
		<td class="check_content">2.大体上了解部门员工发展状况，会定期对部门员工进行培养</td><td class="fenshuduan">3-4分</td>
	</tr>
	<tr>
		<td class="check_content">3.很少关注部门员工发展状况，基本没有对于部门员工的培养计划。</td><td class="fenshuduan">1-2分</td>
	</tr>
	
	
	
				<!-- y,z自我完善 -->	
	<tr>
		<td rowspan="3" class="bumenlihui">自我完善</td><td class="weight" rowspan="3">6%</td><td class="check_content">1.主动学习人事管理方面的相关知识，并适当地运用于工作当中。</td><td class="fenshuduan">5-6分</td><td rowspan="3" class="buzhang_score">
		<?php
	
			if(isset($y)&&$y!=null){
				echo "$y";
			}
			else{
				echo "<input type=\"text\"name=\"y\"/>";
			}
		?>
		</td><td rowspan="3" class="renshibhu_score">
		<?php
	
			if(isset($z)&&$z!=null){
				echo "$z";
			}
			else{
				echo "<input type=\"text\"name=\"z\"/>";
			}
		?>
		</td><td rowspan="3" class="zonghe_score">---</td>
	</tr>
	<tr>
		<td class="check_content">2.偶尔学习人事管理方面的相关知识，有助于明晰自身工作性质及职责。</td><td class="fenshuduan">3-4分</td>
	</tr>
	<tr>
		<td class="check_content">3.很少学习人事管理方面的相关知识，以常规性完成工作任务为主。</td><td class="fenshuduan">1-2分</td>
	</tr>
	
	
	</table>
	<br><br><br>
<!--	<input type="submit" value="保存">
	<br><br><br><br><br>
</form>-->
	<div class="total_score_div">
总得分：<?php echo "$total_score";?>
</div>
	<!--<div class="leader_advice"><h4>上级评语</h4><?php	echo "$leader_advice";?></div>-->
	<div class="buzhang_advice"><h4>部长评语</h4><?php	echo "$buzhang_advice";?></div>
	<div class="zhuguan_feedback"><h4>主管反馈</h4><?php echo "$zhuguan_feedback";?></div>
	<div class="check_advice"><h4>考核组意见</h4><?php	echo "$check_advice";?></div>
	
	
	
</center>
<br><br><br><br><br>
</body>
</html>	
