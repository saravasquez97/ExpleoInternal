<?php
/**
 * Created by PhpStorm.
 * User: luke
 * Date: 10/24/18
 * Time: 7:47 PM
 */

require_once("sign_in_model.php");

if(!isset($_SESSION))
{
    session_start();
}

$_SESSION['errorMessage'] = null;


//echo "snowing";

if(isset($_POST['email']) && isset($_POST['password'])) {

    //echo "here";

    // error checking
    sanitized();

    noneMissing();

    verifyLogin();

    header("Location: ../landing/landing_controller.php");
    exit();
} else {
    //echo "here";
    header("Location: sign_in_view.php");
    exit();
}

function sanitized() {

    $array = array(

        'email' => FILTER_SANITIZE_EMAIL,
        'password' => FILTER_SANITIZE_STRING,
    );

    if(!filter_input_array(INPUT_POST, $array)){
        error("Error: Invalid entry.");
    }

}

function noneMissing() {
    foreach($_POST as $element){
        if(empty($element)){
            error("Error: One or more required fields are empty");
        }
    }
}

function error($message){
    $_SESSION['errorMessage'] = $message;
    header("Location: sign_in_view.php");
    exit();
}

function verifyLogin() {
    $array = array(
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    );
    $returned = null;
    $returned = verifyUserInfo($array);

    if (is_array($returned)) {

        if($returned['verified']){
            $_SESSION['uid'] = $returned['UID'];
            $_SESSION['first_name'] = $returned['first_name'];
            $_SESSION['last_name'] = $returned['last_name'];
            $_SESSION['role'] = $returned['role'];
	}else{
		if($returned['role'] != "SALES"){
            	error("This account has not been verified. Please contact an administrator.");}
		else{
			error("This account has not been verified by an administrator. Please try to login again at a later time");}
	}
    } else {
        error($returned);
    }

}
