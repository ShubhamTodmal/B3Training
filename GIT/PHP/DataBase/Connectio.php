<?php

	$host = "host = localhost";
	$user = "user = postgres";
	$port = "port = 5432";
	$password = "password = 4559";
	$db = "dbname = movie_data_clone";



		// Connection
		$conn = pg_connect("$host $port $db $user $password");
		if($conn){
			//or we can use
			//$conn = mysqli_connect
			// if(!$conn)
			echo ("Connection successful!")."<br><br>";//.mysqli_connect_error()
	}




	/*// to create table
	$sql =<<<EOF
			create table Example1(id serial primary key,fname varchar(20),email varchar(20));
	EOF;
	$ret = pg_query($conn,$sql);
	if($ret)
	{
		echo "Table created";
	}else echo pg_last_error($conn);*/




	/*// Insert data in table
	$sql =<<<EOF
				insert into Example1(fname,email) values('shubh','s@gmail.com');
				insert into Example1(fname,email) values('shubham','shubh@gmail.com');
				insert into Example1(fname,email) values('ampp','amp@gmail.com');
				insert into Example1(fname,email) values('xamp','xamp@gmail.com');
	EOF;
	$ret = pg_query($conn,$sql);
	if($ret)
	{
		echo "Data Added";
	}else echo pg_last_error($conn);*/




	/*// fetch all data
	$sql =<<<EOF
				select * from example1;
	EOF;
	$ret = pg_query($conn,$sql);
	if($ret)
	{
		while($row = pg_fetch_row($ret))
		{
			echo "id: ". $row[0] ."<br>";
			echo "first name: ". $row[1] ."<br>";
			echo "email: ". $row[2] ."<br><br>";
		}
		echo "All data fetched Successfully<br>";
	}else echo pg_last_error($conn);*/




	/*// Update Data
	$sql =<<<EOF
				update example1 set email='shubham@gmail.com' where fname='shubham';
	EOF;
	$ret = pg_query($conn,$sql);
	if($ret){
		$sql =<<<EOF
				select * from example1;
	EOF;
	$ret = pg_query($conn,$sql);
	if($ret)
	{
		while($row = pg_fetch_row($ret))
		{
			echo "id: ". $row[0] ."<br>";
			echo "first name: ". $row[1] ."<br>";
			echo "email: ". $row[2] ."<br><br>";
		}
		echo "All data fetched Successfully<br>";
	}else echo pg_last_error($conn);
	}
	else pg_last_error($conn);*/






	/*// Delete Data
	$sql =<<<EOF
				Delete from example1 where id=2;
	EOF;
	$ret = pg_query($conn,$sql);
	if($ret){
		$sql =<<<EOF
				select * from example1;
	EOF;
	$ret = pg_query($conn,$sql);
	if($ret)
	{
		while($row = pg_fetch_row($ret))
		{
			echo "id: ". $row[0] ."<br>";
			echo "first name: ". $row[1] ."<br>";
			echo "email: ". $row[2] ."<br><br>";
		}
		echo "All data fetched Successfully<br>";
	}else echo pg_last_error($conn);
	}
	else pg_last_error($conn);*/





	// Alter Data
	/*$sql =<<<EOF
				Alter table example1 rename column id to SrNo;
	EOF;
	$ret = pg_query($conn,$sql);
	if($ret){
		$sql =<<<EOF
				select * from example1;
	EOF;
	$ret = pg_query($conn,$sql);
	if($ret)
	{
		while($row = pg_fetch_row($ret))
		{
			echo "Sr.No.: ". $row[0] ."<br>";
			echo "first name: ". $row[1] ."<br>";
			echo "email: ". $row[2] ."<br><br>";
		}
		echo "All data fetched Successfully<br>";
	}else echo pg_last_error($conn);
	}
	else pg_last_error($conn);*/


	pg_close($conn);
	
?>




























<!---
												//MySql

	// create database
	//$sql = "create database ex";
	//if($conn->query($sql))//mysqli_query($conn,$sql)




	/*// for connection
	if($conn->connect_error)//mysqli_connect_error()
	{
		die ("Connection failed: ".$conn->connect_error);
	}*/





	/*// for create table
	$sql = "create table Example1(id int auto_increment primary key,fname varchar(20),email varchar(20))";
	if($conn->query($sql))//mysqli_query($conn,$sql)
	{
		echo "Table created";
	}else echo "Error creating table".$conn->error;//mysqli_error($conn)

	// db creating error
	//else echo "Error in creating database".$conn->error;//mysqli_error($conn)*/




	/*// insert values
	$sql = "insert into example1(fname,email) values('hi','h@gmail.com')";
	if($conn->query($sql))//mysqli_query($conn,$sql)
	{
		echo "Data inserted";
	}else echo "Error inserting data".$conn->error;//mysqli_error($conn)*/




	/*// get id of last inserted record
	$lid = $conn->insert_id;
	echo "last inserted ID is: ".$lid."<br>";// here it shows '0' cause we need to trigger insert query first,only then it work else not
		//let insert again new data
		/*$sql = "insert into example1(fname,email) values('shubham','s@gmail.com')";
		if($conn->query($sql))
		{
			echo "Data inserted<br>";
			$lid = $conn->insert_id;
		echo "last inserted ID is: ".$lid;
		}else echo "Error inserting data".$conn->error;*/


	//$conn->close(); //mysqli_close($conn);
	-->