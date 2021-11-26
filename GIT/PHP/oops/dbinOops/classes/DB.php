<?php

	class DB{
		private $host = "localhost";
		private $user = "postgres";
		private $port = "5432";
		private $password = "4559";
		private $db = "myblog";

		private $conn;
		private $stmt;


			// conection
		public function __construct()
		{
			$dsn = "pgsql:host=".$this->host.";dbname=".$this->db.";port=".$this->port;
			

			try{
				$this->conn = new PDO($dsn,$this->user,$this->password,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
				if($this->conn)
				{
					echo "DataBase connected";
				}
			}catch (PDOException $e){
				die($e->getMessage());
			}
		}



			// query

		// this is our preparation query
	public function query($query)
	{
		$this->stmt = $this->conn->prepare($query);
	}

	// this use to bind our data to query
	public function bind($param,$val,$type=null)
	{
		if(is_null($type))
		{
			switch (true) {
				case is_int($val):
					$type= PDO::PARAM_INT;
					break;
				case is_bool($val):
					$type= PDO::PARAM_BOOL;
					break;
				case is_null($val):
					$type= PDO::PARAM_NULL;
					break;
				default:
					$type= PDO::PARAM_STR;
					break;
			}
		}
		$this->stmt->bindValue($param,$val,$type);
	}

		// this execute/fire our query
	public function execute()
	{
		return $this->stmt->execute();
	}

		//gives last inserted data
	public function lastid()
	{
		$this->conn->lastInsertId();
	}

		// fetch all data of our query 
	public function resultset()
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}

?>