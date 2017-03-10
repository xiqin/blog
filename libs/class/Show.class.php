<?php  
	require_once("libs/mysqli_conn.php");				//加载外部数据库连接文件
	
    /**
     * Show类，实现数据的获取以及显示
     * @author txq
     *
     */
	class Show extends Conn{
	    private $sql;                              //数据库查询语句
	    private $term;                             //查询条目
	    private $dbname;                           //数据表名 
	    private $where;                            //条件语句
	    private $result;                           //结果集
	    
	    /**
	     * [__construct description]  初始化父类构造函数
	     */
		function __construct(){
		    parent::__construct();                        //初始化父类构造函数
		}
		
		/**
		 * 定义Select函数，执行查询操作
		 * @param [type] $term   要查询的字段
		 * @param [type] $dbname 数据表名
		 * @param string $where  条件语句
		 */
		function Select($term,$dbname,$where=''){
		    //初始化数据
		    $this->term = $term;
		    $this->dbname = $dbname;
		    $this->where = $where;
		    //拼接sql语句
		    $this->sql = "select {$this->term} from {$this->dbname}".$this->where;
//			echo $this->sql;
		    //执行sql语句
		    $this->result = $this->conn -> query($this->sql) or die(mysqli_connect_error());
		    //当结果集中的数据不为零时返回结果集
		    if($this->result && $this->result->num_rows > 0){
		        return $this->result;
		    }
		}

		/**
		 * 查询阅读量最高的6条数据
		 */
		function SelectList(){
		    //sql语句
		    $this->sql = "select * from article order by read_num desc limit 6";
		    //执行sql语句
		    $this->result = $this->conn -> query($this->sql) or die(mysqli_connect_error());
		    //当结果集中的数据不为零时返回结果集
		    if($this->result && $this->result->num_rows > 0){
		        return $this->result;
		    }
		}

		/**
		 * 查询最新的6条数据
		 */
		function SelectNew(){
		    //sql语句
		    $this->sql = "select * from article order by id desc limit 6";
		    //执行sql语句
		    $this->result = $this->conn -> query($this->sql) or die(mysqli_connect_error());
		    //当结果集中的数据不为零时返回结果集
		    if($this->result && $this->result->num_rows > 0){
		        return $this->result;
		    }
		}
		/**
		 * 查询最新和阅读量最高的6条数据
		 */
		function SelectRecom(){
		    //sql语句
		    $this->sql = "select * from article where is_recommend = 1 order by id desc  limit 6";
		    //执行sql语句
		    $this->result = $this->conn -> query($this->sql) or die(mysqli_connect_error());
		    //当结果集中的数据不为零时返回结果集
		    if($this->result && $this->result->num_rows > 0){
		        return $this->result;
		    }
		}
		/**
		 * 根据传递过来的ID查询数据
		 */
		function SelectContent($id){
			//sql语句
		    $this->sql = "select * from article where id = {$id}";
		    //执行sql语句
		    $this->result = $this->conn -> query($this->sql) or die(mysqli_connect_error());
		    //当结果集中的数据不为零时返回结果集
		    if($this->result && $this->result->num_rows > 0){
		        return $this->result -> fetch_assoc();
		    }
		}

		/**
		 * 阅读数量增加
		 */
		function AddReadNum($id){
			//sql语句
		    $this->sql = "update article set read_num = read_num+1 where id = {$id}";
		    //执行sql语句
		    $this->result = $this->conn -> query($this->sql) or die(mysqli_connect_error());
		}
		
		/**
		 * 私有方法，查询文章总数
		 */
		private function TotalNum(){
			$this->sql = "select * from article";
			$this->result = $this->conn -> query($this->sql) or die(mysqli_connect_error());
			return $this->result ->num_rows;
		}

		/**
		 * 私有方法，查询便签总数
		 */
		public function totalLabel($eachNum){
			$this->sql = "select id from label";
			$this->result = $this->conn -> query($this->sql) or die(mysqli_connect_error());
			return ceil($this->result ->num_rows/$eachNum);
		}

		/**
		 * 分页查询便签
		 * @param $eachNum   每页显示个数
		 */
		public function ajaxLabel($eachNum=5,$page=1){
			$total = $this->totalLabel($eachNum);
			if($page > $total){
				$page = 1;
			}
			$this->sql = "select * from label order by id desc limit ".($page-1)*$eachNum.",".$eachNum;
			$this->result = $this->conn -> query($this->sql) or die(mysqli_connect_error());
			return $this->result;
		}

		public function pageLabel(){

		}

		/**
		 * 查询上一篇和下一篇记录
		 * @param [type] $id [当前页文章id]
		 */
		function Prev_Next($id){
			$total = $this->TotalNum();
			switch ($id) {
				case '1':
					$this->sql = "select title from article where id = ".($id+1);
					$this->result = $this->conn -> query($this->sql) or die(mysqli_connect_error());
					$res = $this->result -> fetch_assoc();
					echo "<p class='bg'>下一篇：<a href=".($id+1).".html>{$res['title']}</a></p>";
					break;
				case $total:
					$this->sql = "select title from article where id = ".($id-1);
					$this->result = $this->conn -> query($this->sql) or die(mysqli_connect_error());
					$res = $this->result -> fetch_assoc();
					echo "<p class='bg'>上一篇：<a href=".($id-1).".html>{$res['title']}</a></p>";
					break;
				default:
					$this->sql = "select title from article where id = ".($id-1);
					$this->result = $this->conn -> query($this->sql) or die(mysqli_connect_error());
					$res = $this->result -> fetch_assoc();
					echo "<p class='bg'>上一篇：<a href=".($id-1).".html>{$res['title']}</a></p>";
					$this->sql = "select title from article where id = ".($id+1);
					$this->result = $this->conn -> query($this->sql) or die(mysqli_connect_error());
					$res = $this->result -> fetch_assoc();
					echo "<p class='bg'>下一篇：<a href=".($id+1).".html>{$res['title']}</a></p>";
					break;
			}
			
			

		}

		//析构函数，关闭连接
		function __destruct(){
		    $this->conn -> close();
		}
	}
