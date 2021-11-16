<?php

	/*
	Y = year
	m = month
	d = day of month
	l = day of week

	H = 24 hour
	h = 12 hour
	i = minute leading 0
	s = second leading 0
	a = lowercase Ante meridiem and Post meridiem(am & pm)
	*/

	echo "today is: ".date("Y/m/d")."<br>";
	echo "today is: ".date("Y,m l")."<br>";

	echo "today time is: ".date("H:i:sa")."<br>";//return server time
	echo "today time is: ".date("h:i:sa")."<br>";

	echo date_default_timezone_get()."<br>";// here we see our time zone is set to Europ/berlin

	echo date_default_timezone_set("America/New_York")."<br>";//here we change our time zone to America/New_York
	echo date_default_timezone_get()."<br>";//now we get NewYork time zone
	echo "today time is: ".date("h:i:sa")."<br>";// here we get New_York current time

	echo date_default_timezone_set("Asia/calcutta")."<br>";//here we change our time zone to calcutta
	echo date_default_timezone_get()."<br>";//now we get calcutta time zone
	echo "today time is: ".date("h:i:sa")."<br>";// here we get Calcutta current time



	echo "<br><br>";
	//////				Create Date with mktime()

		//	mktime(hour,minute,second,month,day,year)
	$d = mktime(11,14,54,8,12,2014);
	echo "created date is: ".date("Y-m-d h:i:s a",$d);



	echo "<br><br>";
	//////				Create Date with string strtotime()
		//	strtotime(time,now)
	$d = strtotime("10:30pm June 15 2021");
	echo "created date is: ".date("d-m-Y h:i:s a",$d);

	$d = strtotime("tomorrow");// for gives next date of given date
	echo "<br>".date("d-m-Y h:i:s", $d);

	$d = strtotime("next Saturday");// to find next saturday from curent day
	echo "<br>".date("d-m-Y",$d);

	$d = strtotime("+3 months");//next 3rd month from current Date
	echo "<br>".date("d-m-Y",$d);



	echo "<br><br>";
	//////				Extra example
	$startDate = strtotime("monday");
	$enddate = strtotime("+6 weeks",$startDate);
	while($startDate < $enddate)
	{
		echo date("M d ,l",$startDate)."<br>";
		$startDate = strtotime("+1 week",$startDate);
	}
	echo "<br><br>";

	$d1 = strtotime("14 december");
	$d2 = ceil(($d1-time())/60/60/24);
	echo  "there are ".$d2." days until 14th december";
	echo "<br>";
	$d1 = strtotime("14 july");
	$d2 = ceil(($d1-time())/60/60/24);
	echo  "there are ".$d2." days until 14th july";
	echo "<br>".time();// gives time from 1970 to current time



?>