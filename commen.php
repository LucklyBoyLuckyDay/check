<?php
/*******��zg_leader_branch�л�ȡ$zuzhang_remark(��Ա���鳤������),$zu_zhang_score(��Ա���鳤���)******/
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
	if($position != '�ʲ�����')break;
}

mysql_free_result($res_leader);

$sql="select zuzhang_remark,zu_zhang_score,name from zg_leader_branch where position=\"$position\"";
//echo $sql;
$res=$SqlTool->execute_dql($sql);
$i = 0;//ͳ��$name ���鳤��
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

$zu_zhang_score /=$i;//��ƽ��
$zu_zhang_score = round($zu_zhang_score);//��������

/**************END**************/



?>