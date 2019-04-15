
<?php
require_once ("../../lib/Connector.php");

//Given a user ID, this function returns the first and last name of associated user
function getName($uid) {

	try {
		//Query the database
		$base = Connector::getDatabase();
		$sql = "SELECT first_name, last_name FROM user WHERE UID = '$uid';";
		$stmt = $base->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch();
		//Retrun an array with first_name and last_name
		return $result;
	} catch (Exception $e) {throw ($e);}
}

//Given a user ID, this function returns the photo of associated user
function getPhoto($uid) {
	try {
		//Query the database
		$base = Connector::getDatabase();
		$sql = "SELECT IFNULL(photo, '../../../assets/images/uploads/NoUpload.png') AS photo FROM user WHERE UID = '$uid';";
		$stmt = $base->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	} catch (Exception $e) {throw ($e);}
}

//Given a user ID, this function returns all the basic information for the user
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

//Given a user ID, this function returns all the software skills for the user
function getSoft($uid){
  	try {
  		$base = Connector::getDatabase();
  		$sql = "SELECT skill FROM user_software_skills AS uss
				  		JOIN software_skills AS ss
							ON uss.skill_id = ss.UID
							WHERE user_id = '$uid'
							ORDER BY ss.skill ASC, uss.years_of_experience DESC;"; 
  		$stmt = $base->prepare($sql);
  		$stmt->execute();
		$result = $stmt->fetchAll();
		//return software skills in an array in alaphabetical order
		return $result;
  	} catch (Exception $e)
		{
			throw ($e);
		}
}
//Given a user ID, this function returns all the hardware skills for the user
function getHard($uid){
  try {
			$base = Connector::getDatabase();
      $sql = "SELECT skill FROM user_hardware_skills
						  JOIN hardware_skills
							ON user_hardware_skills.skill_id = hardware_skills.UID
							WHERE user_id = '$uid'
							ORDER BY hardware_skills.skill ASC, user_hardware_skills.years_of_experience DESC;";
      $stmt = $base->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      //return hardware skills in an array in alaphabetical
	return $result;
    } catch (Exception $e) {
				throw ($e);
		}
}

//Given a user ID< this function returns all the hardware skills, years of experience, and experience level
//Given a user ID, this function returns all the hardware skills for the user
function getExtendedHard($uid){
  try {
                        $base = Connector::getDatabase();
      $sql = "SELECT skill, years_of_experience as years, skill_level as level FROM user_hardware_skills
                                                  JOIN hardware_skills
                                                        ON user_hardware_skills.skill_id = hardware_skills.UID
                                                        WHERE user_id = '$uid'
                                                        ORDER BY hardware_skills.skill ASC, user_hardware_skills.years_of_experience DESC;";
      $stmt = $base->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      //return hardware skills in an array in alaphabetical
        return $result;
    } catch (Exception $e) {
                                throw ($e);
                }
}

//Given a user ID this function returns all the software skills, years of experience, and experience level
function getExtendedSoft($uid){
  try {
                        $base = Connector::getDatabase();
      $sql = "SELECT skill, years_of_experience as years, skill_level as level FROM user_software_skills
                                                  JOIN software_skills
                                                        ON user_software_skills.skill_id = software_skills.UID
                                                        WHERE user_id = '$uid'
                                                        ORDER BY software_skills.skill ASC, user_software_skills.years_of_experience DESC;";
      $stmt = $base->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      //return hardware skills in an array in alaphabetical
        return $result;
    } catch (Exception $e) {
                                throw ($e);
                }
}

//Given a searched skill, this function returns the User ID of all users with that searched skill
function in_software_skills($searched_skill) {
	try {
			$base = Connector::getDatabase();
      $sql = "SELECT UID FROM software_skills
							WHERE skill = '$searched_skill';";
      $stmt = $base->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
	return $result;
    } catch (Exception $e) {
				throw ($e);
		}
}

//Given a User ID, this function returns information about that user
function getUserInfo($uid) {
	try {
    $base = Connector::getDatabase();
    $sql = "SELECT first_name, last_name, email, role, gender, dateofbirth, address, city, state, zip
					  FROM user WHERE UID = '$uid';";
  	$stmt = $base->prepare($sql);
 		$stmt->execute();
		$result = $stmt->fetch();
  	return $result;
	} catch (Exception $e)
	{
		throw ($e);
	}
}

?>
