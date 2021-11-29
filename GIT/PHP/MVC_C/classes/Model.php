<?php

	abstract class Model{
		protected $conn;
		protected $stmt;

		public function __construct(){
			$this->conn = new PDO("pgsql:host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT, DB_USER, DB_PASSWORD);
		}


		public function query($query){
			$this->stmt = $this->conn->prepare($query);
		}


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


		// execute query
	public function execute(){
		$this->stmt->execute();
	}

		// gives last added value
	public function lastInsertId(){
		return $this->conn->lastInsertId();
	}

		// gives all data of query condition
	public function resultSet(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

		// for single value for query condition
	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	// fetch column values
	public function countSet(){
		$this->execute();
		return $this->stmt->fetchColumn();
	}
	



	}
?>