
<?php
require_once ("../../lib/Connector.php");

function showName($uid) {

	try {
		$base = Connector::getDatabase();
		$sql = "SELECT first_name, last_name FROM user WHERE UID = '$uid';";
		$stmt = $base->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch();
		echo $result['first_name'] . " " .$result['last_name'];
	}
	catch (Exception $e) {throw ($e);}
}

function showBasic($uid, $show_basic){
	if($show_basic) {
		try {
    	$base = Connector::getDatabase();
      $sql = "SELECT email, gender, city, state FROM user WHERE UID = '$uid';";

      $stmt = $base->prepare($sql);
      $stmt->execute();
			$result = $stmt->fetch();
			echo "<hr>";
			echo "<strong>Email:</strong> " .$result['email'] ."<br>";
			echo "<strong>Gender:</strong> " .$result['gender'] ."<br>" ;
			echo "<strong>Location:</strong> " .$result['city'] .", " .$result['state'];
    } catch (Exception $e) {
				throw ($e);
			}
	}
}

//showBasic(4, true);
function showSoft($uid, $show_soft){
	if($show_soft) {
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
  	} catch (Exception $e) {
				throw ($e);
			}
    }
}

function showHard($uid, $show_hard){
	if($show_hard) {
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

			if ($result) {
				$MAX_SKILLS_LIST = 5;
				echo "<hr>";
        echo "<strong>Top Hardware Skills:</strong><br>";
        for ($i = 0; $i < sizeof($result) && $i < $MAX_SKILLS_LIST; $i++) #REMOVED <=
        {
        	echo $result[$i][0] ."<br>";
        }
				if (sizeof($result) >= $MAX_SKILLS_LIST) { echo "...";}
			}
    } catch (Exception $e) {
				throw ($e);
			}
		}
}
//showHard(6, true);
?>
