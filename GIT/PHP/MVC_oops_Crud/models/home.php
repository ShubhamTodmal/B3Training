<?php

class HomeModel extends Model{
	public function Index(){
		$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

		//echo $_GET['modelno'];die();
		if($get['id'])
		{
			$sort = $get['id'];
			$row = $this->sortData($sort);
			return $row;
		}
		

		if(isset($post['search']))
		{
			if($post['search_data'] == '')
			{
				$row = $this->allData();
				return $row;
			}
			$this->query('SELECT * FROM cars WHERE modelno = :modelno');
			$this->bind(':modelno', $post['search_data']);
			$row = $this->resultSet();
			//print_r($row);die();
			return $row;
		}else{
			 $row = $this->allData();
			 //print_r($row);
				return $row;
			
		}

	}

	public function allData(){
			$this->query("select * from cars");
			$rows = $this->resultSet();
			return $rows;
	}

	public function sortData($sort)
	{
		if($sort == 'modelnoA'){
			$this->query("select * from cars order by modelno");
		}
		if($sort == 'modelnoD'){
			$this->query("select * from cars order by modelno desc");
		}
		if($sort == 'carnameA'){
			$this->query("select * from cars order by carname");
		}
		if($sort == 'carnameD'){
			$this->query("select * from cars order by carname desc");
		}
		$rows = $this->resultSet();
		return $rows;
	}

}

?>