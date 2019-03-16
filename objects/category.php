<?php
class Category {
	// database connection and table name
	private $conn;
	private $table_name = "categories";

	// object properties
	public $id;
	public $name;

	public function __construct($db) {
		$this->conn = $db;
	}

	// used by select drop-down list
	function read() {
		// Select all data
		$query = "SELECT id, name FROM " . $this->table_name . " ORDER BY name";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();

		return $stmt;		
	}

	// used to read category name by its id
	function readName() {
		$query = "SELECT name FROM ". $this->table_name . " WHERE id = ? limit 0, 1";
		$stmt = $this->conn->prepare($query);
		$stmt->bind_param(1, $this->id);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->name = $row['name'];
	}
}
?>