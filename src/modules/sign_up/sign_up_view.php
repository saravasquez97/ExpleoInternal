<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/9/18
 * Time: 12:39 AM
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

        <title>SQS Training Site</title>

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

            <a class="navbar-brand" href="../../../index.php"><img style="width: 9.0625rem;" src="../../../assets/img/expleo-logo-white.png" class="figure-img img-fluid rounded" width="45" height="45" alt="logo"></a>
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
    <div class="container">
        <div class="form-horizontal" id="centerbox">
            Registration Progress
        </div>
        <div class="progress">
            <div id="ProgressBarReg1" class="progress-bar progress-bar-striped active" role="progressbar"
                 aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%"></div>
        </div>

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
            ?>
            <form  id="RegForm1" name="registerform" action="sign_up_controller.php" method="post">
                <input id="hidden" type='hidden' name = 'hidden' value="sign_up_view">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="first_name" size="30" id="SignupFirstName" maxlength="50" placeholder="First Name" autofocus autocomplete="name"/>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="last_name" size="30" id="SignupLastName" maxlength="50" placeholder="Last Name" autocomplete="family-name"/><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input class="form-control" type="text" name="email" size="30" id="SignupEmail" maxlength="30" placeholder="Email" autocomplete="email"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control" type="password" name="password" size="30" id="signup_Password" maxlength="30" placeholder="Password"/><br>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="password" name="confirm_password" size="30" id="signup_ConfirmPass" maxlength="30" placeholder="Confirm Password" autocomplete="off"/><br>
                        </div>
                    </div>
		    <div class="row">
			<div class="col-md-8 offset-md-3">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="true" id="SignupSales" name="sales_check">
					<label for="salesCheck">I am a Sales Representative</label><br>
				</div>
			</div>
		    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <input class="btn btn-light" type="submit" name="submit" value="Register" id="submit"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</html>
