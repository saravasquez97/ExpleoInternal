<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/9/18
 * Time: 12:38 AM
 */

require_once("sign_up_model.php");
require_once("../../lib/EmailServices.php");

if(!isset($_SESSION))
{
    session_start();
}

$_SESSION['errorMessage'] = null;

$verification = null;


if(!isset($_POST['hidden'])){
    header("Location: sign_up_view.php");
    exit();
}else{
    sanitized();
    noneMissing();
    passwordsChecked();
    createNewUser();
    if(isset($_POST['sales_check'])){
    	header("Location: ../../views/sales_verification_page.php");
    }
    else{
    	header("Location: ../../views/email_verification_page.php");
    }
    exit();
}

/**
 * creates new user
 * @param  none
 * @return data
 */

function createNewUser(){

    $_SESSION['UID'] = null;

    $array = array(
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'sales' => $_POST['sales_check']
    );
    $returned = newUser($array);
    if(is_numeric($returned)){
        $_SESSION['UID'] = $returned;
        if(isset($_POST['sales_check'])){
            $admins = adminEmails();
            foreach($admins as $admin){
                try {
                    $verification = new EmailServices($admin['email']);
                    $verification->sendSalesVerification();
                }catch(Exception $e){
                    error("Error: " . $e);
                }
            }
        }
        else{
            try {
                $verification = new EmailServices($array['email']);
                $verification->sendAccountVerification();
            }catch(Exception $e){
                error("Error: " . $e);
            }
        }
    }else{
        error("Error: Email already exists. Please sign in." );
    }
}

/**
 * checks if passwords given match
 * @param  none
 * @return data
 */

function passwordsChecked(){
    if($_POST['password'] != $_POST['confirm_password']){
        error("Error: Passwords do not match");
    }
}


/**
 * ensure no fields are missing
 * @param  none
 * @return data
 */
function noneMissing(){
    foreach($_POST as $element){
	if(empty($element)){
            	error("Error: One or more required fields are empty");
        }
    }
}

/**
 * sanitized for SQL injections
 * @param  none
 * @return data
 */

function sanitized(){

    $array = array(
        'first_name' => FILTER_SANITIZE_STRING,
        'last_name' => FILTER_SANITIZE_STRING,
        'email' => FILTER_SANITIZE_EMAIL,
        'password' => FILTER_SANITIZE_STRING,
        'confirm_password' => FILTER_SANITIZE_STRING,
        'gender' => FILTER_SANITIZE_STRING
    );

    if(!filter_input_array(INPUT_POST, $array)){
        error("Error: Invalid entry.");
    }
}


/**
 * throws error with message
 * @param  $message
 * @return data
 */
function error($message){
    $_SESSION['errorMessage'] = $message;
    header("Location: sign_up_view.php");
    exit();
}
