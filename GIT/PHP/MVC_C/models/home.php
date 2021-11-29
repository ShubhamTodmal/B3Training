<?php

class HomeModel extends Model{
	public function Index(){
		$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

		//$rows = '';

		if(isset($post['sortM'])){
			$type = 'modelno';
			$rows = $this->sortData($post['sortM'],$type);
			return $rows;
		}
		if(isset($post['sortC'])){
			$type = 'carname';
			$rows = $this->sortData($post['sortC'],$type);
			return $rows;
		}
		if(isset($post['search']))
		{
			$search_data = $post['search_data'];
			$rows = $this->searchData($search_data);
			return $rows;
		}else{
			 $rows = $this->allData();
			 return $rows;
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




	public function searchData($search_data)
	{
		if($search_data == '')
			{
				$rows = $this->allData();
			}
		else{
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
			}
			$rows = $this->resultSet();
			 return $rows;
	}

}

?>