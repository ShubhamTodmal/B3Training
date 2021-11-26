<?php

class Messages{

	public static function setMsg($text,$type)
	{
		if($type == "error"){
			$_SESSION['errormsg'] = $text;
		}
		else{$_SESSION['successmsg'] = $text;
		}
	}

	public static function display(){
		
		if(isset($_SESSION['errormsg'])){
			echo '<div class="alert alert-danger>'.$_SESSION['errormsg'].'</div>';
			unset($_SESSION['errormsg']);
		}
		
		if(isset($_SESSION['successmsg'])){
			echo '<div class="alert alert-success>'.$_SESSION['successmsg'].'</div>';
			unset($_SESSION['successmsg']);
		}
	}

}
?>
