<?php
if(!isset($_SESSION))
  {
      session_start();
  }

if($_SESSION['role'] != "SALES" && $_SESSION['role'] != "ADMIN" && $_SESSION['role'] != "SUPERADMIN" ){
  echo "<h3> Login as a Sales Representative or Administrator to access this page </h3></div>";}
else{

  include("compare_controller.php");

  if(!empty($_GET['id'])){
     $user = $_GET['id'];

     $show_photo = true;
     $show_soft = true;
     $show_hard = true;

     ?>

     <div class="row">
       <div class="col-sm-3">
         <div class="profile-modal" name="photo-div"><?php echo showPhoto($user, $show_photo); ?></div>
       </div>
       <div class="col-sm-9">
         <div class="profile-modal" name="name-div">Test Name</div>
       </div>
     </div>
     
     <hr>

     <div class="row">
       <div class="col-sm-6">
         <div class="profile-modal" name="software-skills-div">
           <?php echo showSoft($user, $show_soft, null); ?>
         </div>
       </div>
       <div class="col-sm-6">
         <div class="profile-modal" name="hardware-skills-div">
           <?php echo showHard($user, $show_hard, null); ?>
         </div>
       </div>
     </div>

  <?php
  } else{
    echo 'Error: Content not found';
  }
}
?>
