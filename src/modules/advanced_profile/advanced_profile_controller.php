<?php

require_once("advanced_profile_model.php");
if(!isset($_SESSION))
{
    session_start();
}

if(isset($_POST['soft_skill_level'])){
    //User clicked Save button, save info to databse
    updateUserInfo();

	//Refresh page with new information
	getAdvSoftware();
	getAdvHardware();

	//Display sucecss message
    success("Success: User info was updated and saved");

}else{
	if(isset($_POST['edit'])){
		//User navigated or refreshed page, display view
        $_SESSION['edit'] = false;
        header("Location: advanced_profile_view.php");
        exit();
    }else {
		//Get user skill information
		getAdvSoftware();
		getAdvHardware();

		$_SESSION['edit'] = false;
		header("Location: advanced_profile_view.php");
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
		//Send skill information from $POST to model
    	updateSkills($_POST);
    }catch(Exception $e){}
}

function error($message){
	//Display error message
    $_SESSION['errorMessage'] = $message;
    $_SESSION['edit'] = true;
    header("Location: advanced_profile_view.php");
    exit();
}

function success($message){
	//Display success message
    $_SESSION['success'] = $message;
    $_SESSION['edit'] = false;
    header("Location: advanced_profile_view.php");
    exit();
}

function getAdvSoftware(){
	//Get software skills from database
	$data = getAdvSoftSkills();
	$_SESSION['advsoftskills'] = $data;
}

function getAdvHardware(){
	//Get hardware skills from database
	$data = getAdvHardSkills();
	$_SESSION['advhardskills'] = $data;
}
