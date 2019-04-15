<?php
/**
 * Created by GLAS1.
 * User: sara
 * Date: 14/2/19
 * Time: 1:55 PM
 */

require_once ("sales_verify_model.php");

if(!isset($_SESSION))
{
    session_start();
}

$_SESSION['errorMessage'] = null;

/*
	Get sales users that are not verified
*/
getUsers();

/*
	Update page after verifications
*/
if(isset($_POST['verify'])){
	updateVerified($_POST);
	getUsers();
}

/*
	Update page after deleting users
*/
if(isset($_POST['remove'])){
	deleteUser($_POST);
	getUsers();
}

header("Location: sales_verify_view.php");

/*
	Get the sales users to be displayed
*/
function getUsers(){
	$unverified = getUnverifiedUsers();
	$_SESSION['users'] = $unverified;
}


/*
	Contact the database to set the verified user flag to true
*/
function updateVerified($post)
{
	$selected = $post['selected_verify'];
	foreach($selected as $user){
		verify($user);
	}
}

/*
	Contact the database to remove an unwanted user from the database
*/
function deleteUser($post){
	$selected = $post['selected_verify'];
	foreach($selected as $user){
		remove($user);
	}
}
?>
