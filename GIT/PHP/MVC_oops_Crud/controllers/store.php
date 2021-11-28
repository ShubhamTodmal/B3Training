<?php

	class Store extends Controller{

		protected function add(){
			$viewmodel = new StoreModel();
			$this->returnView($viewmodel->add(),true);
		}

		protected function delete(){
			$viewmodel = new StoreModel();
			$this->returnView($viewmodel->delete(), true);
		}

		/*protected function edit(){
			$viewmodel = new StoreModel();
			$this->returnView($viewmodel->edit(), true);
		}*/
	}

?>