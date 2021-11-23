<?php
include_once 'query.php';
  	
  	$host = "host = localhost";
	$user = "user = postgres";
	$port = "port = 5432";
	$password = "password = 4559";
	$db = "dbname = crud";



		// Connection
		$conn = pg_connect("$host $port $db $user $password");


		// fetch all data
		function fetchData($id = '')
		{
			global $conn;
			if($conn)
			{
				$dis = fetch($id);
			}
			return $dis;
		}




    

?>