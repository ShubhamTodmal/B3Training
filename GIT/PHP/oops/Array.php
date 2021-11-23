<?php

$num = array(12,45,7,4,121);
$num1 = [12,45,7,4,121];// another type of array to define
print_r($num);
print_r($num1);

echo "<br>".$num[0]."<br>".$num1[0]."<br>";


$ages = array(
	'shubh'=>22,
	'karan' => 25,
	'shree' => 22
);
echo $ages['karan']."<br>";//its case sensitive

array_pop($num);//delete from last
array_shift($num1);//delete from 1st
print_r($num);//here we see last element deleted
print_r($num1)."<br>";//here we see 1st element deleted

//////////////////Loops///////////////////////

// for loop
for ($i=0; $i < 5; $i++) { 
	echo $i;
}

// while loop
echo "<br>";
$i=0;
while($i <= 10)
{
	echo $i;
	$i++;
}

echo "<br>";
// froeach loop
foreach ($ages as $value) {//for values
	echo $value."\t";
}

foreach ($ages as $key=>$value) {//for key-values
	echo $key."=>".$value."\t";
	//for key we have to pass both arguments if only on epassed it take it as value
}

?>