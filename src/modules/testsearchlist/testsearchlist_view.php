<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/25/18
 * Time: 2:08 AM
 */
session_start();

include("../../views/header.php");
?>

<script type="text/javascript">document.title += " Home"</script>

<body>
	<div class="container">
		<div class="container">
            <?php
            if(!is_null($_SESSION['errorMessage'])){
                $errorMessage = $_SESSION['errorMessage'];
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
			<div class="container">
				<p><h1>Search</h1></p>
				<form class="form-horizontal" id="testSearch" action="testsearchlist_controller.php" method="post">
					<input id="hidden" type='hidden' name = 'hidden' value="search_view">
					<input id="TestSearch" type="submit" name="test" value="Search" class="btn btn-primary" style="float:center;">
				</form>
			</div>
		</div>
	</div>
</body>


</html>

<script>
</script>
