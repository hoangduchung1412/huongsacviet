<?php 
	//ket noi csdl
	class Connection {
		//ket noi csdl, ket qua tra ve mot bien -> kieu bien nay la kieu bien object
		public static function getInstance() {
			$hostname = "localhost";
			$database = "btl_php";
			$username = "root";
			$password = "";
			//ket noi csdl, tra ve bien ket noi
			$db = new PDO("mysql:host=$hostname;dbname=$database;","$username","$password");
			$db->exec("set names utf8");
			return $db;
		}
	}
 ?>