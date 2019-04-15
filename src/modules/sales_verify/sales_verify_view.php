<?php
/**
 * Created by GLAS1.
 * User: sara
 * Date: 14/2/19
 * Time: 1:55 PM
 */
include("../../views/header.php");
?>
	<div class="container">
  		<div class="container">
    		<h1 id="SearchHead">New User Verification</h1>

    		<?php
      			if($_SESSION['role'] != "ADMIN" && $_SESSION['role'] != "SUPERADMIN" )
      			{
        			echo "<h3> Login as an Administrator to access this page </h3></div></div>";}
        		else{
    		?>
    	</div>
	</div>
	<form action="sales_verify_controller.php" method ="post" >
		<div class="container" style="height: 50%; overflow-y: auto;">
			<table style='border-collapse:separate; border-spacing: 0 0.5em; width: 100%;'>
			<?php
				$users = $_SESSION['users'];
				if($users){
					foreach($users as $row) :
						$UID = $row['UID'];
			?>
			<tr>
				<td id="sr_col1">
				   <?php
				   	$UID = $row["UID"];
					echo "<input type='checkbox' name='selected_verify[]' id='$UID' value='$UID' />";
					?>
				</td>
				<td id="sr_col2">
					<?php
						echo $row["first_name"]." ";
						echo $row["last_name"];
					?>
				</td>
				<td id="sr_col3">
				   <?php echo $row["role"]; ?>
				</td>
				<td id="sr_col4">
				   <?php echo $row["email"]; ?>
				</td>
			</tr>
			<?php endforeach;}?>
			</table>
			<button bgcolor='#7f62d0' class="btn btn-outline-secondary float-right my-2 my-sm-0" type="submit" name="verify">Verify</button>
			<button bgcolor='#7f62d0' style="margin-right: 10px;" class="btn btn-outline-secondary float-right my-2 my-sm-0" type="submit" name="remove">Deny</button>
		</div>
	</form>
	<?php }?>
<?php include("../../views/footer.php");?>
