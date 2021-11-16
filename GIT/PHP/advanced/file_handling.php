<?php 

	///////				read file
	echo readfile("needfile/tfile.txt");
	echo "<br><br>";


	///////				open file
		// fopen () take 2 arguments 1st is file and 2nd is in which file we want to open file
		/*
			r = open file in read mode(file pointer start at begining)
			r+ = open file in read/write mode(file pointer start at beginig)

			w = open file in write mode  // Earase all data and create new file if not exist
			w+ = open file in read/write mode(pointer start at begining) // same as write

			a = open file in append mode(pointer start at end of file) create new file if doesnt exist
			a+ = open file in read/write mode(pointer start at end of file) //same as append

			x = create new file for write only mode(return false and error if file exits)
			x+ = create new file for read/write(same as x)
		*/
	$f = fopen("needfile/tfile.txt", "r") or die("UNable to open file!");
	echo fread($f,filesize("needfile/tfile.txt"));
	fclose($f);
	echo "<br><br>";



	///////			read single line
	$f = fopen("needfile/tfile.txt", "r") or die("UNable to open file!");
	echo fgets($f,20);//read single line and 2nd para tells the number of char to read
	//like here it read only 20 char
	fclose($f);	
	echo "<br><br>";



	///////			check end of file
	$f = fopen("needfile/tfile.txt", "r") or die("UNable to open file!");
	while(!feof($f))
	{
		echo fgets($f)."<br>";//it read every sinle line upto end-of-file
	}
	fclose($f);
	echo "<br><br>";
	



	///////			read single char
	$f = fopen("needfile/tfile.txt", "r") or die("UNable to open file!");
	echo fgetc($f)."<br>";//it take only one argument
	/*while(!feof($f))
	{
		echo fgetc($f)."<br>";//it read every sinle line upto end-of-file
	}*/
	fclose($f);	
	echo "<br><br>";




	///////			write file
	$f = fopen("needfile/towrite.txt", "w") or die("UNable to open file!");
	fwrite($f, "string writing");
	fwrite($f, "hiiii");//we write 2 string
	fclose($f);

	$f = fopen("needfile/towrite.txt", "w") or die("UNable to open file!");
	fwrite($f, "good nigth");
	fwrite($f, "sleep");//here we see we open file and write again and it override its data because "w" mode override data if we open file again after close()
	fclose($f);

	echo "<br><br>";



	///////			append file
	$f = fopen("needfile/towrite.txt", "a") or die("UNable to open file!");
	fwrite($f, "<br>good morning");
	fwrite($f, "wake up!");//we write 2 string and use "a"(append mode) so its not override old data it append new data to it
	fclose($f);

	echo "<br><br>";

?>