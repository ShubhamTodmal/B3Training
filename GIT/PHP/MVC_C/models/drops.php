<?php

class DropModel extends Model{

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