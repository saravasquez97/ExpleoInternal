<?php
/**
 *
 */

 if(!isset($_SESSION))
 {
     session_start();
 }
require_once('verify_controller.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/bootstrap.css">
    <title>SQS Training - Verify Account</title>
    <style> .alert { margin-top: 5%; }</style>
  </head>
  <body>

	<nav class="navbar navbar-dark bg-dark">
	  <a class="navbar-brand" href="/index.php">
	    <img src="../../../assets/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="alien spaceship">
	    SQS Training
	  </a>
	</nav>

	<?php getStatusPage($email, $hash); ?>


 <?php include("../../views/footer.php");?>
