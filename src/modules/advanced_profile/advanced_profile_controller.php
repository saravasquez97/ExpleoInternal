<?php

require_once("advanced_profile_model.php");
if(!isset($_SESSION))
{
    session_start();
}

if(isset($_POST['soft_skill_level'])){
    //saving data
    updateUserInfo();

	getAdvSoftware();
	getAdvHardware();

    success("Success: User info was updated and saved");

}else{
	if(isset($_POST['edit'])){
        $_SESSION['edit'] = false;
        header("Location: advanced_profile_view.php");
        exit();
    }else {
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
    	updateSkills($_POST);
    }catch(Exception $e){}
}

function error($message){
    $_SESSION['errorMessage'] = $message;
    $_SESSION['edit'] = true;
    header("Location: advanced_profile_view.php");
    exit();
}

function success($message){
    $_SESSION['success'] = $message;
    $_SESSION['edit'] = false;
    header("Location: advanced_profile_view.php");
    exit();
}

function getAdvSoftware(){
	$data = getAdvSoftSkills();
	$_SESSION['advsoftskills'] = $data;
}

function getAdvHardware(){
	$data = getAdvHardSkills();
	$_SESSION['advhardskills'] = $data;
}
