<?php
    include('../../views/header.php');
?>

<div class="container">
<h2 id="SearchHead">Employee Search</h2> 

<?php  if($_SESSION['role'] != "SALES"){
echo "<h3> Login as a Sales Representative or Administrator to access this page </h3></div>";}


else{ 
?>
<!---<h6 id="SearchInstructions">Enter a skill to search for employees</h6> -->
<hr>

<div class = "text-center">

<form class= "form-inline my-2 my-lg-0" action="search_view.php" method="post">
<font size="4">Hardware or Software Skill: &nbsp;</font> <input type="text" class = "form-control mr-sm-2"  aria-label="Search" id="user_skill" name="user_skill" maxlength = "25" style> 
<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>

</div>
</div>

<?php }
?>

<?php
    include('../../views/footer.php');
?>

