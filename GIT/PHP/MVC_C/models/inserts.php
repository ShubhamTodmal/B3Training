<?php

	class StoreModel extends Model{

		public function add()
		{
				// sanitize post
			$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);


			  // insert table
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
						$post['modelno']=$post['carname']=$post['company']=$post['ctype']=$post['milage']=null;
						return $post;
					}
				}

}

?>