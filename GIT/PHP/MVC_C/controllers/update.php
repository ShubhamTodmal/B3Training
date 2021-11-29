<?php

class Update extends Controller{

	protected function edit(){
		$viewmodel = new UpdateModel();
		$this->returnView($viewmodel->edit(), true);
	}
}

?>