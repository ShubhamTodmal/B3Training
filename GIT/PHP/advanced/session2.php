<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<?php

			///				print seted session variable
			//echo "favorite color: ".$_SESSION['favcolor']."<br>";
			//echo "favorite car: ".$_SESSION['favcar'];
			print_r($_SESSION);//we can use this to show session variable instead above
			// as this gives us assositive array
			echo "<br>";



			// 				note
			//here we get that session variables are not passed individually to eeach page, instaed they are retrived from the session we open at the begining of each page
			//and all session variable values are stored in global $_Session varibale 

			//so we store varibale in session.php but as we open session here abd as it is also global varibale we access them here or on any page where we start session



			//				change session data
					//just start session and use its key and set new values ssame as we set
			$_SESSION['favcolor'] = 'black';

			print_r($_SESSION);// here we see varible value is changed it also muted original value
			echo "<br>";




			//				remove all session
			session_unset();
			print_r($_SESSION);// here we see all variable seted in session removed but session still alive
			// it gives empty array
			echo "<br>";



			//				destroy session
			session_destroy();
			print_r($_SESSION);//here our session destroyed but as there no sessoin it retunr empty array
		?>
</body>
</html>