<?php


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
						select * from car where modelno= $id;
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