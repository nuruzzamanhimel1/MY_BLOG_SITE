<?php include("config/config.php"); ?>
<?php

Class Database{
	
	public $conn;


	public function __construct()
	{
		$this->connection();
	}

	public function connection()
	{
		if(!isset($this->conn))
		{
			try {
					$this->conn = new PDO("mysql:dbname=".DB_NAME.";host=".DB_HOST,DB_USER,DB_PASS);
					echo "DB connected.";
			} catch (PDOException $e) {
				echo "DB Connection Fail....".$e->getMessage();
			}
		}
	}

	public function prepare($query)
	{
		$stmt = $this->conn->prepare($query);
		return $stmt;
	}

	public function selectAll($tbl_name)
	{
		$query = "SELECT * FROM ".$tbl_name;

		$stmt = $this->prepare($query);
		 $stmt->execute();
		 $result = $stmt->fetchAll();
		 return $result;
		

	}
 
}

