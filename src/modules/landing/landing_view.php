<?php
/**
 * View for the landing page
 * @author Stephen Ritchie <stephen.ritchie@uky.edu>
 */

//include_once("landing_controller.php");
include_once("../../views/header.php");

?>

<script type="text/javascript">document.title += " Home"</script>

<div class="container">
  <div id="welcome_message">
    <h1>Welcome
    <?php  if($_SESSION['role'] != "SALES") {
              echo "to Expleo Training</h1>";
              echo "<p>This website has been created to serve as a sandbox environment for users to test both their
                 manual and automated testing strategies.  To begin, press the \"Start Testing\" button below.</p>";

              echo "<form action='landing_controller.php' method='post'>
                      <input type='hidden' id='testing' value='1'>";
                      if (!$_SESSION['testing_mode']){
                          echo "<input type=\"submit\" value=\"Start Testing\" class=\"btn btn-light\">";
                      }
              echo "</form>";
           }
           else {
              echo "</h1>";
           }
    ?>
  </div>


    <!-- YouTube Feature -->
    <?php include (FeatureLoader::getInterface()->getFeature($_SESSION['uid'], "youtube")); ?>

    <!-- Google Map Feature -->
    <?php include (FeatureLoader::getInterface()->getFeature($_SESSION['uid'], "googlemap")); ?>

    <br>

</div>

<?php include_once("../../views/footer.php"); #HTML footer ?>
