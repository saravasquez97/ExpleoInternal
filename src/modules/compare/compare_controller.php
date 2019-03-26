<?php
include("compare_model.php");

function Create_Cards($uid){
	//get user ids


	//put cards in overall container and start list for cards
	?> <div class="container horizontal-scroll">
			<div class="row">
				<u1 class="list-inline"> <?php

				//make card for every user id
				for( $i = 0; $i < count($uid); $i++)
				{
					?>
					<li class = "list-inline-item">
						<?php individualCard($uid[$i]); ?>
					</li>
					<?php
				}
	?> </div>
		</div> <?php
}

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


<?php
}
?>
