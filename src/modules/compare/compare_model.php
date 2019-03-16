
<?php
require_once ("../../lib/Connector.php");

function showName($uid) {

	try {	
		$base = Connector::getDatabase();	
		$sql = "SELECT first_name, last_name FROM user WHERE UID = '$uid';";
		$stmt = $base->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch();
		echo $result[first_name] . " " .$result[last_name];
	}
	catch (Exception $e) {throw ($e);}
}

function showBasic($uid, $show_basic){
	if($show_basic)
	{
	        try {
                $base = Connector::getDatabase();
                $sql = "SELECT email, gender, city, state FROM user WHERE UID = '$uid';";
                $stmt = $base->prepare($sql);
                $stmt->execute();
		$result = $stmt->fetch();
		echo "Basic Information:<br>";
		echo "Email: " .$result[email] ."<br>"; 
		echo "Gender: " .$result[gender] ."<br>" ; 
		echo "Location: " .$result[city] .", " .$result[state]; 
        }
        catch (Exception $e) {throw ($e);}
	
	}
}

//showBasic(4, true);
function showSoft($uid, $show_soft){
        if($show_soft)
        {
                try {
                $base = Connector::getDatabase();
                $sql = "SELECT skill FROM user_software_skills join software_skills ON user_software_skills.skill_id = software_skills.UID WHERE user_id = '$uid';";
                $stmt = $base->prepare($sql);
                $stmt->execute();
		$result = $stmt->fetchAll();
		echo "Software Skills:<br>";
		for ($i = 0; $i <= sizeof($result); $i++)
		{
			echo $result[$i][0] ."<br>";
		}
        }
        catch (Exception $e) {throw ($e);}

        }
}

function showHard($uid, $show_hard){
        if($show_hard)
        {
                try {
		$base = Connector::getDatabase();
			
                $sql = "SELECT skill FROM user_hardware_skills join hardware_skills ON user_hardware_skills.skill_id = hardware_skills.UID WHERE user_id = '$uid';";
                $stmt = $base->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();
                echo "Hardware Skills:<br>";
                for ($i = 0; $i <= sizeof($result); $i++)
                {
                        echo $result[$i][0] ."<br>";
                }
        }
        catch (Exception $e) {throw ($e);}

        }
}
//showHard(6, true);
?>

