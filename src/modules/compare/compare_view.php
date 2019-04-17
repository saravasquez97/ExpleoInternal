<?php
    //include('../../views/header.php');
    include("compare_controller.php");
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

    <title>Expleo Internal</title>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="../../../assets/js/jquery.min.js"><\/script>')</script>
      <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>


    <style>
      body {
          padding-top: 5rem;
          font-family: "Montserrat", sans-serif;
      }

      h1 {
        font-weight: bold;
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
    <nav class="navbar navbar-expand-md fixed-top">

      <a class="navbar-brand" href="../landing/landing_controller.php"><img style="width: 9.0625rem;" src="../../../assets/img/expleo-logo-white.png" class="figure-img img-fluid rounded" width="45" height="45" alt="logo"></a>
        <span class="navbar-toggler-icon"></span>
    </nav>


<div class="container">
<h1 id="CompareHead">Employee Comparison</h1>

<?php
    //If an unathorized user tries to access this page, all that is displayed is this message
    if($_SESSION['role'] != "SALES" && $_SESSION['role'] != "ADMIN" && $_SESSION['role'] != "SUPERADMIN" ) {
          echo "<h3> Login as a Sales Representative or Administrator to access this page </h3></div>";
       }

    else {
?>
        <hr>
        </div>

<?php

	if(isset($_POST['compare']))
            {
              	if (isset($_POST['selected_compare']))
		{
			//if users to compare have been sent from the previous page, create the cards to display user information
            		$user_ids = $_POST['selected_compare'];
            		Create_Cards($user_ids);
              	}
		else
			//if no users have been specified to compare, an error message is displayed
              	{echo "<div class='container'><h3> Error: No users selected on Employee Search page. </h3></div>";}
            }
            else {
              echo "<div class='container'><h3> Error: No users selected on Employee Search Page </h3></div>";
            }
        }

//this function takes an input of an array of user IDs and creates the user cards
function Create_Cards($uid) {
  //figure out if skill is hard or soft skill_id
  $searched_skill = $_POST['skill'];
  $searched_sskill = NULL;
  $searched_hskill = NULL;

  //see if the searched for skill was a hardware or software skill
  if (isSoftSkill($searched_skill)){ $searched_sskill = $searched_skill; }
  else { $searched_hskill = $searched_skill; }

      //put cards in overall container and start list for cards
      ?> <div class="container horizontal-scroll" id = "allcards">
            <div class="row" id = "alldemcards">
                <u1 class="list-inline"> <?php
                     //make card for every user id
                     for( $i = 0; $i < count($uid); $i++)
		     {
			//to allow for removing individual users from the view, create variable names for containers
			$card_id = "user_card".$uid[$i]."child";
			$card_location = "user_card".$uid[$i]."parent";	?>

			<li class = "list-inline-item" id = '<?php echo $card_location; ?>'>
				<div class="card" style="width: 22rem;" id = '<?php echo $card_id; ?>'>
					<?php //create a card for each user
					individualCard($uid[$i], $searched_sskill, $searched_hskill); ?>
		                </div>
			</li>
                        <?php
                     }
        ?>   </div>
          </div> <?php
}

function individualCard($user, $searched_sskill, $searched_hskill) {
        //set booleans for display to be true
        //change later for added functionality of hiding sections
        $show_name = true;
        $show_photo = true;
        $show_basic = true;
        $show_soft = true;
	$show_hard = true;
	//create the variable that specifies card to remove if the 'x' button on the user page is removed
	$card_pass = "user_card".$user;

	//display name, photo, software skills, and hardware skills on user card
?>

        <div class="card-body">
			    <div style="height:auto"><h5 class="card-title">
            <?php echo showName($user); ?>
	          <button type="submit"  class="close" onclick = closeuser('<?php echo $card_pass; ?>') >&times;</span></button>
          </h5></div>
          <div style="height:auto"><?php echo showPhoto($user, $show_photo); ?></div>
          <br>
          <div style="height:auto"><p class="card-text"><?php echo showBasic($user, $show_basic);?></p></div>
          <hr>
          <div style="height:11.5rem"><p class="card-text"><?php echo showSoft($user, $show_soft, $searched_sskill, 5);?></p></div>
          <hr>
          <div style="height:11.5rem"><p class="card-text"><?php echo showHard($user, $show_hard, $searched_hskill, 5);?></p></div>
          <hr>
          <button type="button" class="btn btn-light openBtn" <?php echo "value='$user'";?>>View Full Profile</button>

		    </div>

        <!-- Modal -->
        <div class="modal fade" id="profileModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                  <!-- <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div> -->
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
        $('.openBtn').on('click',function(){
            var thisUser = $(this).val();
            $('.modal-body').load('user-profile.php?id='+thisUser,function(){
                $('#profileModal').modal({show:true});
            });
        });

	function closeuser(user) {
          var parent = document.getElementById(user + "parent");
          var child = document.getElementById(user+ "child");
          parent.removeChild(child);
        }
        </script>

<?php
}
	include('../../views/footer.php');
?>
