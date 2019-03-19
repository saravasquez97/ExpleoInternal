<?php

require_once ("../../lib/Connector.php");

session_start();

function queryUserBySkill($skill) {
  try {
    $base = Connector::getDatabase();

    $sql = "SELECT u.UID, CONCAT(u.first_name,' ',u.last_name) AS name,
			  IFNULL(user.photo, '../../../assets/images/uploads/NoUpload.png') AS photo
	 		  FROM user AS u WHERE u.UID IN
              (SELECT uss.user_id FROM
                user_software_skills AS uss JOIN software_skills AS ss
                ON (uss.skill_id = ss.UID AND ss.skill = :skill));";

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

?>
