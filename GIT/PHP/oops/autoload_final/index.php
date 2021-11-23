<?php

	/*include 'foo.php';// as we remove it it gives error foo not found
	include 'bar.php';
	//include add that file here so we can use its content in here its like write that whole code here but instead do this we write in another file and include here*/

	// but php gives us another way
	spl_autoload_register(function($class_name)
{
	include $class_name . '.php';
});

	$f = new foo;
	$b = new bar;
	$f->hello();
	$b->hello();// no function bar
	//lets inherite foo in bar
	// now we see $b->hello is accessible


	// after apl_autoload_register we see it still work as normal include

	///////// final //////////

	// as we declare final to foo fucntion is still acessible in bar cause we not ovveride we just access it
	// and final not allowed to extends and ovveride

	// as we make class foo final is will not allowed to extends and bar gives error cause it not extends foo class

	// final is like constant which not redefine again 




?>