<?php

class UserModel extends Model{
	public function register(){
		// sanitize post
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
		

		if(isset($post['submit'])){

			// password ecryption
			$password = md5($post['password']);

			// Validation
			if($post['name'] == '' || $post['email'] == '' || $post['password'] == ''){
				Messages::setMsg("Please Fill All Fields!","error");
				return;
			}
			// insert into user table
			$this->query("insert into users(name,email,password) values(:name,:email,:password)");
			$this->bind(":name",$post['name']);
			$this->bind(":email",$post['email']);
			$this->bind(":password",$password);
			$this->execute();

			//verify execute
			if($this->lastInsertId()){
				// redirect
				header("location:".ROOT_URL."users/login");
			}
		}
		return;
	}

	public function login()
	{
		// sanitize post
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

		

		if(isset($post['submit'])){

			$password = md5($post['password']);

			//  compaire login
			$this->query("select * from users where email = :email and password=:password");
			$this->bind(":email",$post['email']);
			$this->bind(":password",$password);

			$row = $this->single();
			if($row){
				//echo "logged in!!";
				$_SESSION['log_in'] = true;
				$_SESSION['user_data'] = array(
					"id" => $row['id'],
					"name" => $row['name'],
					"email" => $row['email']
				);
			header('location:'.ROOT_URL.'shares');
			}
			else{
				//echo "incorrect logined!!";
				Messages::setMsg("Incorerct Logined!!","error");

			}
		}
		return;
	}
}

?>