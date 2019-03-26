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

?>

<?php
    include('../../views/footer.php');
?>
