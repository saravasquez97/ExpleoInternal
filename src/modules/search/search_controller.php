<?php

require_once("search_model.php");
if(!isset($_SESSION))
{
    session_start();
}

$_SESSION['errorMessage'] = null;

if(isset($_POST['user_skill']) && !isset($_POST['reset'])) {
	//User clicked search button
    $skill = $_POST['user_skill'];
	//Search for users
    $user_with_skill = queryUserBySkill($skill);
    $_SESSION['search_results'] = $user_with_skill;
    // print_r($_SESSION['search_results']);
    // print_r($user_with_skill);
    #header("Location: search_view.php");
    include("search_view.php");?>

	  <!-- <div class="container"> -->
	  <form class="form-horizontal" id="choose_users" action="../compare/compare_view.php" target="_blank" method="post">
       <?php echo "<input type='hidden' id='skill-input' name='skill' value='$skill'>" #send search param to compare page to echo ?>
	     <div class="container" style='display:flex;'>
		       <?php if (count($user_with_skill) > 0) { ?>
                    <h2>Search Results</h2>
		       <input id="compare" type="submit" name="compare" value="Compare" class="btn btn-light" style="margin-left: auto;">
	     </div>

       <div class="container" style="height: 50%; overflow-y: auto;">
		       <table style='border-collapse:separate; border-spacing: 0 0.5em; width: 100%;'>
				   <!-- Loop through results of query -->
		           <?php foreach($user_with_skill as $row) : ?>
		           <tr>
			         <?php $photo = $row['photo'];
			         echo "<td id='sr_col1'>
				              <img src='$photo' alt='No Photo'>
			              </td>"; ?>

                    <td id="sr_col2">
				            <?php echo $row['name']; ?>
			              </td>

                    <td id="sr_col3">
				            <?php echo $skill; ?>
			              </td>

                    <?php $checkval = intval($row['userID']);
						//Create array of checkboxes, using user id as value
			              echo "<td id='sr_col4'>
				            <input type='checkbox' name='selected_compare[]' id='selected_compare' value='$checkval' />
					          Add
			              </td>"; ?>
		           </tr>

               <?php endforeach;?>
		       </table>
	     </div>
		</form>
<!-- </div> -->
	<?php } else {
				//If no results were found display that information to user
		        echo "<div style='display:flex;'><h2>No Results Found</h2></div>";
	      } ?>
	  <!-- </div> -->
<?php } else {
			//User navigated to page from elsewhere, display generic search view
            header("Location: search_view.php");
            exit();
      } ?>
