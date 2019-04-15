<?php
 if(!isset($_SESSION))
 {
     session_start();
 }

include("../../views/header.php");
?>

<div class="container">
	<div class="container">
        <?php
        if(!is_null($_SESSION['errorMessage'])){
            $errorMessage = $_SESSION['errorMessage'];
            $test = $_SESSION['softskills'][0];
            echo "
                <div class='alert alert-danger'>
                    $errorMessage
                </div>
            ";
            $_SESSION['errorMessage'] = null;
        }else{
            if(!is_null($_SESSION['success'])){
                $message = $_SESSION['success'];
                echo"
                    <div class='alert alert-success'>
                        $message
                    </div>
                ";
            }
            $_SESSION['success'] = null;
        }
        ?>
		<form class="form-horizontal" id="saveProfileForm" action="advanced_profile_controller.php" method="post" enctype="multipart/form-data">
			<h1 id="AdvInfoHead">Advanced Profile Information</h1>
			<hr>
			<h2 id="SkillExpInfoHead">Skill Experience</h2>
			<hr>
			<h3 id="AdvSoftInfoHead">Software Skills</h3>
			<table style='border-collapse:separate; border-spacing: 0 0.5em; width: 100%;'>
				<tr>
					<th style="width:25rem;">Skill</th>
					<th>Experience Level</th>
					<th>Years of Experience</th>
				</tr>
				<?php
					$advsoftskills = $_SESSION['advsoftskills'];
					foreach($advsoftskills as $advsoftskill){
						//Loop through list of skills
						$skill_id = $advsoftskill['UID'];
						$skill_name = $advsoftskill['skill'];
						$skill_exp = $advsoftskill['exp'];
						$skill_years = $advsoftskill['years'];
						echo "<tr>";
						echo "<td>$skill_name</td>";
						?>
						<td>
							<select class="form-control" style="width: 17rem;" name='soft_skill_level[]' id='soft_skill_level' disabled>
								<!-- Set default selection to database value -->
								<option value='N/A' <?php if($skill_exp == "N/A") echo "SELECTED";?>>N/A</option>
								<option value='Fundamental Awareness' <?php if($skill_exp == "Fundamental Awareness") echo "SELECTED";?>>Fundamental Awareness</option>
								<option value='Novice' <?php if($skill_exp == "Novice") echo "SELECTED";?>>Novice</option>
								<option value='Intermediate' <?php if($skill_exp == "Intermediate") echo "SELECTED";?>>Intermediate</option>
							 	<option value='Advanced' <?php if($skill_exp == "Advanced") echo "SELECTED";?>>Advanced</option>
								<option value='Expert' <?php if($skill_exp == "Expert") echo "SELECTED";?>>Expert</option>
							</select>
						</td>
						<?php
						//Set default value to database value
						echo "<td><input class='form-control' style='width: 6rem;' type='number' name='soft_skill_years[]' id='soft_skill_years' min='0' value='$skill_years' disabled required></td>";
						echo "</tr>";
					}
				?>
			</table>
			<h3 id="AdvHardInfoHead">Hardware Skills</h3>
			<table style='border-collapse:separate; border-spacing: 0 0.5em; width: 100%;'>
				<tr>
					<th  style="width:25rem;">Skill</th>
					<th>Experience Level</th>
					<th>Years of Experience</th>
				</tr>
				<?php
					$advhardskills = $_SESSION['advhardskills'];
					foreach($advhardskills as $advhardskill){
						//Loop through list of skills
						$skill_id = $advhardskill['UID'];
						$skill_name = $advhardskill['skill'];
						$skill_exp = $advhardskill['exp'];
						$skill_years = $advhardskill['years'];
						echo "<tr>";
						echo "<td>$skill_name</td>";
						?>
						<td>
							<select class="form-control" style="width: 17rem;" disabled name="hard_skill_level[]" id="hard_skill_level">
								<!-- Set default selection to database value -->
								  <option value='N/A' <?php if($skill_exp == "N/A") echo "SELECTED";?>>N/A</option>
								  <option value='Fundamental Awareness' <?php if($skill_exp == "Fundamental Awareness") echo "SELECTED";?>>Fundamental Awareness</option>
								  <option value='Novice' <?php if($skill_exp == "Novice") echo "SELECTED";?>>Novice</option>
								  <option value='Intermediate' <?php if($skill_exp == "Intermediate") echo "SELECTED";?>>Intermediate</option>
								  <option value='Advanced' <?php if($skill_exp == "Advanced") echo "SELECTED";?>>Advanced</option>
								  <option value='Expert' <?php if($skill_exp == "Expert") echo "SELECTED";?>>Expert</option>
							</select>
						</td>
						<?php
						//Set default value to database value
						echo "<td><input class='form-control' style='width: 6rem;' type='number' name='hard_skill_years[]' id='hard_skill_years' min='0' value='$skill_years' disabled required></td>";
						echo "</tr>";
					}
				?>
			</table>
			<hr>
			<h2 id="EduInfoHead">Education</h2>
			<hr>
			<h2 id="CertInfoHead">Certifications</h2>
			<hr>
			<h2 id="VertInfoHead">Previous Verticals</h2>
			<hr>
			<h2 id="PrevClientInfoHead">Previous Clients</h2>
			<hr>
			<div class="clearfix"></div>
				<br>
				<input id="SubmitAdvProfile" type="submit" name="Save" value="Save" class="btn btn-light" style="float:right;" <?php if(!$_SESSION['edit']){echo "disabled";}?>>
		</form>
				<form class="form-horizontal" id="editProfile" action="advanced_profile_controller.php" method="post" enctype="multipart/form-data">
					<input id="EditAdvProfile" type="submit" name="edit" value="Edit" class="btn btn-light" style="float:right;margin-right:5px;"<?php if($_SESSION['edit']){echo "disabled";}?>>
				</form>
			</div>
	</div>
</div>

<div style="padding-top:5rem;">
    </div>

<?php include("../../views/footer.php"); ?>

<script>
$("#EditAdvProfile").on('click', function() {
	document.getElementById("EditAdvProfile").disabled = true;
	document.getElementById("SubmitAdvProfile").disabled = false;
	ele = document.querySelectorAll('[id="soft_skill_level"]');
	for (i = 0; i < ele.length; i++){
		ele[i].disabled = false;
	}
	ele = document.querySelectorAll('[id="soft_skill_years"]');
	for (i = 0; i < ele.length; i++){
		ele[i].disabled = false;
	}
	ele = document.querySelectorAll('[id="hard_skill_level"]');
	for (i = 0; i < ele.length; i++){
		ele[i].disabled = false;
	}
	ele = document.querySelectorAll('[id="hard_skill_years"]');
	for (i = 0; i < ele.length; i++){
		ele[i].disabled = false;
	}
});
</script>
