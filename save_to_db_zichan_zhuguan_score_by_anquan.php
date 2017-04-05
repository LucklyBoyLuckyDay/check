<?php
	//资产主管数据库操作

	require_once "SqlTool.class.php";
	//1.接收从表单zichan_zhuguan_by_anquan_zhuguan_tianxie.php传过来的数据
	
	//
	
	//接收表单主人的id
	$id=$_GET['id'];
	
	//接收填写的各项分数
	
//anquan表单
$anquan_a1=$_GET['anquan_a1'];
$anquan_a2=$_GET['anquan_a2'];

$anquan_c1=$_GET['anquan_c1'];
$anquan_c2=$_GET['anquan_c2'];

$anquan_b1=$_GET['anquan_b1'];

$anquan_d1=$_GET['anquan_d1'];

var_dump($anquan_a1);

/*$anquan_e=$_GET['anquan_e'];

$anquan_f=$_GET['anquan_f'];

$anquan_g=$_GET['anquan_g'];

$anquan_h=$_GET['anquan_h'];
*/
$leader_advice_by_anquan=$_GET['leader_advice_by_anquan'];

//http://localhost/kaohe_web/huizong07/save_to_db_zichan_zhuguan_score_by_anquan.php?an_quan_a1=8&an_quan_c1=--&an_quan_a2=8&an_quan_c2=--&an_quan_b1=8&an_quan_d1=--&leader_advice_by_anquan=请填写上级评价
$total_score_by_anquan=$anquan_a1+$anquan_a2+$anquan_b1;
	$sql="select score_tb_name from main_tb where id=$id ";
	$SqlTool=new SqlTool();
	$res=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res);
	$score_tb_name=$row['score_tb_name'];
	mysql_free_result($res);
	
	//更新分数表中的数据
	$sql="update $score_tb_name set 
anquan_a1=$anquan_a1,
anquan_a2=$anquan_a2,

anquan_c1=\"$anquan_c1\",
anquan_c2=\"$anquan_c2\",

anquan_b1=$anquan_b1,

anquan_d1=\"$anquan_d1\",

total_score_by_anquan=$total_score_by_anquan,

leader_advice_by_anquan=\"$leader_advice_by_anquan\"



		where self_id=$id";
	
	$SqlTool=new SqlTool();
	$res=$SqlTool->execute_dml($sql);
	if($res==1){
		//echo "保存成功";
		echo "ok";
	}
	else{
		//echo "保存不成功";
		echo "no";
	}
	
?>

