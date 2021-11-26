<?php

	class user{
		public $u1 = 'shubh';
		public $u2 = 'shubham';
		public $u3 = 'shubhya';

		protected $u4 = 'kalya';
		private $u5 = 'shubhu';

		/*
		// iteration on var
		function iterobject()
		{
			foreach ($this as $key => $value) {
				//here this is pointing to the property of class
				print "$key => $value\n";
			}
		}*/
		//this is iteration on variables of class
	}

	$u = new user;
	//$u->iterobject();

foreach ($u as $key => $value) {
	print "$key => $value\n";
}
// we also iterate outside of class but it not access protected and private data



?>