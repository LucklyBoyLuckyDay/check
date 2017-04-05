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
	<title>网上考核</title>
	<style>
		/*body{
			margin:20px auto;
			width :500px;
			border:1px solid #A2D6E3;
			padding-left:12px;
		}*/
	</style>
</head>
<body>

<?php

require_once "SqlTool.class.php";
//renshi_zhuguan_score
//julebu_yuangong
// ren_zong_yuangong
//rs_zuzhang_score
//shengsheng_yuangong

//zg_anquan_zhuguan
//zg_caiwuzu_zhuguan
//zg_ducha_zhuguan
//zg_jishu_zhuguan
//zg_jizhe_zhuguan
//zg_mishu_zhuguan

//zichan_zhuguan_score

$group=Array('renshi_zhuguan_score','julebu_yuangong','ren_zong_yuangong','rs_zuzhang_score','shengsheng_yuangong','zichan_zhuguan_score');

$group_map=Array('renshi_zhuguan_score'=>'人事主管','julebu_yuangong'=>'俱乐部员工','ren_zong_yuangong'=>'综管人事员工','rs_zuzhang_score'=>'人事部组长','shengsheng_yuangong'=>'升升活动中心员工','zichan_zhuguan_score'=>'资产主管');

$zg_zuzhang_group=Array('zg_anquan_zhuguan','zg_caiwuzu_zhuguan','zg_ducha_zhuguan','zg_jishu_zhuguan','zg_jizhe_zhuguan','zg_mishu_zhuguan');

$group_length=count($group);
for($i=0;$i<$group_length;$i++){
	$sql="select total_score,id_name from {$group[$i]}";
	$SqlTool=new SqlTool();
	$res_1=$SqlTool->execute_dql($sql);
	$result=Array();
	while($row=mysql_fetch_assoc($res_1)){
		$total_score=$row['total_score'];
		$id_name=$row['id_name'];
		$result[$id_name]=$total_score;
	}
	echo $group_map[$group[$i]];
	echo '<br>';
	//排序
	arsort($result);
	foreach($result as $key=>$val)
	{
		echo "$key($val)";
	}	
	echo '<br>';echo '<br>';
	mysql_free_result($res_1);
}

//综管组长
$zg_zuzhang_group_length=count($zg_zuzhang_group);
$result=Array();
//echo "$zg_zuzhang_group_length";
for($i=0;$i<$zg_zuzhang_group_length;$i++){
	$sql="select total_score,id_name from {$zg_zuzhang_group[$i]}";
	//echo "$sql".'<br>';
	$SqlTool=new SqlTool();
	$res_1=$SqlTool->execute_dql($sql);
	
	$row=mysql_fetch_assoc($res_1);
	$total_score=$row['total_score'];
	$id_name=$row['id_name'];
	
	$result[$id_name]=$total_score;
	
}	
/* echo "<pre>";
print_r($result);
echo "</pre>";  */
echo '综管组长';
echo '<br>';
//排序
arsort($result);
foreach($result as $key=>$val)
{
	echo "$key($val)";
}	

echo '<br>';
?>
</body>
</html>