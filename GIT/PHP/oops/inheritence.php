<?php

	class first{
		public $id = 1;
		//private $name ='shubham';
		protected $name ='shubham';

		public function hey($str)
		{
			echo $str;
		}
	}

	class second extends first{
			public function n()
			{
				echo $this->name;//here this is 1st pointing to parent then child
			}
	}

	$s = new second;
	$s->hey("hii");
	// here we see we not write anything in second class still is print hii cause we inherite class first so second can access first class data

	//echo $s->name;//as it is private in class first we cant access in second
	//ltes make it protected still f=gives error cause we can use it in class second and here we call outside of class
	
	$s->n();// here get that name varibale 
?>