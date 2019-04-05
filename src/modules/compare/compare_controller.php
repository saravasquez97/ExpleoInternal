<?php
include("compare_model.php");

function showName($user)
{
	$result = getName($user);
	echo $result['first_name'] . " " .$result['last_name'];
}

function showBasic($user, $show_basic)
{
	if($show_basic)
	{
		$result = getBasic($user);
		 echo "<hr>";
                 echo "<strong>Email:</strong> " .$result['email'] ."<br>";
                 echo "<strong>Gender:</strong> " .$result['gender'] ."<br>" ;
                 echo "<strong>Location:</strong> " .$result['city'] .", " .$result['state'];
	}
}

function showSoft($user, $show_soft)
{
	if($show_soft)
	{
		$result = getSoft($user);
		if ($result) {
                                $MAX_SKILLS_LIST = 5;
                                echo "<hr>";
                                echo "<strong>Top Software Skills:</strong><br>";
                                for ($i = 0; $i < sizeof($result) && $i < $MAX_SKILLS_LIST; $i++) #REMOVED <=
                                {
                                        echo $result[$i][0] ."<br>";
                                }
                                if (sizeof($result) >= $MAX_SKILLS_LIST) { echo "...";}
                       }
	}
}

function showHard($user, $show_hard)
{
	if($show_hard)
	{
		$result = getHard($user);
		if ($result) 
		{
			$MAX_SKILLS_LIST = 5;
                        echo "<hr>";
			echo "<strong>Top Hardware Skills:</strong><br>";
			for ($i = 0; $i < sizeof($result) && $i < $MAX_SKILLS_LIST; $i++) #REMOVED <=
			{
				echo $result[$i][0] ."<br>";
			}
			if (sizeof($result) >= $MAX_SKILLS_LIST) { echo "...";}
                }

	}
}

?>
