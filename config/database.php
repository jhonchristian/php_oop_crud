<?php

class Database {
	// Specify your own database credentials
	private $host     = "localhost";
	private $db_name  = "php_oop_crud_level_1";
	private $username = "root";
	private $password = "";
	public  $conn;

	// get database connection 
	public function getConnection() {
		$this->conn = null;

		try {
			$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db_name, $this->username, $this->password);
		}
		catch(PDOException $e) {
			echo "Connection error: ".$e->getMessage();
		}

		return $this->conn;
	}
}
?>