<?php 

	$cookie_name = "user";
	$cookie_value = "shubh";
	setcookie($cookie_name,$cookie_value,time()+(86400*30),"/"); // 86400 = 1day
	//setcookie($cookie_name,$cookie_value,time()-3600);// to delete cookie we subtract time() through 3600
	setcookie($cookie_name,$cookie_value,time()+3600,'/');//here we already delete cookie in last 1 hour hence setcookie() is updated to delete and we get if pasrt of set cookie
	//if we add 3600 with time our cookie is seted hence we get else part of cookie set msg
 ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<?php

			//		cookie is set or not msg
			if(!isset($_COOKIE[$cookie_name]))
			{
				echo "Cookie named '".$cookie_name."' is not set!";
			}
			else
			{
				echo "cookie '".$cookie_name."' is set<br>";
				echo "value is: ".$_COOKIE[$cookie_name];
			}//get if cookie is seted or not
			echo "<br>";

			//		cookie is deleted msg
			/*echo "Cookie $cookie_name:$_COOKIE[$cookie_name] is deleted!";
			echo "<br>";*/

			//		cookie is unabled or desabled msg
			if(count($_COOKIE) > 0)
			{
				echo "Cookie are enabled.";
			}
			else
			{
				echo "Cookies are disabled";
			}

		?>
</body>
</html>