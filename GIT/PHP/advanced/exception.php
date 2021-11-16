<?php

	// exception has throw-caught 
	//when exception thrown code following it will not executed
	//if throw not caught, fatal error occures as "uncaugth exception"

	
	// 	throw without catching
	function divide($d,$divisor)
	{
		if($divisor == 0)
		{
			throw new exception("division by zero!");//new keywork use for exception to throw a msg
		}
		return $d/$divisor;
	}
	//echo divide(5,0);//as expected it gives error
	echo divide(5,5);
	echo "<br><br>";





	// throw with catching it
	// we need try catch block to catch thrown eception
	function divide1($d,$divisor)
	{
		if($divisor == 0)
		{
			throw new exception("division by zero!");//new keywork use for exception to throw a msg
		}
		return $d/$divisor;
	}

		try{
			echo divide1(5,0);
			//echo divide1(5,5);//here we see it catch only one throw at a time
		}catch(exception $e)
		{
			echo "Unable to divide<br>";//here our exception is catch
		}
		//finally block is always runs even exception caught or not
		//even if we not have catch bloack still finally run
		finally{
			echo "process is done";
		}
		echo "<br><br>";





		// Exception Object
		//new Exception(message,code,previous)
		/*
		message = (optional) describe why exception thrown
		code = (optional) an integer to distinguish this exception from other of same type
		previous = (optional) if this exception thrown in catch block of another exception , it is recommeded to pass that exception into this parameter
		*/
		//it has some methods
		/*
		getMessage() = return string describe why exception thrown
		getPrevious() = if this exception trigger by anither one then this methos return previous exception else null
		getCode() = return exception code
		getFile() = return full path of file in which the exception was thrown
		getLine() = return line number of the line of code which threw the exception
		*/
			function divide2($d,$divisor)
	{
		if($divisor == 0)
		{
			throw new exception("division by zero!",1);//new keywork use for exception to throw a msg
		}
		return $d/$divisor;
	}

		try{
			echo divide2(5,0);
			//echo divide1(5,5);//here we see it catch only one throw at a time
		}catch(exception $e)
		{
			$code = $e->getCode();
			$message = $e->getMessage();
			$file = $e->getFile();
			$line = $e->getLine();
			//here we get all method we need to catch exception and show msg

			echo "Exception thrown in $file on line $line: [Code $code] error: $message";
		}
		echo "<br><br>";


?>