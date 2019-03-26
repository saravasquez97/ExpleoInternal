<?php

require_once ("../../lib/Connector.php");
require_once ("../../lib/Logger.php");

if(!isset($_SESSION))
{
		session_start();
}



function getStatusPage($email, $hash){

	if (activateAccount($email, $hash)){
		include ("success.html");
	} else {
		include ("failure.html");
	}
}


/**
 * Activate a user account based on an email.
 * @param string $email Email address of the account to activate
 * @param string $hash
 * @return boolean True if account was activated, false otherwise
 */
function activateAccount($email, $hash){

	# Check the user exists based on provided email
	if (!userExists($email)){
		return False;
	}

	# TODO: Check the hash provided matches the database
	if (!hashesMatch($email, $hash)){
		return False;
	}

	# Update the verified attribute
	if (!verifyUser($email)){
		return False;
	}

	return True;
}

/**
 * Compares the hash from the verification email to the hash in
 * the database for the given email.
 * @param string $email Email of user from verification link.
 * @param string $hash Hash of user from verification link.
 * @return boolean True if URL hash matches database hash, False otherwise
 * @todo review function (add logging)
 */
function hashesMatch($email, $hash){

	try {

		# Throw exception if hash is not 32 characters
		if (strlen($hash) != 32){
			throw new Exception("Hash value must be 32 character");
		}


		# Query database to see if $email exists
		$base = Connector::getDatabase();
		$sql = "SELECT * FROM user WHERE email = '$email';";
		$stmt = $base->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch();

		if ($result['hash'] == $hash){
			return True;
		} else {
			return False;
		}

	} catch (Exception $e){
		error_log($e);
		header("Location: /src/views/error.php");
    	exit();
	}

	return True;
}


/**
 * Checks that an email exists in the database.
 * @param string $email email address
 * @return boolean True if email exists, false otherwise.
 * @throws Exception if mysql query fails
 */
function verifyUser($email){

	try {
		$base = Connector::getDatabase();
		$sql = "UPDATE user SET verified=1 WHERE email = '$email';";
		$stmt = $base->prepare($sql);

		if ($stmt->execute()){
			return True;
		} else {
			return False;
		}

	} catch (Exception $e){
		error_log($e);
		header("Location: /src/views/error.php");
    	exit();
	}
}

function userExists($email){
	try {
		$base = Connector::getDatabase();

		$sql = "SELECT * FROM user WHERE email = '$email';";
		$stmt = $base->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch();

		if (isset($result['email'])){
			return True;
		} else {
			return False;
		}

	} catch (Exception $e){
		error_log($e);
		header("Location: /src/views/error.php");
    	exit();
	}
}
