<?php

// starting session
session_start();

require('config.php');
require('classes/Message.php');
require('classes/URL.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/home.php');
require('controllers/store.php');
//require('controllers/delete.php');
//require('controllers/users.php');

require('models/home.php');
require('models/stores.php');
//require('models/user.php');

$url = new URL($_GET);
$controller = $url->createController();

if($controller)
{
	$controller->executeAction();
}

?>