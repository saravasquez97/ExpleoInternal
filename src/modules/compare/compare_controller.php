<?php
include("compare_model.php");

/*
function individualCard($user) {

	//set booleans for display to be true
	//change later for added functionality of hiding sections
	$show_name = true;
	$show_pic = true;
	$show_basic = true;
	$show_soft = true;
	$show_hard = true;
?>

<div class="card" style="width: 22rem;">
	<!---<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
		<div class="card-body">
			<h5 class="card-title"> <?php echo showName($user); ?></h5>
			<p class="card-text"><?php echo showBasic($user, $show_basic);?></p>
			<p class="cared-text"><?php echo showSoft($user, $show_soft);?></p>
			<p class="cared-text"><?php echo showHard($user, $show_hard);?></p>
			<!---<a href="#" class="btn btn-primary">Go somewhere</a>-->
    </div>
</div>

 */
?>
<?php


function showName($user)
{
	$result = getName($user);
	echo $result['first_name'] . " " .$result['last_name'];
}

function showPhoto($user, $show_photo)
{
	if($show_photo)
	{
		$result = getPhoto($user);
		#echo "hello";
		$photo = $result['photo'];
		echo "<img src='$photo' alt='No Photo' height='150rem'>";
	}
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
		echo "<hr>";
		echo "<strong>Top Software Skills:</strong><br>";
		$result = getSoft($user);
		if ($result) {
        $MAX_SKILLS_LIST = 5;
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
		echo "<hr>";
		echo "<strong>Top Hardware Skills:</strong><br>";
		$result = getHard($user);
		if ($result)
		{
			$MAX_SKILLS_LIST = 5;
			for ($i = 0; $i < sizeof($result) && $i < $MAX_SKILLS_LIST; $i++) #REMOVED <=
			{
				echo $result[$i][0] ."<br>";
			}
			if (sizeof($result) >= $MAX_SKILLS_LIST) { echo "...";}
    }

	}
}
?>
