<?php

	// encode php values in JS
	// encode assosiative array
	$age = array("a"=>45,"b"=>12,"c"=>7);
	echo json_encode($age);
	echo "<br><br>";


	// encode index array
	$age = array(45,5,52,45);
	$name = array('a','b','c');
	echo json_encode($age)."<br>";
	echo json_encode($name);
	echo "<br><br>";


	// decode Js values in PHP
	$jsonobj = '{"a":45,"b":12,"c":7}';
	var_dump(json_decode($jsonobj));
	// here we see json_decode return a objcet by default.
	echo "<br>";
	// it has a 2nd para if we set it to true then is decode in assosiative array like below
	var_dump(json_decode($jsonobj,true));
	echo "<br><br>";



	// Accessing decoded value
		// we already decode array above lets use it
	$a = json_decode($jsonobj);
	echo "using ->:   ";
	echo $a->a."<br>";echo $a->b."<br>";echo $a->c."<br>";//here we get values of keys
	// we also use [] instead ->
	$b = json_decode($jsonobj,true); //for using [] we have to set its 2nd para to true so it return data in array instead of object
	echo "using []:  ";
	echo $b['a']."<br>";echo $b['b']."<br>";echo $b['c'];
	echo "<br><br>";




	// looping through values
		//let use above object $a
		foreach ($a as $key => $value) {
			echo "$key => $value<br>";
		}

		echo "<br>";
		//let use above assosiative array $b
		foreach ($b as $key => $value) {
			echo "$key => $value<br>";
		}
?>