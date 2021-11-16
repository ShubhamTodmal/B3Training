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

			$_SESSION['favcolor'] = "green";
			$_SESSION['favcar'] = "Jaguar";

			echo "Session variable are set";

		?>
</body>
</html>