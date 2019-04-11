<?php
    include('../../views/header.php');
?>

<script type="text/javascript">document.title += " Employee Search"</script>

<div class="container">

    <h1 id="SearchHead">Employee Search</h1>

    <?php
	  //Verify user is Sales user or Admin
      if($_SESSION['role'] != "SALES" && $_SESSION['role'] != "ADMIN" && $_SESSION['role'] != "SUPERADMIN" )
      {
        echo "<h3> Login as a Sales Representative or Administrator to access this page </h3></div>";}
      else{
    ?>
  <!---<h6 id="SearchInstructions">Enter a skill to search for employees</h6> -->
<!---<h6 id="SearchInstructions">Enter a skill to search for employees</h6> -->
    <hr>
</div>
<div class="container">
    <div class = "text-center">
	  <!-- Create Search Form -->
      <form class= "form-inline my-2 my-lg-0" action="search_controller.php" method="post">
        <font size="4">Hardware or Software Skill: &nbsp;</font> <input type="text" class = "form-control mr-sm-2"  aria-label="Search" id="user_skill" name="user_skill" maxlength = "25" style="font-size: .8em;
      	font-weight: bold;">
	      <button class="btn btn-light my-2 my-sm-0" type="submit">Search</button> &nbsp;
	      <button class="btn my-2 my-sm-0" type="submit" id="reset" name="reset">Reset Search</button>
      </form>
      <hr>
    </div>
  </div>

    <?php } ?>

<?php
    #include('../../views/footer.php');
?>
