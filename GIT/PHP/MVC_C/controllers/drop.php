<?php

class Drop extends Controller{

	protected function delete(){
		$viewmodel = new DropModel();
		$this->returnView($viewmodel->delete(), true);
	}
}

?>