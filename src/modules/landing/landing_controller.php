<?php
/**
 * Controller for the landing page.
 * @author Stephen Ritchie <stephen.ritchie@uky.edu>
 */ 

session_start();

require_once ("../../lib/Logger.php");
require_once ("../../lib/FeatureLoader.php");


// Checking if the 'start testing' button was clicked.
if ( $_SERVER['REQUEST_METHOD'] == 'POST'){

    $_SESSION['testing_mode'] = 1;
    Logger::getInstance()->log("Testing started for ".$_SERVER['REMOTE_ADDR'], basename(__FILE__));

    header("Location: landing_controller.php");
    exit();
}


// Making sure client is logged in.
if ($_SESSION['uid'] != null){
	include ("landing_view.php");
} else {
    Logger::getInstance()->log("User was not logged in; redirecting to index.php");
	header("Location: /index.php");
    exit();
}
