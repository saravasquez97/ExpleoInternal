<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/25/18
 * Time: 2:08 AM
 */

require_once("profile_model.php");
if(!isset($_SESSION))
{
    session_start();
}

if(isset($_POST['first_name'])){
    //saving data

    sanitized();

    noneMissing();

    updateUserInfo();

    $data = getData();

    $_SESSION['progress'] = $data['progress'];
    $_SESSION['first_name'] = $data['first_name'];
    $_SESSION['last_name'] = $data['last_name'];
    $_SESSION['email'] = $data['email'];
    $_SESSION['gender'] = $data['gender'];
    $_SESSION['dateofbirth'] = $data['dateofbirth'];
    $_SESSION['address'] = $data['address'];
    $_SESSION['city'] = $data['city'];
    $_SESSION['state'] = $data['state'];
    $_SESSION['zip'] = $data['zip'];

    $_SESSION['numbers'] = getPhones();
    getSoftware();
    getSoftwareBank();
    getHardware();
    getHardwareBank();

    getGroup();

    success("Success: User info was updated and saved");

}else{

    if(isset($_POST['edit'])){

        $_SESSION['edit'] = false;
        header("Location: profile_view.php");
        exit();

    }else {

        $data = getData();

        $_SESSION['first_name'] = $data['first_name'];
        $_SESSION['last_name'] = $data['last_name'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['gender'] = $data['gender'];
        $_SESSION['dateofbirth'] = $data['dateofbirth'];
        $_SESSION['address'] = $data['address'];
        $_SESSION['city'] = $data['city'];
        $_SESSION['state'] = $data['state'];
        $_SESSION['zip'] = $data['zip'];
        $_SESSION['numbers'] = getPhones();
        $_SESSION['progress'] = $data['progress'];
        getSoftware();
        getSoftwareBank();
        getHardware();
  		getHardwareBank();
        getGroup();


        $_SESSION['edit'] = false;
        header("Location: profile_view.php");
        exit();
    }
}

/**
 * updates users info
 * @param  none
 * @return none
 */

function updateUserInfo(){

    try{
        if(empty($_POST['phone_number1'])){
            deleteNumber($_SESSION['numbers'][0][0]);
        }
    }catch(Exception $e){}

    try{
        if(empty($_POST['phone_number2'])){
            deleteNumber($_SESSION['numbers'][1][0]);
        }
    }catch(Exception $e){}

    try{
        if(empty($_POST['phone_number2'])){
            deleteNumber($_SESSION['numbers'][2][0]);
        }
    }catch(Exception $e){}

    try{
        if(empty($_POST['phone_number3'])){
            deleteNumber($_SESSION['numbers'][3][0]);
        }
    }catch(Exception $e){}

    try{
    	updateSkills($_POST);
    }catch(Exception $e){}

    if(!updateUser($_POST)) {
        error("Error: Could not update profile");
    }
}

/**
 * sanitizes inputs for SQL injections
 * @param  none
 * @return none
 */

function sanitized() {

    $array = array(

        'first_name' => FILTER_SANITIZE_EMAIL,
        'last_name' => FILTER_SANITIZE_STRING,
        'gender' => FILTER_SANITIZE_STRING,
        'dateofbirth' => FILTER_SANITIZE_STRING,
        'address' => FILTER_SANITIZE_STRING,
        'city' => FILTER_SANITIZE_STRING,
        'state' => FILTER_SANITIZE_STRING,
        'zip' => FILTER_SANITIZE_NUMBER_INT
    );

    if(!filter_input_array(INPUT_POST, $array)){
        error("Error: Invalid entry.");
    }
}

/**
 * checks that none are missing
 * @param  none
 * @return none
 */

function noneMissing() {

    $array = array(
        'first_name',
        'last_name',
        'gender',
        'dateofbirth',
        'address',
        'city',
        'state',
        'zip'
    );

    foreach($array as $key=>$value){
        if(empty($value)){
            error("Error: One or more fields is missing");
        }
    }
}

/**
 * throws error with give message
 * @param  $message, error message to be displayed
 * @return none
 */

function error($message){
    $_SESSION['errorMessage'] = $message;
    $_SESSION['edit'] = true;
    header("Location: profile_view.php");
    exit();
}


/**
 * got back to view with success message
 * @param  $message, message to be displayed
 * @return none
 */

function success($message){
    $_SESSION['success'] = $message;
    $_SESSION['edit'] = false;
    header("Location: profile_view.php");
    exit();
}

function getGroup(){
    $data = getGroupName();

    $_SESSION['group'] = $data[0];
}

function getPhone(){
    $data = getPhones();
    return $data;

}


/*
	Get the software skills saves in a user profile
*/
function getSoftware(){
	$data = getSoftSkills();
	$_SESSION['softskills'] = $data;
}

/*
	Get hardware skills saved in a user profile
*/
function getHardware(){
	$data = getHardSkills();
	$_SESSION['hardskills'] = $data;
}

/*
	Get the the possible software skills that the user profile
	does not have currently saved in their profile
*/
function getSoftwareBank(){
	$data = getSoftBank();
	$_SESSION['softbank'] = $data;
}

/*
	Get the possible hardware skills that the user profile
	does no currently have saved to their profile
*/
function getHardwareBank(){
	$data = getHardBank();
	$_SESSION['hardbank'] = $data;
}
