<?php
/**
 * Created by PhpStorm.
 * User: luke
 * Date: 10/24/18
 * Time: 7:47 PM
 */

 if(!isset($_SESSION))
 {
     session_start();
 }


?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Connor">

    <!-- Required meta tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/bootstrap.css">
    <link href="../../../assets/css/main.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/jquery.min.js"><\/script>')</script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <title>Expleo Internal</title>

    <style>
        body {
            padding-top: 8rem;
        }
    </style>

</head>
<body>
<div id="heading2">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md fixed-top">

        <a class="navbar-brand" href="#"><img style="width: 100px;" src="../../../assets/img/expleo-logo-white.png" class="figure-img img-fluid rounded" width="45" height="45" alt="The SQS company logo."></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="https://expleogroup.com/" target="_blank">Corporate Site</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
<!--<div class="container">-->
<!--    <div class="form-horizontal" id="centerbox">-->
<!--        Registration Progress-->
<!--    </div>-->
<!--    <div class="progress">-->
<!--        <div id="ProgressBarReg1" class="progress-bar progress-bar-striped active" role="progressbar"-->
<!--             aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%"></div>-->
<!--    </div>-->
    <div class="login">
        <?php
        if(!is_null($_SESSION['errorMessage'])){
            $errorMessage = $_SESSION['errorMessage'];
            echo "
                    <div class='alert alert-danger'>
                        $errorMessage
                    </div>
                ";
        }
        $_SESSION['errorMessage'] = null;
        ?>
  	    <form method="post" action="sign_in_controller.php">
            <img id="LogInImage" style="width: 100%;" src="../../../assets/images/expleo-logo-purple.png" alt="" style="width:50%;display:block;margin-left:auto;margin-right:auto;"><br>
	        <!-- <label for="email_Signin">Email:</label><br> -->
            <br>
	     	    <input class="form-control" type="email" name="email" placeholder="Email" maxlength="30" id="email" autofocus autocomplete="email"/>
	    	<!-- <label for="password">Password:</label><br> -->
	          <input class="form-control" type="password" name="password" placeholder="Password" maxlength="30" id="password"/>
            <br>
            <input class="btn btn-light" type="submit" name="submit" value="Sign in" id="submit"/>
            <br>
        </form>
            <div class="row">
              <div class="col-sm-6">
                <button class="btn" style="width: 100%;" id="RegisterBut" onclick="location.href='../sign_up/sign_up_controller.php'">Sign Up</button>
              </div>
              <div class="col-sm-6">
                <button class="btn" style="width: 100%;" id="ResetBut" onclick="location.href='../reset_password/reset_password_controller.php'">Reset Password</button>
              </div>
            </div>
	   </div>
</html>
