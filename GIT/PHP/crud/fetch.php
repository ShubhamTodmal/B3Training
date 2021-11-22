<?php
include_once 'query.php';
  	
  	$host = "host = localhost";
	$user = "user = postgres";
	$port = "port = 5432";
	$password = "password = 4559";
	$db = "dbname = crud";


/*<li>Car Model No.:</li><li><input type="number" name="mno"></li>
            <li>Car Name:</li><li><input type="text" name="cname"></li>
            <li>Company name:</li><li><input type="text" name="coname"></li>
            <li>Milage:</li><li><input type="number" name="milage"></li>*/


 



		// Connection
		$conn = pg_connect("$host $port $db $user $password");

		// create table
		/*function create()
		{
			global $conn;
			if($conn){
				//or we can use
				//$conn = mysqli_connect
				// if(!$conn)
				connect($conn);
			}
		}*/
		//create();




/*		//insert data
		function insertdata()
		{
			$modelno = $_POST['mno'];
		    $carname = $_POST['cname'];
		    $coname = $_POST['coname'];
		    $milage = $_POST['milage'];
		    global $conn;
			if($conn)
			{
				if($id == ''){
					insert($modelno,$carname,$coname,$milage);
				}
				else
				{
					if($conn){update($id,$modelno,$carname,$coname,$milage);}
				}
			}
		}
*/
		
		/*	$sql =<<<EOF
					insert into car(modelno,carname,companyname,milage) values($modelno,'$cname','$coname',$milage);
			EOF;
			$exe = pg_query($sql);
			if($exe)
			{
				echo "Data added";
			}else "error";*/


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


		// fetch all data
		function findData($id)
		{
			global $conn;
			if($conn)
			{
				$find = fetch($id);
			}
			return $find;
		}


		// sort by model no
		function sortModel()
		{
			global $conn;
			if($conn)
			{
				$sort1 = sortbym();
			}
			return $sort1;
		}
		// sort by carname
		function sortCar()
		{
			global $conn;
			if($conn)
			{
				$sort2 = sortbyc();
			}
			return $sort2;
		}

//header("location: form.php");


    

?>