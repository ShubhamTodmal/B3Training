<?php

	class URL{
		private $controller;
		private $action;
		private $request;

		public function __construct($request)
		{
			$this->request = $request;
			if($this->request['controller'] == "")
			{
				$this->controller = 'home';
			}else{
				$this->controller = $this->request['controller'];	
			}

			if($this->request['action'] == "")
			{
				$this->action = 'index';
			}else{
				$this->action = $this->request['action'];
			}

		}


			// to check new controller created
		public function createController()
		{
			//check class exist
			if(class_exists($this->controller)){
				$parents = class_parents($this->controller);
				//check extends
				if(in_array("Controller", $parents)){
					if(method_exists($this->controller, $this->action)){
						return new $this->controller($this->action,$this->request);
					}else{
						// method doen not exist
						echo '<h1>Methods does not exist</h1>';
						return;
					}
				}else{
					// Base controller doen not exist
						echo '<h1>Base Controller does not exist</h1>';
						return;
				}
			}else{
				// Controller class doen not exist
						echo '<h1>Controller class does not exist</h1>';
						return;
			}
		}
	}
	  