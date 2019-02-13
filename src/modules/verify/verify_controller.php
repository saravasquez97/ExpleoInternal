<?php
/**
 * Controller for handling email verification links.
 * @author Stephen Ritchie <stephen.ritchie@uky.edu>
 * @todo Have redirects happen after a certain amount of time.
 */

require_once ("../../lib/Logger.php");
$logger = Logger::getInstance();

include ("verify_model.php");

// Make sure the required GET values have been provided
if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){

	# Sanitize and validate email
	$email = $_GET['email'];
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		$logger->log_warning("Verification link email failed sanitization.");
		header("Location: ../../views/error.php");
		exit();
	}

	# Sanitize and validate hash
	$hash = $_GET['hash'];
	$hash = filter_var($hash, FILTER_SANITIZE_STRING);
	if (strlen($_GET['hash']) != 32){
		$logger->log_warning("Verification link hash failed sanitization.");
		header("Location: ../../views/error.php");
    	exit();
	}
    
    include ("verify_view.php");
}
else {
	$logger->log_warning("Incorrect verification link provided...redirecting to sign in.");
	header("Location: ../../views/error.php");
    exit();
}
