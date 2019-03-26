<?php
/**
 * Created by PhpStorm.
 * User: luke
 * Date: 10/24/18
 * Time: 8:02 PM
 */

 if(!isset($_SESSION))
 {
     session_start();
 }

// destroy session variable
session_destroy();

// reroute to index
header("Location: ../../../index.php");
exit();
