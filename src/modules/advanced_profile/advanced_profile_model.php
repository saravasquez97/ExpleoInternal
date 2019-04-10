<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/25/18
 * Time: 2:08 AM
 */

require_once ("../../lib/Connector.php");

if(!isset($_SESSION))
{
    session_start();
}

function getAdvSoftSkills(){
    $base = Connector::getDatabase();

    $uid = $_SESSION['uid'];

    $sql = "SELECT S.UID as UID, S.skill as skill, U.skill_level as exp, U.years_of_experience as years
            FROM (user_software_skills as U JOIN software_skills as S ON U.skill_id = S.UID)
            WHERE user_id = '$uid';";

    $stmt = $base->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll();
}

function getAdvHardSkills(){
    $base = Connector::getDatabase();

    $uid = $_SESSION['uid'];

    $sql = "SELECT S.UID as UID, S.skill as skill, U.skill_level as exp, U.years_of_experience as years
            FROM (user_hardware_skills as U JOIN hardware_skills as S ON U.skill_id = S.UID)
            WHERE user_id = '$uid';";

    $stmt = $base->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll();
}

function updateSkills($post){
    $base = Connector::getDatabase();

    $uid = $_SESSION['uid'];

	$software_skills = $_SESSION['advsoftskills'];
	$hardware_skills = $_SESSION['advhardskills'];
	$software_skills_level = $post['soft_skill_level'];
    $hardware_skills_level = $post['hard_skill_level'];
    $software_skills_years = $post['soft_skill_years'];
    $hardware_skills_years = $post['hard_skill_years'];

	for ($i = 0; $i < count($software_skills); $i++){
		$softskill = $software_skills[$i];
		$skill_id = $softskill['UID'];
		$sql = "UPDATE user_software_skills
				SET skill_level = '$software_skills_level[$i]', years_of_experience = '$software_skills_years[$i]'
				WHERE skill_id = $skill_id AND user_id = $uid";
		echo "$sql";
        $stmt = $base->prepare($sql);
        $stmt->execute();
	}

    for ($i = 0; $i < count($hardware_skills); $i++){
		$hardskill = $hardware_skills[$i];
		$skill_id = $hardskill['UID'];
        $sql = "UPDATE user_hardware_skills
				SET skill_level = '$hardware_skills_level[$i]', years_of_experience = '$hardware_skills_years[$i]'
				WHERE skill_id = $skill_id AND user_id = $uid";
		echo "$sql";
        $stmt = $base->prepare($sql);
        $stmt->execute();
    }
}
