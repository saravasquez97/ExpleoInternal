<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/25/18
 * Time: 2:08 AM
 */

require_once("testsearchlist_model.php");
session_start();

if(!isset($_POST['hidden'])){
    include("testsearchlist_view.php");
    include("../../views/footer.php");
    exit();
}else{
	include("testsearchlist_view.php");
	$output = testSearch();?>
	<div class="container">
	<hr>
	<form class="form-horizontal" id="testResults" action="testsearchlist_controller.php" method="post">
	<div class="container" style='display:flex;'>
	<h1>Search Results</h1>
	<input id="TestCompare" type="submit" name="compare" value="Compare" class="btn btn-primary" style="margin-left: auto;">
	</div>
	<table style='border-collapse:separate; border-spacing: 0 0.5em; width: 100%;'>
	<?php $output->execute();
	foreach($output->fetchAll(PDO::FETCH_ASSOC) as $row) : ?>
	<tr>
		<?php $photo = $row['Photo'];
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
			   <?php echo $row['Name']; ?>
		</td>
		<td style='border-top: 1px solid #ddd;
			   border-bottom: 1px solid #ddd;
			   color: #ffffff;
			   font-size: 20px;'
			   bgcolor='#006a66'
			   align='center'>
			   <?php echo $row['Skill']; ?>
		</td>
		<?php
		$checkval = intval($row['UserID']);
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
	<?php endforeach; ?>
	</table>
	</form>
	</div>
<?php	include("../../views/footer.php");
    	exit();
}
?>
