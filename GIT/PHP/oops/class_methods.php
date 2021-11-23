<?php

	class user{// class

		// constructor

		public function __construct()
		{
			echo "construtor called<br>";
		}



		// methods

		public function reg()// class method or we say function
		{
			echo "user registered<br>";
		}
		public function login($username,$password)
		{
			//echo $username." is now loggined in<br>";
			$this->auth_user($username,$password);
			// here this is pointing to the object which called the given function
		}


		// function in another function
		public function auth_user($username,$password)
		{
			echo $username." is now loggined in<br>";
		}//so take paramereter of login when called and then come to defination then run this function then again back to login function


		// destructor
		// must be end of script. its not matter where we define but for good practice
		public function __destruct()
		{
			echo "destructor called";
		}
		// as object goes outof scope destructor get called remove all assigned memory

		/*public function login($username,$password)
		{
			echo $username." is now loggined in<br>";
		}*///here we see no matter if this function after or before desctructor it work same

	}


	// object
	$u = new user;// this is how we create object for class
	// as we know constructor has same name as class so as we create object due to same name constructor also get caled

	//$u->reg();//using above object we call class method
	$u->login('shubh','4553');





?>