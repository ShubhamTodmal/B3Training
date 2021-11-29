<?php

	class Insert extends Controller{

		protected function add(){
			$viewmodel = new StoreModel();
			$this->returnView($viewmodel->add(),true);
		}

		/*protected function edit(){
			$viewmodel = new StoreModel();
			$this->returnView($viewmodel->edit(), true);
		}*/
	}

?>