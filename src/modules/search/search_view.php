<?php
    include('../../views/header.php');
session_start();
?>


<html lang="en">
<h2 id="SearchHead">Search Users</h2> 

<h5 id="SearchInstructions">Please enter one or more of the following to search for users who possess that specific skill or characteristic.</h5> 

<hr>
<div class = "container">

<form action="add_to_database.php" method="post">
Hardware Skill: <input type="text" id="scii_name" name="sci_name" maxlength = "25" style> 
Software Skill: <input type="text" id="common_name" name="common_name" maxlength ="25">
<!--- Previous Vertical: <input type="text" id="classification" name="classification" maxlength = "25"> -->
<!--- Previous Client: <input type="text" id="prev_client" name="prev_client" maxlength="25"> -->
<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>

</div>

<?php
    include('../../views/footer.php');
?>

