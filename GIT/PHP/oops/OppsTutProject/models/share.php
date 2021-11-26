<?php

class ShareModel extends Model{
	public function Index(){
		$this->query("select * from shares order by create_date desc");
		$rows = $this->resultSet();
		return $rows;
	}

	public function add()
	{

		// sanitize post
		$post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

		if(isset($post['submit'])){

			// Validation
			if($post['title'] == '' || $post['body'] == '' || $post['link'] == ''){
				Messages::setMsg("Please Fill All Fields!","error");
				return;
			}
			// insert into share table
			$this->query("insert into shares(title,body,link,user_id) values(:title,:body,:link,:user_id)");
			$this->bind(":title",$post['title']);
			$this->bind(":body",$post['body']);
			$this->bind(":link",$post['link']);
			$this->bind(":user_id",1);
			$this->execute();

			//verify execute
			if($this->lastInsertId()){
				// redirect
				header("location:".ROOT_URL."shares");
			}
		}
		return;
	}
}

?>