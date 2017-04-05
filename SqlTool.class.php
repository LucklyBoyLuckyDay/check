  <!DOCTYPE html>
 <html>
 <head>
 	<meta http-equiv="content-Type" content="text/html;charset=utf-8">
</head>
<body>
<?php
	class SqlTool
	{
		private $conn;
		private $host="localhost";
		private $user="root";
		private $password="123";
		public $db="check_base";//程序中使用的数据库的名称
		
		function SqlTool()
		{
			$this->conn=mysql_connect($this->host,$this->user,$this->password);
			if(!$this->conn)
			{
				die("连接数据库失败".mysql_error());	
			}
			mysql_select_db($this->db,$this->conn);

			mysql_query("set names utf8");
		}
			
		
		/**
		 *date:2017/2/13
		 *新增change_db方法
		 *功能:改变数据库
		 *
		 */
		public function change_db($db_name)
		{
			$sql = "use " . $db_name;
		}
		//完成select
		public function execute_dql($sql)
		{
			$res=mysql_query($sql) or die(mysql_error());
			return $res;
			
		}
		//完成update,delete,insert
		public function execute_dml($sql)
		{
			$b=mysql_query($sql,$this->conn);
			//var_dump($b);
			if(!$b)
			{
				return 0;//失败
			}
			else
			{
				if(mysql_affected_rows($this->conn)>0)
				{
					return 1;//表示成功
					
				}
				else
				{
					return 2;//表示没有行数影响
				}
			}
		}
		
		
	}
?>

</body>

</html>