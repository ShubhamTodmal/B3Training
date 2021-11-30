<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<form action="<?php $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
			email:<input type="file" name="upload" id="upload"><br>
			<input type="submit" name="submit">
		</form>

		<?php
			  	$host = "host = localhost";
				$user = "user = postgres";
				$port = "port = 5432";
				$password = "password = 4559";
				$db = "dbname = PHP_Practice";
		$conn = pg_connect("$host $port $db $user $password");

			if(isset($_POST['submit'])){
			$up = 1;
			$dir = "needfile/";
			$target_file = $dir.basename($_FILES['upload']['name']);

			//check if file is exsited already
			// if(file_exists($target_file))
			// {
			// 	echo "File is already existed!";
			// 	$up = 0;
			// }

			//check file is less than 500kb
			if($_FILES['upload']['size'] > 100000)
			{
				echo "Sorry file is too large";
				$up = 0;
			}
			

			// upload file
			if($up == 0)
			{
				echo "Sorry, file not uploaded";
			}
			else
			{

				if(move_uploaded_file($_FILES['upload']['tmp_name'], $target_file))
				{
					$insert = pg_query("INSERT into file_up(file_name) VALUES ('".$target_file."')");
            		if($insert){
					echo "the file ".htmlspecialchars(basename($target_file))." has been uploaded";
					}
				}
				else
				{
					echo "sorry file not uploaded";
				}
			}
		}

		?>
</body>
</html>