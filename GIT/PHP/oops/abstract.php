<?php

	abstract class animal{
		public $name;
		public $color;

		public function des()
		{
			return $this->name.' is '.$this->color;
		}
		abstract public function sound();
	}

	class dog extends animal{
		public function des()
		{
			return parent::des();//here we call parent des() function
		}
		public function sound()//here we override parent abstract function
		{
			return "Bhaaaauuuuuuu....!!";
		}
	}

	$tiger = new dog;// if here we animal class it gives error cause we cant instantiate abstarct class/function
	
	$tiger->name = "motya";
	$tiger->color = "brown";
	echo $tiger->des()." sounds like ".$tiger->sound();

?>