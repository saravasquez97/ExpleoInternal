<?php
    include('../../views/header.php');
    include("compare_controller.php");
    if(!isset($_SESSION))
    {
        session_start();
    }
?>


<div class="container">
<h2 id="CompareHead">Employee Comparison</h2>

<?php  if($_SESSION['role'] != "SALES" && $_SESSION['role'] != "ADMIN" && $_SESSION['role'] != "SUPERADMIN" ){
echo "<h3> Login as a Sales Representative or Administrator to access this page </h3></div>";}
else{
?>
<hr>
</div>

<?php

if(isset($_POST['compare']))
{
  	if (isset($_POST['selected_compare']))
  	{
		$user_ids = $_POST['selected_compare'];
		Create_Cards($user_ids);
  	}
  	else
  	{echo "<div class='container'><h3> Error: No users selected on Employee Search page. </h3></div>";}
}


else {
  echo "<div class='container'><h3> Error: No users selected on Employee Search Page </h3></div>";
}
}

function Create_Cards($uid){
        //get user ids


        //put cards in overall container and start list for cards
        ?> <div class="container horizontal-scroll" id = "allcards">
                        <div class="row" id = "alldemcards">
                                <u1 class="list-inline"> <?php

                                //make card for every user id
                                for( $i = 0; $i < count($uid); $i++)
                                {
						
					$card_id = "user_card".$uid[$i]."child";
					$card_location = "user_card".$uid[$i]."parent";
					?>
						<li class = "list-inline-item" id = '<?php echo $card_location; ?>'>
					<div class="card" style="width: 22rem;" id = '<?php echo $card_id; ?>'>
                                                	<?php individualCard($uid[$i]); ?>
						</div>
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
	$card_pass = "user_card".$user;
?>

                <div class="card-body">
			<h5 class="card-title"> <?php echo showName($user); ?>		
	<button type="submit"  class="close" onclick = closeuser('<?php echo $card_pass; ?>') >&times;</span></button>
			</h5>
                        <p class="card-text"><?php echo showBasic($user, $show_basic);?></p>
                        <p class="cared-text"><?php echo showSoft($user, $show_soft);?></p>
                        <p class="cared-text"><?php echo showHard($user, $show_hard);?></p>
                        <!---<a href="#" class="btn btn-primary">Go somewhere</a>-->

		</div>

<script>
function closeuser(user) {
	var parent = document.getElementById(user + "parent");
	var child = document.getElementById(user+ "child");
	parent.removeChild(child);
  	
}
</script>

<?php
}
	include('../../views/footer.php');
?>
