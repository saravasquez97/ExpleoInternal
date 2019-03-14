<?php
function Create_Cards(){
	//get user ids
	$uid = [1,2,3,4,5];
	
	//put cards in overall container and start list for cards	
	?> <div class = "container"> 
		<u1 class="list-inline"> <?php
	
	//make card for every user id
	for( $i = 0; $i < count($uid); $i++)
	{
		?> <li class = "list-inline-item"> <?php
		IndividualCard($uid[$i]);
		?> </li> <?php
	}	
	?> </div> <?php
}

function IndividualCard($user) {
	?>
        <div class="card" style="width: 22rem;">
	<!---<img class="card-img-top" src=".../100px180/" alt="Card image cap">-->
                <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <!---<a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
        </div>


<?php
}
?>	
