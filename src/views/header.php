<?php
  /**
   *
   *
   *
   */
   if(!isset($_SESSION))
     {
         session_start();
     }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" type="text/css" href="../../../assets/css/main.css">
      <link rel="stylesheet" type="text/css" href="../../../assets/css/bootstrap.css">

    <title>SQS Training Site - </title>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="../../../assets/js/jquery.min.js"><\/script>')</script>
      <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>


    <style>
      body {
          padding-top: 5rem;
      }
    </style>

      <script type="text/javascript">
          $(document).ready(function(){

              if($(window).width() > 767){
                  $('.navbar .dropdown').hover(function() {
                      $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();

                  }, function() {
                      $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp();

                  });

                  $('.navbar .dropdown > a').click(function(){
                      location.href = this.href;
                  });
              }
          });
      </script>
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">

      <a class="navbar-brand" href="#"><img src="../../../assets/img/logo.png" class="figure-img img-fluid rounded" width="45" height="45" alt="The SQS company logo."></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="../landing/landing_controller.php">Home</a>
          </li>
	  <?php
    /* only sasles, admin, and superadmin users can access the search functionality*/
	  	if($_SESSION['role'] == "SALES" or $_SESSION['role'] == "ADMIN" or $_SESSION['role'] == "SUPERADMIN"){
			echo "
			  <li class=\"nav-item\">
			    <a class=\"nav-link\" href=\"../search/search_controller.php\">Employee Search</a>
			  </li>
			";
		}
		else{
			echo"
          		  <li class=\"nav-item\">
			    <a class=\"nav-link\" href=\"../groups/groups_view.php\">Groups</a>
			  </li>
			";
		}
    /* sales users don't need to access their profile info*/
    if($_SESSION['role'] != "SALES"){
      echo "<li class=\"nav-item\">
            <a class=\"nav-link\" href=\"../profile/profile_controller.php\">Profile</a>
          </li>";
    }
                if($_SESSION['role'] == "SUPERUSER" || $_SESSION['role'] == "ADMIN" || $_SESSION['role'] == "SUPERADMIN"){
                    echo "
                      <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"../feature/feature_controller.php\">Feature Loader</a>
                      </li>
                    ";
                }
                /* only admin and superadmin users can verify accounts*/
                if($_SESSION['role'] == "ADMIN" || $_SESSION['role'] == "SUPERADMIN"){
                  echo "
                      <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"../sales_verify/sales_verify_controller.php\">Verify Users</a>
                      </li>
                    ";
                }
            ?>
          <li class="nav-item">
            <a class="nav-link" href="https://www.sqs.com/en/index.php" target="_blank">Corporate Site</a>
          </li>
        </ul>
         <form class="form-inline my-2 my-lg-0">
           <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
           <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
         </form>
          <div class="">  </div>
          <form class = "for-inline my-2 my-lg-0" action="../sign_out/sign_out_controller.php">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Sign Out</button>
          </form>
      </div>
    </nav>
    <?php ?>
