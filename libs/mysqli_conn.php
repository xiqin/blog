<?php
	class Conn{
		public $conn;

		function __construct(){
			$this->conn=new mysqli("localhost","","","personal") or die(mysqli_connect_error());
			if($this->conn ->connect_errno){
				die("连接错误:".$this->conn ->connect_error);
				exit();
			}
			$this->conn -> set_charset('utf8');
		}
	}


	
