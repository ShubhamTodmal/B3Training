<?php

	class h{
		private $name;

		// setting values
	 function __set($name,$val)
	 {
	 	echo $name."=".$val;//here we not have $name value so it take its variable name
	 	$this->name = $val;//here we set $name value as $val
	 }

	 // getting values
	 function __get($name)
	 {
	 	echo $name = $this->name;
	 }

	 // isset method
	 function __isset($name)
	 {
	 	echo "is set ".$name."?";
	 	return isset($this->name);
	 }

	}

	$h1 = new h;
	$h1->name = "Me";//here $name is private still we can use it here cause set() method also called as magic method
	$h1->name;// here we get merthod

	echo isset($h1->name);// it give 1 as it is set
	echo isset($h1->n);


	//this is how we can acess private element by get and set ethos

?>