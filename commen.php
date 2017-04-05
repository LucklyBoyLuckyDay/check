<?php
/*******从zg_leader_branch中获取$zuzhang_remark(组员给组长的评语),$zu_zhang_score(组员给组长打分)******/
$sql="select position from main_tb where name=\"$name\"";
$res_position=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res_position);
$position=$row['position'];
mysql_free_result($res_position);

$sql="select branch from score_relationship_tb where leader=\"$position\"";
//echo $sql;	
$res_leader=$SqlTool->execute_dql($sql);
while($row=mysql_fetch_assoc($res_leader))
{
	$position=$row['branch'];
	if($position != '资产主管')break;
}

mysql_free_result($res_leader);

$sql="select zuzhang_remark,zu_zhang_score,name from zg_leader_branch where position=\"$position\"";
//echo $sql;
$res=$SqlTool->execute_dql($sql);
$i = 0;//统计$name 数组长度
$zu_zhang_score=0;

while($row=mysql_fetch_assoc($res))
{
	$display_zuzhang_remark[$i]=$row['zuzhang_remark'];
	$zu_zhang_score += $row['zu_zhang_score'];
	$display_name[$i]=$row['name'];
	$i++;

}
//print_r($display_zuzhang_remark);
//echo $zu_zhang_score.'-----'.$i; 
mysql_free_result($res);

$zu_zhang_score /=$i;//求平均
$zu_zhang_score = round($zu_zhang_score);//四舍五入

/**************END**************/



?>