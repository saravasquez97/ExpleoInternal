<?php
/**
 * Created by PhpStorm.
 * User: luke
 * Date: 10/24/18
 * Time: 7:47 PM
 */

session_start();

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

    <title>SQS Training Site</title>

    <style>
        body {
            padding-top: 10rem;
        }
    </style>

</head>
<body>
<div id="heading2">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

        <a class="navbar-brand" href="#"><img src="../../../assets/img/logo.png" class="figure-img img-fluid rounded" width="45" height="45" alt="The SQS company logo."></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="https://www.sqs.com/en/index.php" target="_blank">Corporate Site</a>
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
            <br><h5 id="LogInWelcomeHead">Welcome to the SQS Training Site, please log in.</h5><br>
            <img id="LogInImage" src="../../../assets/images/logo.png" alt="" style="width:50%;display:block;margin-left:auto;margin-right:auto;"><br>
	        <label for="email_Signin">Email:</label><br>
	     	<input class="form-control" type="email" name="email" placeholder="Email" maxlength="30" id="email" autofocus autocomplete="email"/><br>
	    	<label for="password">Password:</label><br>
	        <input class="form-control" type="password" name="password" placeholder="Password" maxlength="30" id="password"/>
            <input class="btn btn-success" type="submit" name="submit" value="Sign in" id="submit"/>
	    </form>
	</div>
</html>
