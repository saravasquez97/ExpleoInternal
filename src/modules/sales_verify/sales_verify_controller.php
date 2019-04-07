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


getUsers();

if(isset($_POST['verify'])){
	updateVerified($_POST);
	getUsers();

}

if(isset($_POST['remove'])){
	deleteUser($_POST);
	getUsers();
}

header("Location: sales_verify_view.php");

function getUsers(){
	$unverified = getSalesUsers();
	$_SESSION['users'] = $unverified;
}

function updateVerified($post)
{
	$selected = $post['selected_verify'];
	foreach($selected as $user){
		verify($user);
	}
}

function deleteUser($post){
	$selected = $post['selected_verify'];
	foreach($selected as $user){
		remove($user);
	}
}
?>
