<?php

require_once ("../../lib/Connector.php");

if(!isset($_SESSION))
{
    session_start();
}

function queryUserBySkill($skill) {
  try {
    $base = Connector::getDatabase();

	$sql = "SELECT u.UID AS userID, CONCAT(u.first_name,' ',u.last_name) AS name,
				IFNULL(u.photo, '../../../assets/images/uploads/NoUpload.png') AS photo,
				s_tbl.skill_exp as skill_exp,
				s_tbl.skill_years as skill_years
		 		FROM user AS u,
	            (SELECT uss.user_id as user_id, uss.skill_level as skill_exp, uss.years_of_experience as skill_years FROM
	            	user_software_skills AS uss JOIN software_skills AS ss
	            	ON (uss.skill_id = ss.UID AND ss.skill = :skill)
				UNION
	            SELECT uhs.user_id as user_id, uhs.skill_level as skill_exp, uhs.years_of_experience as skill_years FROM
	            	user_hardware_skills AS uhs JOIN hardware_skills AS hs
	            	ON (uhs.skill_id = hs.UID AND hs.skill = :skill)
	            ) AS s_tbl
				WHERE u.UID = s_tbl.user_ID
				ORDER BY skill_years DESC;";

    $stmt = $base->prepare($sql);
    $stmt->bindParam(':skill',$skill,PDO::PARAM_STR);
    $stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;

  } catch (Exception $e) {
    throw ($e);
  }
}

function getSkillList() {
  try {
    $base = Connector::getDatabase();

	//Select users from databsae that fit search criteria
    $sql = "(SELECT skill FROM software_skills) UNION (SELECT skill FROM hardware_skills)";

    $stmt = $base->prepare($sql);
    $stmt->bindParam(':skill',$skill,PDO::PARAM_STR);
    $stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;

  } catch (Exception $e) {
    throw ($e);
  }
}

?>
