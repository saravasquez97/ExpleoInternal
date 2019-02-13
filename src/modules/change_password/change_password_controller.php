<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/25/18
 * Time: 2:33 AM
 */

require_once("change_password_model.php");

session_start();

sanitized();

noneMissing();

verifyOldPassword();

verifyPasswordsMatch();

changePassword();
/**
 * Function that actually changes the password
 * @param  none
 * @return none
 */

function changePassword(){
    if(updatePass($_POST['newPassword'], $_SESSION['uid'])) {
        success("Success: Password changed");
    }else{
        error("Error: Could not update password");
    }
}

/**
 * Verifies that the new and confirm passwords match
 * @param  none
 * @return none
 */

function verifyPasswordsMatch(){
    $new = $_POST['newPassword'];
    $confirm = $_POST['confirmPassword'];

    if($new != $confirm){
        error("Error: Passwords do not match");
    }
}

/**
 * Verify that the given password matches the old password
 * @param  none
 * @return none
 */

function verifyOldPassword(){
    $oldDBPass = getOldPassword($_SESSION['uid']);
    $oldPostPass = $_POST['oldPassword'];

    if($oldDBPass != $oldPostPass){
        error("Error: The old password entered was incorrect");
    }
}

/**
 * Ensures that no inputs are missing
 * @param  none
 * @return none
 */
function noneMissing() {
    foreach($_POST as $element){
        if(empty($element)){
            error("Error: One or more required fields are empty");
        }
    }
}

/**
 * Sanitizes inputs for SQL injections
 * @param  none
 * @return none
 */

function sanitized() {

    $array = array(

        'oldPassword' => FILTER_SANITIZE_EMAIL,
        'newPassword' => FILTER_SANITIZE_STRING,
        'confirmPassword' => FILTER_SANITIZE_STRING
    );

    if(!filter_input_array(INPUT_POST, $array)){
        error("Error: Invalid entry.");
    }

}

/**
 * On success, go back to profile controller with correct message
 * @param  success message
 * @return none
 */

function success($message){
    $_SESSION['errorMessage'] = null;
    $_SESSION['success'] = $message;
    header("Location: ../profile/profile_controller.php");
    exit();
}

/**
 * On failure, go back to profile controller with correct message
 * @param  error message
 * @return none
 */

function error($message){
    $_SESSION['errorMessage'] = $message;
    header("Location: ../profile/profile_controller.php");
    exit();
}