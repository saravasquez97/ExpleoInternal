<?php

require_once ("../../lib/Connector.php");

if(!isset($_SESSION))
{
    session_start();
}

function queryUserBySkill($skill) {
  try {
    $base = Connector::getDatabase();

	//Select users from databsae that fit search criteria
    $sql = "SELECT u.UID AS userID, CONCAT(u.first_name,' ',u.last_name) AS name,
			  IFNULL(u.photo, '../../../assets/images/uploads/NoUpload.png') AS photo
	 		  FROM user AS u WHERE u.UID IN
              (SELECT uss.user_id FROM
                user_software_skills AS uss JOIN software_skills AS ss
                ON (uss.skill_id = ss.UID AND ss.skill = :skill)
               UNION
               SELECT uhs.user_id FROM
                user_hardware_skills AS uhs JOIN hardware_skills AS hs
                ON (uhs.skill_id = hs.UID AND hs.skill = :skill)
              );";

    $stmt = $base->prepare($sql);
    $stmt->bindParam(':skill',$skill,PDO::PARAM_STR);
    $stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;

    // $rows = [];
    // $i = 0;
    // foreach($stmt as $row){
    //   $rows[$i] = array($row['UID'],$row['name'],$skill,$row['photo']);
    //   $i++;
    // }
	//
    // if(!empty($rows)){
    //   return $rows;
    // }
    // else {
    //   return null;
    // }

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
