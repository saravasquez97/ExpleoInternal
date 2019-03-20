<?php

require_once("search_model.php");
if(!isset($_SESSION))
{
    session_start();
}

$_SESSION['errorMessage'] = null;

if(isset($_POST['user_skill'])) {
    $skill = $_POST['user_skill'];
    $user_with_skill = queryUserBySkill($skill);
    $_SESSION['search_results'] = $user_with_skill;
    // print_r($_SESSION['search_results']);
    // print_r($user_with_skill);
    #header("Location: search_view.php");
    include("search_view.php");?> <!-- I DON'T KNOW IF THIS IS THE BEST WAY...FOOTER LOOKS WEIRD-->

	  <form class="form-horizontal" id="testResults" action="compare_controller.php" method="post">
	  <div class="container" style='display:flex;'>
	     <h2>Search Results</h2>
       <button id="TestCompare" type="submit" form="testResults" name="compare" value="Compare"
          class="btn btn-primary" style="margin-left: auto;">Compare</button>
	        <!--<input id="TestCompare" type="submit" name="compare" value="Compare" class="btn btn-default" style="margin-left: auto;">-->
	  </div>

    <div class="container">
	  <table style='border-collapse:separate; border-spacing: 0 0.5em; width: 100%;'>
	      <?php foreach($user_with_skill as $row) : ?>
	      <tr>
		    <?php $photo = $row['photo'];
		    echo "<td style='border-top: 1px solid #ddd;
			   border-left: 1px solid #ddd;
			   border-bottom: 1px solid #ddd;
			   border-radius: 10px 0 0 10px;
			   color: #ffffff;
			   font-size: 20px;'
			   bgcolor='#006a66'
			   align='center'>
			   <img src='$photo' alt='No Photo' height='42' width='50' style='margin: 5px 0;'>
		     </td>"; ?>
		<td style='border-top: 1px solid #ddd;
			   border-bottom: 1px solid #ddd;
			   color: #ffffff;
			   font-size: 20px;'
			   bgcolor='#006a66'
			   align='center'>
			   <?php echo $row['name']; ?>
		</td>
		<td style='border-top: 1px solid #ddd;
			   border-bottom: 1px solid #ddd;
			   color: #ffffff;
			   font-size: 20px;'
			   bgcolor='#006a66'
			   align='center'>
			   <?php echo $skill; ?>
		</td>
		<?php
		$checkval = intval($row['userID']);
		echo "<td style='border-top: 1px solid #ddd;
				 border-right: 1px solid #ddd;
				 border-bottom: 1px solid #ddd;
				 border-radius: 0 10px 10px 0;
				 color: #ffffff;
				 font-size: 20px;'
				 bgcolor='#006a66'
				 align='center'>
			<input type='checkbox' name='$checkval' value='$checkval' />
				Add
		      </td>";
		?>
	  </tr>
	  <?php endforeach;?>
	  </table>
	  </form>
    </div>

<?php }
else {
  header("Location: search_view.php");
  exit();
}
?>
