<?php

// 	$conn=new mysqli("localhost","root","txq19940407","personal") or die(mysqli_connect_error());
// 	if($conn -> connect_errno){
// 		die("连接错误:".$this->conn -> connect_error);
// 		exit();
// 	}
//	$conn -> set_charset('utf8');
	class Conn{
		public $conn;

		function __construct(){
			$this->conn=new mysqli("localhost","root","txq19940407.","personal") or die(mysqli_connect_error());
			if($this->conn ->connect_errno){
				die("连接错误:".$this->conn ->connect_error);
				exit();
			}
			$this->conn -> set_charset('utf8');
		}
	}


	