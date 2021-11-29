<?php

class UpdateModel extends Model{

	public function edit()
	{
			// update table
		$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

		if($get['id'] != NULL || $get['id'] != ''){
				
			if(isset($post['submit'])){

				// Validation
				if($post['modelno'] == '' || $post['carname'] == '' || $post['ctype'] == ''){
					Message::setMsg("Please Fill All Fields!","error");
					return;
				}

					$this->query('UPDATE cars SET modelno = :modelno, carname = :carname, company = :company, ctype = :ctype, milage = :milage WHERE id = :id');
					$this->bind(':modelno', $post['modelno']);
					$this->bind(':carname', $post['carname']);
					$this->bind(':company', $post['company']);
					$this->bind(':ctype', $post['ctype']);
					$this->bind(':milage', $post['milage']);
					$this->bind(':id', $get['id']);
					$this->execute();

					Message::setMsg('Data successfully updated', 'success');
					header('Location: '. ROOT_PATH);
			}else {
					$this->query('SELECT * FROM cars WHERE id = :id');
					$this->bind(':id', $get['id']);
					//$row = $this->countSet();
					$row = $this->single();
					//if($row > 0)
					if($row){
						//$this->query('SELECT * FROM shares WHERE id = :id');
						//$this->bind(':id', $get['id']);
						return $row; //$this->single();
					} else {
						header('Location: ' . ROOT_PATH);
					}
				}
		}
	}
}

?>