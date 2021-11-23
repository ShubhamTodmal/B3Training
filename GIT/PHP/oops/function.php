<?php

	function greet()
	{
		echo "hii<br>";
	}
	//greet();
	function greet1($name='sh')//default value parameter
	{
		echo "hi ".$name."<br>";//to make uppercase
	}
	greet1('shubham');//here passed so this value taken
	greet1();//no value passed so default value taken

?>	