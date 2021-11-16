<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h1>include</h1>
	<?php
		include 'needfile/i.php';//if we call wrong file here we got warning and still file running
	?>
	shubham

	<h1>required</h1>
	<?php
		//require 'r.php';//if we call wrong file here we got error and sript stop running here
		require 'needfile/r.php';
		echo "<br>fav car is: $car";
	?>
	Best of world.

	<h1>include</h1>
	<?php
		include 'needfile/i.php';
		echo "<br>fav color is: $color";//as we call or include our file here so we can use its inner component too
	?>
	Todmal.

</body>
</html>