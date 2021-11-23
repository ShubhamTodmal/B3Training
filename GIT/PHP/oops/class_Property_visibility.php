<?php

	class user{// class
			private $id;
			private $username;
			private $password;
			private $email;


/*
		// constructor
		public function __construct()
		{
			echo "construtor called<br>";
		}



		// methods

		public function reg()
		{
			echo "user registered<br>";
		}

			public function login($username,$password)
		{
			//echo $username." is now loggined in<br>";
			$this->username = $username;
			$this->password = $password;
			//here we store data is class property using $this
			$this->auth_user();
		}

		// function in another function
		public function auth_user()
		{
			echo $this->username." is authenticated";
			// as data store we get it here 
		}*/



		// lets do above with passing values in constructor
		public function __construct($username,$password)
		{
			$this->username = $username;
			$this->password = $password;
		}

			public function login()
		{
			$this->auth_user();
		}

		// function in another function
		public function auth_user()
		{
			echo $this->username." is authenticated";
			// as data store we get it here 
		}

		public function __destruct()
		{
		}
		

	}//still is work 


	// object
	$u = new user('shubh','4553');
	//echo $u->username;// here we get property of class outside of it cause we define it as public
	//lets make it private and now we got error cause we define it as private
	//even if we make it protected it gives error cause protected only accessed in child & inner class


	//$u->reg();//using above object we call class method
	$u->login();





?>