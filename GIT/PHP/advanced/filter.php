<?php
	// filter is use to check we getting validate data or not

	/////		filter_var() its use to filter a single variable
	//			for string
	$str = "<h1>hii</h1>";
	$validate = filter_var($str,FILTER_SANITIZE_STRING);// taje 2 para 1st our data we want to check 2nd type of check to use
	//it also remove all html tags
	echo $validate;
	echo "<br><br>";



	/////		filter_var() its use to filter a single variable
	//			for integer
	$str = 10;
	$str1= 0;
	if(filter_var($str,FILTER_VALIDATE_INT))
	{
		echo "data validate to integer";// here we see str1=0 is not validate so we can do one thing like below
	}
	/*if(filter_var($str1,FILTER_VALIDATE_INT)===0)
	{
		echo "data validate to integer";
	}*/
	echo "<br><br>";



	/////		filter_var() its use to filter a single variable
	//			for IP Address
	$str = "127.0.0.1";
	if(filter_var($str,FILTER_VALIDATE_IP))
	{
		echo "data validate to IP";
	}
	echo "<br><br>";



	/////		filter_var() its use to filter a single variable
	//			for Email
	//$str = "s@gmail.1651com";// as we it is not correct email so its not validate
	$str = "s@gmail.com";//it is correct hence its validate
	$str2 = filter_var($str,FILTER_SANITIZE_EMAIL);//it remove illegal character from eamil
	if(filter_var($str2,FILTER_VALIDATE_EMAIL))
	{
		echo "data validate to Email";
	}
	echo $str2;
	echo "<br><br>";




	/////		filter_var() its use to filter a single variable
	//			for INteger whether it is in Range or not

	$int = 20;
	$min = 1;
	$max = 50;
	if(filter_var($int,FILTER_VALIDATE_INT,
					array("options" => 
						array("min_range" => $min,"max_range" => $max)))/*===false// for check false condition 1st*/)
	{
		echo "data in Int range";
	}
	echo "<br><br>";




	/////		filter_var() its use to filter a single variable
	//			for URL
	// same we do for url 1st remove unwanted then validate url
	echo "<br><br>";




	/////		filter_var() its use to filter a single variable
	//			for IPv6 address
	$ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";

	if(filter_var($ip,FILTER_VALIDATE_IP,FILTER_FLAG_IPV6))
	{
		echo "data validate to IPv6";
	}
	echo "<br><br>";




	/////		filter_var() its use to filter a single variable
	//			for url contains query string or not
	$ip = "www.w3school.com";

	if(filter_var($ip,FILTER_VALIDATE_URL,FILTER_FLAG_QUERY_REQUIRED))
	{
		echo "url is valid url with a query string";//here we see not printing any this cause above irl not have query string
	}
	echo "<br><br>";





	/////		filter_var() its use to filter a single variable
	//			for remove ASCII value > 127
	$ip = "<h1>hiii%$!?</h1>";//here nothing is greater than 127 ASCII value

	$new1 = filter_var($ip,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);
	echo  $new1;
	echo "<br><br>";



			// sanitize use to filter unwanted
			// validate use to validate our data

?>