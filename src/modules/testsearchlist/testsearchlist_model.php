<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/25/18
 * Time: 2:08 AM
 */
error_reporting(E_ALL);
require_once ("../../lib/Connector.php");

session_start();

function testSearch(){

    try{
        $base = Connector::getDatabase();

        $sql = "SELECT DISTINCT user.UID AS UserID,
				IFNULL(user.photo, '../../../assets/images/uploads/NoUpload.png') AS Photo,
								CONCAT(user.first_name, ' ', user.last_name) AS Name,
								software_skills.skill AS Skill
				FROM user, user_software_skills, software_skills
				WHERE user.UID = user_software_skills.user_id AND software_skills.UID = user_software_skills.skill_id
				AND software_skills.skill = 'Ruby'";
        $stmt = $base->prepare($sql);
        /*$stmt->execute();
        $result = $stmt->fetchAll();*/
        return $stmt;
    }catch(Exception $e){
        return $e;
    }
}
