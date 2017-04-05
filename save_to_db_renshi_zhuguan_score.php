<?php
error_reporting(E_ALL ^ E_DEPRECATED);

?>

<?php
//当为$tianxieFlag = 1 是表示此表由人事部部长填写相关空格
//当为$tianxieFlag = 0 是表示此表由人事主管所在部门的部长填写相关空格
$tianxieFlag = $_GET['tianxieFlag'];
var_dump($tianxieFlag);
/*

部长
http://localhost/qbase/check/save_to_db_renshi_zhuguan_score.php?id=14&a1=&a2=&a3=&a4=&c1=&c2=&c3=&d=&i=&k=&m=&o=&q=&s=&u=&w=&y=

人事部长
http://localhost/qbase/check/save_to_db_renshi_zhuguan_score.php?id=14&e=&f=&g=&h=&j=&l=&n=&p=&r=&t=&v=&x=&z=

*/
	//人事主管数据库操作

	require_once "SqlTool.class.php";
	//1.接收从表单bumen_renshi_zhuguan_tianxie.php传过来的数据
	
	//
	
	//接收表单主人的id
	$id=$_GET['id'];
	
	//接收填写的各项分数
	


if($tianxieFlag == 1)//人事部部长
{
	$e=$_GET['e'];

	$f=$_GET['f'];

	$g=$_GET['g'];

	$h=$_GET['h'];
	$j=$_GET['j'];
	$l=$_GET['l'];
	$n=$_GET['n'];
	$p=$_GET['p'];
	$r=$_GET['r'];
	$t=$_GET['t'];
	$v=$_GET['v'];
	$x=$_GET['x'];
	$z=$_GET['z'];
	
	$score_renshi = $e+$f+$g+$h+$j+$l+$n+$p+$r+$t+$v+$x+$z;
	//echo $score_renshi ;
}
	
else if($tianxieFlag == 0){//其他部门部长
	$a1=$_GET['a1'];
	$a2=$_GET['a2'];
	$a3=$_GET['a3'];
	$a4=$_GET['a4'];

	$c1=$_GET['c1'];
	$c2=$_GET['c2'];
	$c3=$_GET['c3'];

	$d=$_GET['d'];
	$i=$_GET['i'];
	$k=$_GET['k'];

	$m=$_GET['m'];

	$o=$_GET['o'];

	$q=$_GET['q'];

	$s=$_GET['s'];

	$u=$_GET['u'];

	$w=$_GET['w'];

	$y=$_GET['y'];
	$score_gebuzhang=$a1+$a2+$a3+$a4+$c1+$c2+$c3+$d+$i+$k+$m+$o+$q+$s+$u+$w+$y;
}else{
	echo "error";
}

//$leader_advice=$_GET['leader_advice'];

//$total_score=$a1+$a2+$a3+$a4+$c1+$c2+$c3+$d+$e+$f+$g+$h+$i+$j+$k+$l+$m+$n+$o+$p+$q+$r+$s+$t+$u+$v+$w+$x+$y+$z;
/*$sql="select score_gebuzhang,score_renshi from renshi_zhuguan_score where id=$id";
$SqlTool=new SqlTool();
$res=$SqlTool->execute_dql($sql);
$row=mysql_fetch_assoc($res);
$score_gebuzhang=$row['score_gebuzhang'];
$score_renshi=$row['score_renshi'];*/

//$total_score = $score_gebuzhang+$score_renshi;
	$sql="select score_tb_name from main_tb where id=$id ";
	//echo "$sql";
	$SqlTool=new SqlTool();
	$res=$SqlTool->execute_dql($sql);
	$row=mysql_fetch_assoc($res);
	$score_tb_name=$row['score_tb_name'];
	mysql_free_result($res);
	//echo "$score_tb_name";
	/*

部长
http://localhost/qbase/check/save_to_db_renshi_zhuguan_score.php?id=14&a1=&a2=&a3=&a4=&c1=&c2=&c3=&d=&i=&k=&m=&o=&q=&s=&u=&w=&y=

人事部长
http://localhost/qbase/check/save_to_db_renshi_zhuguan_score.php?id=14&e=&f=&g=&h=&j=&l=&n=&p=&r=&t=&v=&x=&z=

*/
	//更新分数表中的数据
	//echo '----'+$score_renshi;
	if($tianxieFlag == 1)//人事部部长
	{
			$sql="update $score_tb_name set 
		e=$e,

		f=$f,

		g=$g,

		h=$h,
		j=$j,
		l=$l,
		n=$n,
		p=$p,
		r=$r,
		t=$t,
		v=$v,
		x=$x,
		z=$z,
		score_renshi=$score_renshi
		
		where self_id=$id";
		//echo $sql;
	}
	
	else if($tianxieFlag == 0)//其他部门部长
	{
		$sql="update $score_tb_name set 
		a1=$a1,
		a2=$a2,
		a3=$a3,
		a4=$a4,

		c1=$c1,
		c2=$c2,
		c3=$c3,

		d=$d,

		i=$i,

		k=$k,

		m=$m,

		o=$o,

		q=$q,

		s=$s,

		u=$u,

		w=$w,

		y=$y,
		score_gebuzhang=$score_gebuzhang
			where self_id=$id";
		
	}else{
		echo "error!";
	}

	echo "<br>$sql<br>";
	$SqlTool=new SqlTool();
	$res=$SqlTool->execute_dml($sql);
	
	echo "'res = '$res<br>";
	if($res==1){
		//echo "保存成功";
		$flag=1;
		header("Location: save_or_not_save.php?flag=$flag");
	}
	else if($res==0){
		//echo "保存不成功";
		$flag=0;
		header("Location: save_or_not_save.php?flag=$flag");
	}else{//$res==2----->重复保存
		$flag=2;
		header("Location: save_or_not_save.php?flag=$flag");
	}
	echo $flag;
	
?>
