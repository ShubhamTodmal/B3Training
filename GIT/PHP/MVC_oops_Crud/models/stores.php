<?php

	class StoreModel extends Model{

		public function add()
		{
				// sanitize post
			$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
			$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);


			  // update table
			if($get['id'] != NULL || $get['id'] != ''){
				
				if(isset($post['submit'])){

				// Validation
				if($post['modelno'] == '' || $post['carname'] == '' || $post['ctype'] == ''){
					Message::setMsg("Please Fill All Fields!","error");
					$this->query('SELECT * FROM cars WHERE id = :id');
					$this->bind(':id', $get['id']);
					return $this->single();
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
				//if($get['id'] != NULL || $get['id'] != ''){
					// Fetch post using GET parameter value
					//$this->query('SELECT count(*) FROM shares WHERE id = :id');
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
			}else{
					if(isset($post['submit'])){

						// Validation
						if($post['modelno'] == '' || $post['carname'] == '' || $post['ctype'] == ''){
							Message::setMsg("Please Fill All Fields!","error");
							return;
						}
						// insert into share table
						$this->query("insert into cars(modelno,carname,company,ctype,milage) values(:modelno,:carname,:company,:ctype,:milage)");
						$this->bind(":modelno",$post['modelno']);
						$this->bind(":carname",$post['carname']);
						$this->bind(":company",$post['company']);
						$this->bind(":ctype",$post['ctype']);
						$this->bind(":milage",$post['milage']);
						$this->execute();

						//verify execute
						if($this->lastInsertId()){
							// redirect
							Message::setMsg('Data successfully added', 'success');
							header("location:".ROOT_URL);
						}
					}else{
						$post['modelno']=$post['carname']=$post['company']=$post['ctype']='';
						$post['milage']=0;
						return $post;
					}
				}
		}


		public function delete(){
			// Sanitize
			$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
			$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

			if(isset($post['submit'])){
				$this->query('DELETE FROM cars WHERE id = :id');
				$this->bind(':id', $post['id']);
				$this->execute();

				Message::setMsg('Post has been deleted', 'success');
				header('Location: '. ROOT_PATH);
			}else {
				if($get['id'] != NULL || $get['id'] != ''){
					// Fetch post using GET parameter value
					$this->query('SELECT * FROM cars WHERE id = :id');
					$this->bind(':id', $get['id']);
					$row = $this->single();
					//if($row > 0)
					if($row){
						return $get['id'];
					} else {
						header('Location: ' . ROOT_PATH);
					}
				} else {
					header('Location: ' . ROOT_PATH);
				}
			}
		}



}

?>