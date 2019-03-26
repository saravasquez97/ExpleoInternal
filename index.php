<?php

if(!isset($_SESSION))
{
    session_start();
}
$_SESSION['testing_mode'] = 0;
require_once ("src/config/config.php");


?>


<!DOCTYPE html>
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
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/jquery.min.js"><\/script>')</script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

        <title>SQS Training Site</title>

        <style>
            body {
                padding-top: 5rem;
            }
        </style>
    </head>
    <body>
        <div id="heading2">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

                <a class="navbar-brand" href="#"><img src="assets/img/logo.png" class="figure-img img-fluid rounded" width="45" height="45" alt="The SQS company logo."></a>
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
        <div>
            <div class="welcome">
                <?php
                if(!is_null($_SESSION['errorMessage'])){
                    $errorMessage = $_SESSION['errorMessage'];
                    echo "
                    <div class='alert alert-danger'>
                        $errorMessage
                    </div>
                ";
                    $_SESSION['errorMessage'] = null;
                }else{
                    if(!is_null($_SESSION['success'])){
                        $message = $_SESSION['success'];
                        echo"
                        <div class='alert alert-success'>
                            $message
                        </div>
                    ";
                    }
                    $_SESSION['success'] = null;
                }
                ?>
                <h1 id="WelcomeHead">Welcome to the SQS Training Website!</h1>
                <p id="DirectionPara">This website is for testing automated script to find different errors throughout the site. Sign in or sign up to begin!</p><br><br>
                <button class="btn" id="LoginBut" onclick="location.href='src/modules/sign_in/sign_in_controller.php'">Sign In</button>
                <button class="btn" id="RegisterBut" onclick="location.href='src/modules/sign_up/sign_up_controller.php'">Sign Up</button>
            </div>
            <br><br>
            <div class="welcome">
                <button class="btn" id="ResetBut" onclick="location.href='src/modules/reset_password/reset_password_controller.php'">Reset Password</button>
            </div>
        </div>
    </body>
<!--    <div id="ResetPassword" class="modal" role="dialog">-->
<!--        <!-- Modal content -->
<!--        <div class="modal-dialog">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h4 class="modal-title">Reset Password</h4>-->
<!--                    <button type="button" class="close" data-dismiss="modal">&times;</button>-->
<!--                </div>-->
<!--                <form id="ResetPasswordForm" name="ResetPasswordForm" action="../reset_password/reset_password_controller.php" method="post">-->
<!--                    <div class="modal-body">-->
<!--                        <div class="row">-->
<!--                            <div class="col-md-4">-->
<!--                                <label class="control-label" for="email">Email</label><br><br />-->
<!--                            </div>-->
<!--                            <div class="col-md-4">-->
<!--                                <input class="form-control" type="text" name="email">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <hr>-->
<!--                    </div>-->
<!--                    <div class="modal-footer">-->
<!--                        <input class="btn btn-success" id="Submit" type="submit" name="submit" value="Confirm">-->
<!--                        <button type="button" name="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
</html>
