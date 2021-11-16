<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<form action="<?php $_SERVER['PHP_SELF'] ?>" >
			name:<input type="text" name="fname"><br>
			email:<input type="text" name="email"><br>
			<input type="submit">
			
			<?php
			//if($_SERVER['REQUEST_METHOD'] == 'GET')
			//if here we take post in if loop nothing print cause we not pass method in form tag so by default request take it as get 
			//but if our data is greater than we think or in other formate like img or file then it take it as post
				echo $_REQUEST["fname"];//by default get if post declared then it will take it as post


			//$n = $_POST['fname'];
			//echo $n;
			//echo $_GET['email'];
			?>
		</form>
</body>
</html>