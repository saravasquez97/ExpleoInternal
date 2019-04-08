
<?php
require_once ("../../lib/Connector.php");

function getName($uid) {

	try {
		$base = Connector::getDatabase();
		$sql = "SELECT first_name, last_name FROM user WHERE UID = '$uid';";
		$stmt = $base->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch();
		//echo $result['first_name'] . " " .$result['last_name'];
		return $result;
	}
	catch (Exception $e) {throw ($e);}
}

function getPhoto($uid) {

	try {
		$base = Connector::getDatabase();
		$sql = "SELECT IFNULL(photo, '../../../assets/images/uploads/NoUpload.png') AS photo FROM user WHERE UID = '$uid';";
		$stmt = $base->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	catch (Exception $e) {throw ($e);}
}

function getBasic($uid){

	try {
    		$base = Connector::getDatabase();
      	$sql = "SELECT email, gender, city, state FROM user WHERE UID = '$uid';";

      	$stmt = $base->prepare($sql);
     		$stmt->execute();
				$result = $stmt->fetch();
      	return $result;
	} catch (Exception $e)
	{
		throw ($e);
	}

}

function getSoft($uid){
  	try {
  		$base = Connector::getDatabase();
  		$sql = "SELECT skill FROM user_software_skills AS uss
				  		JOIN software_skills AS ss
							ON uss.skill_id = ss.UID
							WHERE user_id = '$uid'
							ORDER BY skill ASC;"; #We can change the order later, maybe sort by skill ranking

  		$stmt = $base->prepare($sql);
  		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
		//	if ($result) {
		//		$MAX_SKILLS_LIST = 5;
		//		echo "<hr>";
		//		echo "<strong>Top Software Skills:</strong><br>";
		//		for ($i = 0; $i < sizeof($result) && $i < $MAX_SKILLS_LIST; $i++) #REMOVED <=
		//		{
		//			echo $result[$i][0] ."<br>";
		//		}
		//		if (sizeof($result) >= $MAX_SKILLS_LIST) { echo "...";}
		//	}
  	} catch (Exception $e) {
				throw ($e);}
}

function getHard($uid){
  try {
			$base = Connector::getDatabase();
      $sql = "SELECT skill FROM user_hardware_skills
						  JOIN hardware_skills
							ON user_hardware_skills.skill_id = hardware_skills.UID
							WHERE user_id = '$uid'
							ORDER BY skill ASC;";

      $stmt = $base->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
	return $result;
		//	if ($result) {
		//		$MAX_SKILLS_LIST = 5;
		//		echo "<hr>";
      //  echo "<strong>Top Hardware Skills:</strong><br>";
       // for ($i = 0; $i < sizeof($result) && $i < $MAX_SKILLS_LIST; $i++) #REMOVED <=
       // {
        //	echo $result[$i][0] ."<br>";
       // }
	//			if (sizeof($result) >= $MAX_SKILLS_LIST) { echo "...";}
	//		}
    } catch (Exception $e) {
				throw ($e);
			}

}
//showHard(6, true);
?>
