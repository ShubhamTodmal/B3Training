<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	welcome	<?php
	if($_SERVER["REQUEST_METHOD"]=="GET")
		echo $_GET['name']."<br> Your Email Address is: ".$_GET['email'];
	if($_SERVER["REQUEST_METHOD"]=="POST")
		echo $_POST['name']."<br> Your Email Address is: ".$_POST['email'];
	?>
</body>
</html>