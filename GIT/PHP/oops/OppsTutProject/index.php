<?php

// starting session
session_start();

require('classes/Messages.php');
require('config.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/home.php');
require('controllers/shares.php');
require('controllers/users.php');

require('models/home.php');
require('models/share.php');
require('models/user.php');

$boot = new Bootstrap($_GET);
$controller = $boot->createController();

if($controller)
{
	$controller->executeAction();
}
