<?php

// starting session
session_start();

require('config.php');
require('classes/Message.php');
require('classes/URL.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/home.php');
require('controllers/insert.php');
require('controllers/drop.php');
require('controllers/update.php');
//require('controllers/delete.php');
//require('controllers/users.php');

require('models/home.php');
require('models/inserts.php');
require('models/drops.php');
require('models/updates.php');
//require('models/user.php');

$url = new URL($_GET);
$controller = $url->createController();

if($controller)
{
	$controller->executeAction();
}

?>