<?php
require_once("compare_model.php");

?>
<?php

function showName($user)
{
	$result = getName($user);
	echo $result['first_name'] . " " .$result['last_name'];

}

function showPhoto($user, $show_photo)
{
	if ($show_photo)
	{
		$result = getPhoto($user);
		$photo = $result['photo'];
		echo "<img src='$photo' alt='No Photo' height='150rem'>";
	}
}

function showBasic($user, $show_basic)
{
	if ($show_basic)
	{
		$result = getBasic($user);
		echo "<div class='row'>";
			echo "<div class='col-sm-3'>";
				echo "<strong>Email: </strong><br>";
				echo "<strong>Gender: </strong><br>";
				echo "<strong>Location: </strong>";
			echo "</div>";
			echo "<div class='col-sm-9'>";
				echo $result['email']."<br>";
				echo $result['gender']."<br>";
				echo $result['city'] .", " .$result['state'];
			echo "</div>";
		echo "</div>";
	}
}

function showSoft($user, $show_soft, $searched_sskill, $max_skills_print = 100)
{
	$MAX_SKILLS_PRINT = $max_skills_print;
	$MAX_SKILLS_TOTAL = $max_skills_print;

	if ($show_soft)
	{
		if ($max_skills_print < 100) { echo "<strong>Top </strong>"; }
		echo "<strong>Software Skills:</strong><br>";

		if (!is_null($searched_sskill)) {
			echo "$searched_sskill <br>";
			$MAX_SKILLS_PRINT = $MAX_SKILLS_PRINT - 1;
		}

		$result = getSoft($user);
		if ($result) {
    		for ($i = 0; $i < sizeof($result) && $i < $MAX_SKILLS_PRINT; $i++) #REMOVED <=
        {
					$skill = $result[$i][0];
					if ($skill != $searched_sskill) {
          	echo $skill ."<br>";
					}
        }
        if (sizeof($result) >= $MAX_SKILLS_TOTAL) { echo "...";}
    }
	}
}

function showHard($user, $show_hard, $searched_hskill, $max_skills_print = 100)
{
	$MAX_SKILLS_PRINT = $max_skills_print;
	$MAX_SKILLS_TOTAL = $max_skills_print;

	if ($show_hard)
	{
		if ($max_skills_print < 100) { echo "<strong>Top </strong>"; }
		echo "<strong>Hardware Skills:</strong><br>";

		if (!is_null($searched_hskill)) {
			echo "$searched_hskill <br>";
			$MAX_SKILLS_PRINT = $MAX_SKILLS_PRINT - 1;
		}

		$result = getHard($user);
		if ($result)
		{
			for ($i = 0; $i < sizeof($result) && $i < $MAX_SKILLS_PRINT; $i++) #REMOVED <=
			{
				$skill = $result[$i][0];
				if ($skill != $searched_hskill) {
					echo $skill ."<br>";
				}
			}
			if (sizeof($result) >= $MAX_SKILLS_TOTAL) { echo "...";}
    }

	}
}

function isSoftSkill($searched_skill) {
	$result = in_software_skills($searched_skill);
	return $result;
}

function showExtendedHard($user){
	$result = getExtendedHard($user);

	echo "<table style = 'width:100%'>";
		echo "<tr>";
			echo "<th style='width: 22rem;'>Hardware Skills</th>";
			echo "<th style='width: 13rem;'>Years Experience</th>";
			echo "<th>Level</th>";
		echo "</tr>";
	for( $i=0; $i < sizeof($result); $i++)
	{
		echo "<tr>";
			echo "<td>".$result[$i]['skill']."</td>";
			echo "<td>".$result[$i]['years']."</td>";
			echo "<td>".$result[$i]['level']."</td>";
		echo "</tr>";
	}
	echo "</table>";
}

function showExtendedSoft($user){
        $result = getExtendedSoft($user);

        echo "<table style = 'width:100%'>";
                echo "<tr>";
                        echo "<th style='width: 22rem;'>Software Skills</th>";
                        echo "<th style='width: 13rem;'>Years Experience</th>";
                        echo "<th>Level</th>";
                echo "</tr>";
        for( $i=0; $i < sizeof($result); $i++)
        {
                echo "<tr>";
                        echo "<td>".$result[$i]['skill']."</td>";
                        echo "<td>".$result[$i]['years']."</td>";
                        echo "<td>".$result[$i]['level']."</td>";
                echo "</tr>";
        }
        echo "</table>";
}

function showUserInfo($user) {
	$result = getUserInfo($user);
	echo "<h4>".$result['first_name'] . " " .$result['last_name']."</h4>";
	echo "<div class='profile-modal'>";
		echo $result['email']."<br>";
		echo $result['address'].", ".$result['city'].", ".$result['state']." ".$result['zip'];
	echo "</div>";
	echo "<div class='profile-modal'>";
		echo "<div class='row'>";
			echo "<div class='col-sm-2'>";
				echo "<p><strong>Role: </strong></p>";
				echo "<p><strong>Gender: </strong></p>";
				echo "<p><strong>Birthday: </strong></p>";
			echo "</div>";
			echo "<div class='col-sm-10'>";
				echo "<p>".$result['role']."</p>";
				echo "<p>".$result['gender']."</p>";
				echo "<p>".$result['dateofbirth']."</p>";
			echo "</div>";
		echo "</div>";
	echo "</div>";
}

?>
