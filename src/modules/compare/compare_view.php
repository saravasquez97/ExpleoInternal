<?php
    include('../../views/header.php');
    include("compare_controller.php");
    if(!isset($_SESSION))
    {
        session_start();
    }
?>


<div class="container">
<h2 id="CompareHead">Employee Comparison</h2>

<?php  if($_SESSION['role'] != "SALES" && $_SESSION['role'] != "ADMIN" && $_SESSION['role'] != "SUPERADMIN" ){
echo "<h3> Login as a Sales Representative or Administrator to access this page </h3></div>";}
else{
?>
<hr>
</div>

<?php


if(isset($_POST['compare']))
{
  if (isset($_POST['selected_compare']))
  {
	   $user_ids = $_POST['selected_compare'];
     Create_Cards($user_ids);
  } else {
    echo "<div class='container'><h3> Error: No users selected on Employee Search page. </h3></div>";
  }
} else {
  echo "<div class='container'><h3> Error: No users selected on Employee Search page. </h3></div>";
}
}

function Create_Cards($uid){
  //figure out if skill is hard or soft skill_id
  $searched_skill = $_POST['skill'];
  $searched_sskill = NULL;
  $searched_hskill = NULL;
  
  if (isSoftSkill($searched_skill)){ $searched_sskill = $searched_skill; }
  else { $searched_hskill = $searched_skill; }

        //get user ids


        //put cards in overall container and start list for cards
        ?> <div class="container horizontal-scroll">
                <div class="row">
                      <u1 class="list-inline"> <?php

                        //make card for every user id
                        for( $i = 0; $i < count($uid); $i++)
                        {
                            ?>
                            <li class = "list-inline-item">
                                <?php individualCard($uid[$i], $searched_sskill, $searched_hskill); ?>
                            </li>
                            <?php
                          } ?>
                </div>
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
?>


<div class="card" style="width: 22rem;">
    <div class="card-body">
        <div style="height:auto"><h5 class="card-title"> <?php echo showName($user); ?></h5></div>
        <div style="height:auto"><?php echo showPhoto($user, $show_photo); ?></div>
        <div style="height:auto"><p class="card-text"><?php echo showBasic($user, $show_basic);?></p></div>
        <div style="height:11.5rem"><p class="card-text"><?php echo showSoft($user, $show_soft, $searched_sskill);?></p></div>
        <div style="height:11.5rem"><p class="card-text"><?php echo showHard($user, $show_hard, $searched_hskill);?></p></div>
        <!---<a href="#" class="btn btn-primary">Go somewhere</a>-->
    </div>
</div>


<?php
}
	include('../../views/footer.php');
?>
