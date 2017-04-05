
<?php
 require_once "SqlTool.class.php";
 $id=$_GET['id'];
 //1.接收被评人（组长）zg_zhuguan_random_id
 $zg_zhuguan_random_id=$_GET['zg_zhuguan_random_id'];
//2.接收评价和打分
$zg_zhuguan_random_remark=$_GET['zg_zhuguan_random_remark'];
$zg_zhuguan_random_score=$_GET['zg_zhuguan_random_score'];


//存入数据库
$sql="select score_tb_name from main_tb where id = $zg_zhuguan_random_id";
//echo "$sql<br>";
$SqlTool=new SqlTool();
$res=$SqlTool->execute_dql($sql);
if($row=mysql_fetch_assoc($res)){
	$score_tb_name=$row['score_tb_name'];
}
mysql_free_result($res);
$sql="update $score_tb_name set zg_zhuguan_random_remark=\"$zg_zhuguan_random_remark\",zg_zhuguan_random_score=$zg_zhuguan_random_score where self_id = $zg_zhuguan_random_id";
//echo "$sql<br>";
$res=$SqlTool->execute_dml($sql);
if($res){
	//将互评标志置为1，表示该组长已经被评价且评价成功
	//other_filled =1
	$sql="update main_tb set other_filled = 1 where id = $zg_zhuguan_random_id";
	$res_zg_zhuguan_random_id_update_ok=$SqlTool->execute_dml($sql);	
	
	$sql="update main_tb set to_fill = 1 where id = $id";
	$res_id_update_ok=$SqlTool->execute_dml($sql);

	if($res&&$res_zg_zhuguan_random_id_update_ok&&$res_id_update_ok){//将other_filled置为1和update成功
	//echo "保存成功";
	$flag=1;
	header("Location: save_or_not_save.php?flag=$flag");
	}
	else{
		//echo "保存不成功";
		$flag=0;
		header("Location: save_or_not_save.php?flag=$flag");
	}
}else{
	echo "error!";
}
/*
if($res==1){
	//echo "保存成功";
	echo "ok";
}else{
	//echo "保存失败";
	echo "no";
}*/
//echo $res.'-----'.$res_zg_zhuguan_random_id_update_ok.'-----'.$res_id_update_ok;

?>