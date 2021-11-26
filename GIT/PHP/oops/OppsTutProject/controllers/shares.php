<?php
class Shares extends Controller{
	protected function Index()
	{
		$viewmodel = new ShareModel();// model obejbct created
		$this->returnView($viewmodel->Index(),true);
		// model index returned for view 
	}

	protected function add()
	{
		// if not loged in then session not created then 	we direct it to shares index page
		if(!isset($_SESSION['log_in']))
		{
			header('location:'.ROOT_URL.'shares');
		}
		$viewmodel = new ShareModel();
		$this->returnView($viewmodel->add(),true);
	}
	
}
