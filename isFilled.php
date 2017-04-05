<?php
/**
 *date:2017/02/13
 *设置警告级别
 */
error_reporting(E_ALL ^ E_DEPRECATED);
?>
<!DOCTYPE html>
 <html>
 <head>
	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
	<title>考核表填写进度</title>
	<style>
		body{
			margin:20px auto;
			width :500px;
			border:0px solid #A2D6E3;
			padding-left:12px;
		}
	</style>
	
</head>
<body>
<center><h2>考核进度</h2></center>
<?php
//启动session的初始化
session_start();
//注册session变量，赋值为一个用户的名称
if(empty($_SESSION["name"])){
	echo "登录时间过长，请重新登陆";
	echo "&nbsp;&nbsp;&nbsp;<a href='login.php'>点击我重新登陆</a>";
	exit;	
}
$name = $_SESSION["name"];

?>
<?php
require_once "SqlTool.class.php";
//根据登录人的信息在lookrootrenshizhuguan数据表中查询权限
$sql="select root from lookrootrenshizhuguan where name =\"$name\"";
$SqlTool=new SqlTool();
$res_root=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res_root);
$root = $row['root'];
mysql_free_result($res_root);
?>
<?php
//功能：供查询有哪些人还未填写

//renshi_zhuguan_score

if($root == 1){
echo "<br><h4><center>----------------------------人事主管----------------------------</center></h4><br>";
$sql="select id_name,total_score,buzhang_advice,check_advice,zhuguan_feedback from renshi_zhuguan_score";
//echo $sql;
//$SqlTool=new SqlTool();
$res_1=$SqlTool->execute_dql($sql);
while($row=mysql_fetch_assoc($res_1)){
	$id_name=$row['id_name'];
	
	$total_score=$row['total_score'];
	$buzhang_advice=$row['buzhang_advice'];
	$check_advice=$row['check_advice'];
	
	$zhuguan_feedback=$row['zhuguan_feedback'];
	
	
	if(!$total_score){
		echo "{$id_name}考核表未填写---->季杰";
		echo '<br><br>';
	}
	if(!$zhuguan_feedback){
		echo "{$id_name}主管反馈未填写---->$id_name";
		echo '<br>';
	}
	if(!$buzhang_advice){
		$sql="select apartment from main_tb where name=\"$id_name\"";
		$res_2=$SqlTool->execute_dql($sql);
		$row=mysql_fetch_assoc($res_2);
		$apartment=$row['apartment'];
		mysql_free_result($res_2);
		
		$sql="select name from main_tb where apartment=\"$apartment\" and position = '部长'";
		$res_3=$SqlTool->execute_dql($sql);
		$row=mysql_fetch_assoc($res_3);
		$buzhang_name=$row['name'];
		echo "{$id_name}部长意见未填写---->$buzhang_name";
		echo '<br>';
		mysql_free_result($res_3);

		/*switch($apartment){
			case "综合管理部": $temp_name="张焜阳";break;
			case "俱乐部": $temp_name="王琪";break;
			case "升升活动中心": $temp_name="孙四振";break;
			default:$temp_name="error!";break;
		}
		echo "{$id_name}部长意见未填写---->$temp_name";
		echo '<br>';*/
		
	}
}
mysql_free_result($res_1);
}//end of renshi_zhuguan_score


// ren_zong_yuangong

if(($root == 1)||($root ==2)){//考核组+综管人事主管
if($root==2){//当综合管理部人事主管访问时
	$sql = "select r.* from ren_zong_yuangong r,main_tb m where r.id_name=m.name and m.apartment='综合管理部'";
	//echo $sql;exit;
	echo "<br><h4><center>----------------------------综管员工----------------------------</center></h4><br>";
}else{//当考核组人员访问时
	$sql="select id_name,total_score,self_remark,buzhang_advice,zhuguan_remark from  ren_zong_yuangong";
	echo "<br><h4><center>--------------------------综管人事员工----------------------------</center></h4><br>";
}

$SqlTool=new SqlTool();
$res_1=$SqlTool->execute_dql($sql);
while($row=mysql_fetch_assoc($res_1)){
	$id_name=$row['id_name'];
	
	$total_score=$row['total_score'];
	$buzhang_advice=$row['buzhang_advice'];
	$self_remark=$row['self_remark'];
	$zhuguan_remark=$row['zhuguan_remark'];
	//查找上司 、部长
	$sql="select position,apartment from main_tb where name=\"$id_name\"";
	$res_3=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res_3);
	$apartment=$row['apartment'];
	$position=$row['position'];
	
	mysql_free_result($res_3);
	
	$sql="select leader from score_relationship_tb where branch =\"$position\"";
	$res_4=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res_4);
	$leader_position=$row['leader'];
	
	mysql_free_result($res_4);
	
	$sql="select name from main_tb where position =\"$leader_position\"";
	$res_5=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res_5);
	$leader_name=$row['name'];
	
	mysql_free_result($res_5);
	
	$sql="select name from main_tb where position =\"部长\" and apartment=\"$apartment\"";
	$res_6=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res_6);
	$buzhang_name=$row['name'];
	
	mysql_free_result($res_6);
	
	
	if(!$total_score||!$zhuguan_remark){
		echo "{$id_name}考核表未填写---->$leader_name";
		echo '<br>';
	}
	if(!$self_remark){
		echo "{$id_name}员工自评未填写---->$id_name";
		echo '<br>';
	}
	if(!$buzhang_advice){
		/* $sql="select apartment from main_tb where name=\"$id_name\"";
		$res_2=$SqlTool->execute_dql($sql);
		$row=mysql_fetch_assoc($res_2);
		$apartment=$row['apartment']; */
		
		echo "{$id_name}部长意见未填写---->$buzhang_name";
		echo '<br>';
		//mysql_free_result($res_2);
	}
}
mysql_free_result($res_1);
}//end of ren_zong_yuangong



//julebu_yuangong
if(($root == 1)||($root ==3)){//考核组+俱乐部人事主管

	echo "<br><h4><center>--------------------------俱乐部员工----------------------------</center></h4><br>";
	/**
	 *查询俱乐部部长的姓名name
	 */
	$sql = "select name from main_tb where apartment='俱乐部' and position='部长'";
	$SqlTool=new SqlTool();
	$res_buzhang_name_query=$SqlTool->execute_dql($sql);
	if($row=mysql_fetch_assoc($res_buzhang_name_query)){
		//$buzhang_name="王琪";
		$buzhang_name=$row['name'];
	}
	mysql_free_result($res_buzhang_name_query);
	/**
	 *查询俱乐部人事主管的姓名name
	 */
	$sql = "select name from main_tb where apartment='俱乐部' and position='人事主管'";
	$SqlTool=new SqlTool();
	$res_leader_name_query=$SqlTool->execute_dql($sql);
	if($row=mysql_fetch_assoc($res_leader_name_query)){
		//$buzhang_name="王志敏";
		$leader_name=$row['name'];
	}
	mysql_free_result($res_leader_name_query);
	
	/**
	 *查询俱乐部员工考核表各项填写信息
	 */
	$sql="select id_name,leader_advice,self_remark,total_score from julebu_yuangong";
	//echo $sql;
	
	$res_1=$SqlTool->execute_dql($sql);
	
	while($row=mysql_fetch_assoc($res_1)){
		
		$leader_advice=$row['leader_advice'];
		$self_remark=$row['self_remark'];
		$total_score=$row['total_score'];
		$id_name=$row['id_name'];
		
		
		if (!$leader_advice||!$total_score){
			echo "{$id_name}考核表未填写---->$leader_name";
			echo '<br>';
		}
		if(!$self_remark){
			echo "{$id_name}员工意见未填写---->$id_name";
			echo '<br>';
		}	
	}
	mysql_free_result($res_1);	
	echo '<br>';
}//end of 

//shengsheng_yuangong
if(($root == 1)||($root ==4)){//考核组+升升人事主管

	echo "<br><h4><center>-----------------------升升活动中心员工-------------------------</center></h4><br>";
	/**
	 *查询升升活动中心部长的姓名name
	 */
	$sql = "select name from main_tb where apartment='升升活动中心' and position='部长'";
	$SqlTool=new SqlTool();
	$res_buzhang_name_query=$SqlTool->execute_dql($sql);
	if($row=mysql_fetch_assoc($res_buzhang_name_query)){
		
		$buzhang_name=$row['name'];
	}
	mysql_free_result($res_buzhang_name_query);
	/**
	 *查询升升活动中心人事主管的姓名name
	 */
	$sql = "select name from main_tb where apartment='升升活动中心' and position='人事主管'";
	$SqlTool=new SqlTool();
	$res_leader_name_query=$SqlTool->execute_dql($sql);
	if($row=mysql_fetch_assoc($res_leader_name_query)){
		
		$leader_name=$row['name'];
	}
	mysql_free_result($res_leader_name_query);
	
	/**
	 *查询升升活动中心考核表各项填写信息
	 */
	$sql="select id_name,leader_advice,self_remark,total_score from shengsheng_yuangong";
	//echo $sql;
	
	$res_1=$SqlTool->execute_dql($sql);
	
	while($row=mysql_fetch_assoc($res_1)){
		
		$leader_advice=$row['leader_advice'];
		$self_remark=$row['self_remark'];
		$total_score=$row['total_score'];
		$id_name=$row['id_name'];
		
		
		if (!$leader_advice||!$total_score){
			echo "{$id_name}考核表未填写---->$leader_name";
			echo '<br>';
		}
		if(!$self_remark){
			echo "{$id_name}员工意见未填写---->$id_name";
			echo '<br>';
		}	
	}
	mysql_free_result($res_1);	
	echo '<br>';
}//end of shengsheng_yuangong




//zg_anquan_zhuguan
//zg_caiwuzu_zhuguan
//zg_ducha_zhuguan
//zg_jishu_zhuguan
//zg_jizhe_zhuguan
//zg_mishu_zhuguan

if(($root == 1)||($root ==2)){//考核组+综管人事主管

	echo "<br><h4><center>-----------------------综合管理部组长-------------------------</center></h4><br>";
	
	$sql="select name from main_tb where position='部长' and apartment='综合管理部'";
	$SqlTool=new SqlTool();
	$res_buzhang=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res_buzhang);
	//$buzhang_name="张焜阳";
	$buzhang_name=$row['name'];
	mysql_free_result($res_buzhang);
	$sql="select name from main_tb where position='副部长' and apartment='综合管理部'";
	$res_vice_buzhang=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res_vice_buzhang);
	//$leader_name="尹贵吉";
	$leader_name=$row['name'];
	mysql_free_result($res_vice_buzhang);

	$temp=Array(0=>"zg_anquan_zhuguan",1=>"zg_anquan_zhuguan",2=>"zg_ducha_zhuguan",3=>"zg_jishu_zhuguan",4=>"zg_jizhe_zhuguan",5=>"zg_mishu_zhuguan");
	for($i=0;$i<6;$i++){
		$sql="select id_name,buzhang_advice,zhuguan_feedback,leader_advice from {$temp[$i]}";
		$SqlTool=new SqlTool();
		$res_1=$SqlTool->execute_dql($sql);
		

		
		
		while($row=mysql_fetch_assoc($res_1)){
			$buzhang_advice=$row['buzhang_advice'];
			$zhuguan_feedback=$row['zhuguan_feedback'];
			$leader_advice=$row['leader_advice'];
			
			
			$id_name=$row['id_name'];
			
			//查找下属
			$sql="select position,apartment from main_tb where name=\"$id_name\"";
			$res_3=$SqlTool->execute_dql($sql);
			$row=mysql_fetch_assoc($res_3);
			$apartment=$row['apartment'];
			$position=$row['position'];
			
			mysql_free_result($res_3);
			
			$sql="select branch from score_relationship_tb where leader =\"$position\"";
			$res_4=$SqlTool->execute_dql($sql);
			$row=mysql_fetch_assoc($res_4);
			$branch_position=$row['branch'];
			
			mysql_free_result($res_4);
			
			$sql="select name from main_tb where position =\"$branch_position\"";
			$res_5=$SqlTool->execute_dql($sql);
			$row=mysql_fetch_assoc($res_5);
			$branch_name=$row['name'];
			
			mysql_free_result($res_5);
			
			if (!$leader_advice||!$total_score){
				echo "{$id_name} 考核表未填写---->$leader_name";
				echo '<br>';
			}
			
			if(!$buzhang_advice){
				echo "{$id_name} 部长评价未填写--->$buzhang_name";
				echo '<br>';
			}
			if(!$zhuguan_feedback){
				echo "{$id_name} 主管反馈未填写--->$id_name";
				echo '<br>';
			}
		}
		mysql_free_result($res_1);	
		//echo '<br>';
	}//end of //zg_anquan_zhuguan
	//zg_caiwuzu_zhuguan
	//zg_ducha_zhuguan
	//zg_jishu_zhuguan
	//zg_jizhe_zhuguan
	//zg_mishu_zhuguan
}

//zichan_zhuguan_score
/**
 *俱乐部资产主管(1名)
 *升升资产主管(2名)
 */
if($root==1){
	echo "<br><h4><center>---------------------------资产主管---------------------------</center></h4><br>";

	$sql="select 

id_name,buzhang_advice,check_advice,zhuguan_feedback,leader_advice_by_zichan,leader_advice_by_anquan,total_score_by_zichan,

total_score_by_anquan from zichan_zhuguan_score";
	$SqlTool=new SqlTool();
	$res_1=$SqlTool->execute_dql($sql);
	
	while($row=mysql_fetch_assoc($res_1)){
		
		$buzhang_advice=$row['buzhang_advice'];
		$zhuguan_feedback=$row['zhuguan_feedback'];
		$leader_advice_by_zichan=$row['leader_advice_by_zichan'];
		$leader_advice_by_anquan=$row['leader_advice_by_anquan'];
		$total_score_by_zichan=$row['total_score_by_zichan'];
		$total_score_by_anquan=$row['total_score_by_anquan'];

		$id_name=$row['id_name'];
		
		//查找上级、部长
		$sql="select position,apartment from main_tb where name=\"$id_name\"";
		$res_3=$SqlTool->execute_dql($sql);
		$row=mysql_fetch_assoc($res_3);
		$apartment=$row['apartment'];
		$position=$row['position'];
		
		mysql_free_result($res_3);
		
		$sql="select name from main_tb where position=\"部长\" and apartment=\"$apartment\"";
		$res_4=$SqlTool->execute_dql($sql);
		$row=mysql_fetch_assoc($res_4);
		$buzhang_name=$row['name'];
		
		mysql_free_result($res_4);
		
		//获取安全组组长和资产组组长名字
		$sql="select name from main_tb where position='安全组组长'";
		$res_5=$SqlTool->execute_dql($sql);
		$row=mysql_fetch_assoc($res_5);
		$anquan_zuzhang_name=$row['name'];
		
		mysql_free_result($res_5);
		
		$sql="select name from main_tb where position='资产组组长'";
		$res_6=$SqlTool->execute_dql($sql);
		$row=mysql_fetch_assoc($res_6);
		$zichan_zuzhang_name=$row['name'];
		
		mysql_free_result($res_6);
		
		if (!$leader_advice_by_zichan||!$total_score_by_zichan){
			echo "{$id_name} 考核表之资产主管未填写---->$zichan_zuzhang_name";
			echo '<br>';
		}
		if (!$leader_advice_by_anquan||!$total_score_by_anquan){
			echo "{$id_name} 考核表之安全主管未填写---->$anquan_zuzhang_name";
			echo '<br>';
		}
		
		if(!$buzhang_advice){
			echo "{$id_name} 部长评价未填写--->$buzhang_name";
			echo '<br>';
		}
		if(!$zhuguan_feedback){
			echo "{$id_name} 主管反馈未填写--->$id_name";
			echo '<br>';
		}
	}
	mysql_free_result($res_1);	
}//end of //zichan_zhuguan_score

?>
<br/><br/><br/><br/><br/><br/><br/><br/>
</body>
</html>