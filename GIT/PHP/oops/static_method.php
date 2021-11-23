<?php

	class user{
		public static $minLength = 5;

		public static function validatePass($pass)
		{
			if(strlen($pass)>= self::$minLength)//for static we use self:: instead this->
			{
				 return true;
			}else
			{
				return false;
			}
		}
	}

	$password = "pass156";
	if(user::validatePass($password))//we call static method using class and scope resolution not using object
	{
		echo "valid";
	}else echo "invalid";


	// static is class property not a object property hence we call it using class name and use self cause it point to class not object
	//as object can pass vary data so we use this so this get its pointing obejct data


?>