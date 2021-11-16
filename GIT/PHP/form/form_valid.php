<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	//echo !filter_var("adkjcn",FILTER_VALIDATE_EMAIL);// FILTER_VALIDATE_EMAIL; //email regression validation

		$name=$email=$comment = $gender='';
		$Nerror = $Eerror = $Gerror ='';
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if(empty($_POST["fname"]))
			{
				$Nerror = "Name is required!";
			}
			else if(!preg_match("/^[a-z-A-Z-' ]*$/", test_input($_POST["fname"])))
			{
				$Nerror = "Only character and WhiteSpace allowed!";
			}
			else //$name = test_input($_POST["fname"]);//lets try with regression
					$name = test_input($_POST["fname"]);


			if(empty($_POST["email"]))
			{
				$Eerror = "Email is required!";
			}
			else if(!filter_var(test_input($_POST["email"]),FILTER_VALIDATE_EMAIL))//or we can make regression like ["/@gmail.com$/i"]
			{
				$Eerror = "Invalid Email!";
			}
			else $email = test_input($_POST["email"]);

			$comment = test_input($_POST["comment"]);

			if(empty($_POST["g"]))
			{
				$Gerror = "Gender is required!";
			}
			else $gender = test_input($_POST["g"]);
		}

		function test_input($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);

			return $data;
		}

	?>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"><!-- here we use htmlspecialchar() because it convert html char into encoded type so it prevent from exploit -->
			name:<span class="error" style="color: red">*</span><input type="text" name="fname"><span><?php echo $Nerror; ?></span><br>
			email:<span class="error" style="color: red">*</span><input type="text" name="email"><span><?php echo $Eerror; ?></span><br>
			comment:<textarea name="comment" rows="5" cols="40"></textarea><BR>
			Gender:<span class="error" style="color: red">*</span>
					<!--<input type="radio" name="g" value="female">Female
					<input type="radio" name="g" value="male">Male-->
					<!--  to keep values in form  -->
					<input type="radio" name="g" <?php if(isset($gender)&&($gender==="female")) echo "checked";?> value="female">Female
					<input type="radio" name="g" <?php if(isset($gender)&&($gender==="male")) echo "checked";?> value="male">Male
					<span><?php echo $Gerror; ?></span><br>
			<input type="submit">
	</form>
	<?php
			echo $name."<br>".$email."<br>".$comment."<br>".$gender;
	?>
</body>
</html>