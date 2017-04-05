<?php

error_reporting(E_ALL ^ E_DEPRECATED);
?>
<?php
require_once dirname(__FILE__)."/dbconfig.php";//引入配置文件

class DB{
	public $conn=null;
	public function __construct($config)
	{
		$this->conn = mysql_connect($config['host'],$config['username'],$config['password']) or die(mysql_error($this->conn));
		mysql_select_db($config['database'],$this->conn)or die(mysql_error($this->conn)); 
		mysql_query("set names ".$config['charset'],$this->conn);
	}
	public function getResult($sql)
	{
		$res = mysql_query($sql,$this->conn)or die(mysql_error($this->conn));
		$result = array();
		while($row = mysql_fetch_assoc ($res))
		{
			$result[]=$row;
		}
		mysql_free_result($res);
		return $result;
	}
	public function getResultByGrade($grade)
	{
		$sql = "select name,fenshu,class from user where grade = ".$grade;
		return self::getResult($sql);
	}
	public function getStatusByDate($date)
	{
		$tempArr = explode("月",$date);//取得月份
		$month = $tempArr[0];
		$tempArr2 = explode("日",$tempArr[1]);
		$day = $tempArr2[0];
		$date = "2017-".sprintf ( "%02d",$month).'-'.sprintf ( "%02d",$day);
		$sql = "select status_book from book_tb_is_status where date_book = '".$date."'";
		//echo $sql;
		return self::getResult($sql);
	}

	public function insertData($name,$group,$tel,$peo_sum,$beizhu_book,$use_book,$date){
		
		$sql = "insert into book_register(name,group_book,tel,peo_sum,beizhu_book,use_book,date) values(\"$name\",\"$group\",\"$tel\",\"$peo_sum\",\"$beizhu_book\",\"$use_book\",\"$date\")";
		//echo $sql;
		//exit;
		$result = mysql_query($sql,$this->conn)or die(mysql_error($this->conn));
		
		
		if($result==false){
			return 0;//失败
		}else{
			
			$aff_rows = mysql_affected_rows ();
			if($aff_rows==0){
				
				return 2;//重复插入
			}else{
				return 1;//执行成功
			}
		}
	}
	
	public function setBookStatus($date)
	{
		$tempArr = explode("月",$date);//取得月份
		$month = $tempArr[0];
		$tempArr2 = explode("日",$tempArr[1]);
		$day = $tempArr2[0];
		$date = "2017-".sprintf ( "%02d",$month).'-'.sprintf ( "%02d",$day);
		$sql = "update book_tb_is_status set status_book = 1 where date_book= '".$date."'";		
		$result = mysql_query($sql,$this->conn)or die(mysql_error($this->conn));
		if($result==false){
			return 0;//失败
		}else{
			
			$aff_rows = mysql_affected_rows ();
			if($aff_rows==0){
				
				return 2;//重复插入
			}else{
				return 1;//执行成功
			}
		}
	}
	public function cancelBookByDate($date){
		$tempArr = explode("月",$date);//取得月份
		$month = $tempArr[0];
		$tempArr2 = explode("日",$tempArr[1]);
		$day = $tempArr2[0];
		$date = "2017-".sprintf ( "%02d",$month).'-'.sprintf ( "%02d",$day);
		$sql = "update book_tb_is_status set status_book = 0 where date_book= '".$date."'";		
		$result = mysql_query($sql,$this->conn)or die(mysql_error($this->conn));
		if($result==false){
			return 0;//失败
		}else{
			
			$aff_rows = mysql_affected_rows ();
			if($aff_rows==0){
				
				return 2;//重复插入
			}else{
				return 1;//执行成功
			}
		}
		
	}

}


?>