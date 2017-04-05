
 <?php
	//人事主管数据库操作

	require_once "SqlTool.class.php";
	//1.接收从表单bumen_renshi_zhuguan_tianxie.php传过来的数据
	
	//
	
	//接收表单主人的id
	$id=$_GET['id'];
	
	//接收填写的各项分数
	
	$a1=$_GET['a1'];
$a2=$_GET['a2'];
$a3=$_GET['a3'];

$b1=$_GET['b1'];
$b2=$_GET['b2'];
$b3=$_GET['b3'];

$c1=$_GET['c1'];
$c2=$_GET['c2'];
$c3=$_GET['c3'];
$c4=$_GET['c4'];

$leader_advice=$_GET['leader_advice'];

//计算总得分
$total_score=$a1+$a2+$a3+$b1+$b2+$b3+$c1+$c2+$c3+$c4;

	$sql="select score_tb_name from main_tb where id=$id ";
	//echo "$sql";
	$SqlTool=new SqlTool();
	$res=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res);
	$score_tb_name=$row['score_tb_name'];
	mysql_free_result($res);
	//echo "$score_tb_name";
	//更新分数表中的数据
	$sql="update $score_tb_name set 
	
	a1=$a1,
a2=$a2,
a3=$a3,

b1=$b1,
b2=$b2,
b3=$b3,

c1=$c1,
c2=$c2,
c3=$c3,
c4=$c4,
total_score=$total_score,
leader_advice=\"$leader_advice\"
		where self_id=$id";
	//echo "<br>$sql<br>";
	$SqlTool=new SqlTool();
	$res=$SqlTool->execute_dml($sql) ;
	
	//echo "$res<br>";
	if($res==1){
		//echo "保存成功";
		$flag=1;
		header("Location: save_or_not_save.php?flag=$flag");
	}
	else{
		//echo "保存不成功";
		$flag=0;
		header("Location: save_or_not_save.php?flag=$flag");
	}
	
?>
