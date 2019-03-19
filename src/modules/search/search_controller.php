<?php

require_once("search_model.php");

$_SESSION['errorMessage'] = null;

if(isset($_POST['user_skill'])) {
    $skill = $_POST['user_skill'];
    $user_with_skill = queryUserBySkill($skill);
    $_SESSION['search_results'] = $user_with_skill;
    // print_r($_SESSION['search_results']);
    // print_r($user_with_skill);
    #header("Location: search_view.php");
    header("Location: search_view.php");
}
else {
  header("Location: search_view.php");
  exit();
}

?>
