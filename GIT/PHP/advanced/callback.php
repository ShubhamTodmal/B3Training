<?php

		// callback function
	function mycall($i)
	{
		return strlen($i);
	}

	$str = ['awqd','b','cwd','d'];
	$length = array_map("mycall", $str);//array_map is function which call our user define mycall() function
	// here we see we call as a string and pass callback functoin value as arguments for arry_map1()
	print_r($length);//here we find length of every value
	// as we know map iterate data one by one hence we not need to loop for every data separatly
	echo "<br><br>";

	$str = ['apple','orange','banana','coconut'];
	$length = array_map(function($i){
				return strlen($i);}, $str);//here we use anonymous function like Expression function in JS
	print_r($length);
	echo "<br><br>";



		// user define callback
	function exclaim($s)
	{
		return $s."! ";
	}
	function ask($s)
	{
		return $s."? ";
	}
	function printData($str,$format)
	{
		echo $format($str);
	}

	printData("hiiii","exclaim");
	printData("are you ok","ask");
	//here we see we call callback function as string then it goes to printData then call actual function and print our string

?>