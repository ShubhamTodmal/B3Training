<?php



		// connection and create table
	/*function connect($conn)
	{
		$sql =<<<EOF
					create table car(id serial primary key, modelno int unique, carname varchar(20), companyname varchar(20), milage int);
		EOF;
		$exe = pg_query($conn,$sql);
		if($exe)
		{
			echo "table created";
		}else pg_last_error($conn);
	}*/


	// insert data query
	function insert($a,$b,$c,$d)
	{
		$sql =<<<EOF
				insert into car(modelno,carname,companyname,milage) values($a,'$b','$c',$d);
		EOF;
		$exe = pg_query($sql);
		if($exe)
		{
			echo "Data added";
		}else echo "error";

	}

	/*	$sql =<<<EOF
					insert into car(modelno,carname,companyname,milage) values($modelno,'$cname','$coname',$milage);
			EOF;
			$exe = pg_query($sql);
			if($exe)
			{
				echo "Data added";
			}else "error";*/



	// insert data query
	function update($id,$a,$b,$c,$d)
	{
		$sql =<<<EOF
				update car set modelno=$a,carname='$b',companyname='$c',milage=$d where id=$id;
		EOF;
		$exe = pg_query($sql);
		if($exe)
		{
			echo "Data updated";
		}else echo "error";

	}




	// fetch data query
	function fetch($id = '')
	{
		if($id == '')
		{
		$sql =<<<EOF
						select * from car;
			EOF;
			$ret = pg_query($sql);
		}
		else
		{
			$sql =<<<EOF
						select * from car where id= $id;
			EOF;
			$ret = pg_query($sql);
		}
			return $ret;
	}


	//delete data query
	function delete($a)
	{
		$sql =<<<EOF
					delete from car where id = $a;
		EOF;
		$ret = pg_query($sql);
	}


	//sort
	function sortbym()
	{
		$sql =<<<EOF
					select * from car order by modelno;
		EOF;
		$ret = pg_query($sql);
		return $ret;
	}
	//sort
	function sortbyc()
	{
		$sql =<<<EOF
					select * from car order by carname;
		EOF;
		$ret = pg_query($sql);
		return $ret;
	}

?>