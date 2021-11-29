<?php

class HomeModel extends Model{
	public function Index(){
		$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

		
		if(isset($post['sortM'])){
			$type = 'modelno';
			$row = $this->sortData($post['sortM'],$type);
			return $row;
		}
		if(isset($post['sortC'])){
			$type = 'carname';
			$row = $this->sortData($post['sortC'],$type);
			return $row;
		}
		
		if(isset($post['search'])){
			//echo $post['search_data'];die();
			if($post['search_data'] == '')
			{
				$rows = $this->allData();
				 return $rows;
			}
			$search_data = $post['search_data'];
			$data = (int)filter_var($search_data, FILTER_SANITIZE_NUMBER_INT);
			if($data != 0){
				$this->query("SELECT * FROM cars WHERE modelno = :modelno");
				$this->bind(':modelno', $data);
			}
			if($data == 0)
			{
				$this->query("SELECT * FROM cars WHERE carname like '%$search_data%'");
				//$this->bind(':carname', $search_data);
			}
			$rows = $this->resultSet();
			//print_r($row);die();
			 return $rows;
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

	public function sortData($sort,$type)
	{
		if($sort == '⬇'){
			$this->query("select * from cars order by $type");
		}
		if($sort == '⬆'){
			$this->query("select * from cars order by $type desc");
		}
		$rows = $this->resultSet();
		return $rows;
	}

}

?>