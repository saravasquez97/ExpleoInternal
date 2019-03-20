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


Create_Cards();
}

?>

<?php
    include('../../views/footer.php');
?>
