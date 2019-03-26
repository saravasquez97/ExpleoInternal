<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/25/18
 * Time: 2:08 AM
 */

require_once ("../../lib/Connector.php");


session_start();



/**
 * gets all user data
 * @param  none
 * @return data
 */
function getData(){

    $base = Connector::getDatabase();

    $uid = $_SESSION['uid'];

    $sql = "SELECT * FROM user WHERE uid = '$uid';";

    $stmt = $base->prepare($sql);

    $stmt->execute();

    return $stmt->fetch();

}

/**
 * gets all phone data
 * @param  none
 * @return data
 */

function getPhones(){
    $base = Connector::getDatabase();

    $uid = $_SESSION['uid'];

    $sql = "SELECT phone_number FROM phone_list WHERE user_id = '$uid' LIMIT 4;";

    $stmt = $base->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll();

}

/**
 * deletes number
 * @param  none
 * @return T/F
 */

function deleteNumber($number){
    $base = Connector::getDatabase();

    $sql = "DELETE FROM phone_list WHERE phone_number = '$number';";

    $stmt = $base->prepare($sql);

    $stmt->execute();
}

/**
 * updates user info
 * @param  none
 * @return T/F
 */

function updateUser($post){

    $base = Connector::getDatabase();

    $uid = $_SESSION['uid'];

    $first = $post['first_name'];
    $last = $post['last_name'];
    $gender = $post['gender'];
    $dob = $post['dob'];
    $address = $post['address'];
    $city = $post['city'];
    $state = $post['state'];
    $zip = $post['zip'];

    $sql = "UPDATE user 
            SET first_name = '$first', 
                last_name = '$last', 
                gender = '$gender',
                dateofbirth = '$dob',
                address = '$address',
                city = '$city',
                state = '$state',
                zip = '$zip'
            WHERE uid = '$uid'";

    $stmt = $base->prepare($sql);

    return $stmt->execute();
}

function deleteSkills(){
    $base = Connector::getDatabase();

    $uid = $_SESSION['uid'];

    $sql = "DELETE FROM user_software_skills WHERE user_id = '$uid'";
    $sql2 = "DELETE FROM user_hardware_skills WHERE user_id = '$uid'";

    $stmt = $base->prepare($sql);
    $stmt->execute();

    $stmt2 = $base->prepare($sql2);
    $stmt2->execute();
}

function updateSkills($post){
    $base = Connector::getDatabase();

    $uid = $_SESSION['uid'];


    deleteSkills();

    $software_skills = $post['softwareSkills'];
    $hardware_skills = $post['hardwareSkills'];


    foreach($software_skills as $software_skill){
        $sql = "INSERT INTO user_software_skills (skill_id, user_id) 
                VALUES ('$software_skill', '$uid')";
        $stmt = $base->prepare($sql);
        $stmt->execute();
    }

    foreach($hardware_skills as $hardware_skill){
        $sql = "INSERT INTO user_hardware_skills (skill_id, user_id) 
                VALUES ('$hardware_skill', '$uid')";
        $stmt = $base->prepare($sql);
        $stmt->execute();
    }    

}


/**
 * gets user's group name
 * @param  none
 * @return group name
 */
function getGroupName(){
    $base = Connector::getDatabase();

    $uid = $_SESSION['uid'];

    $sql = "SELECT name FROM groups WHERE UID = '$uid';";

    $stmt = $base->prepare($sql);

    $stmt->execute();

    return $stmt->fetch();
}

function getSoftSkills(){
    $base = Connector::getDatabase();

    $uid = $_SESSION['uid'];

    $sql = "SELECT S.UID, skill 
            FROM (user_software_skills as U JOIN software_skills as S ON U.skill_id = S.UID) 
            WHERE user_id = '$uid';";

    $stmt = $base->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll();
}

function getHardSkills(){
    $base = Connector::getDatabase();

    $uid = $_SESSION['uid'];

    $sql = "SELECT S.UID, skill 
            FROM (user_hardware_skills as U JOIN hardware_skills as S ON U.skill_id = S.UID) 
            WHERE user_id = '$uid';";

    $stmt = $base->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll();
}

function getSoftBank(){
    $base = Connector::getDatabase();

    $uid = $_SESSION['uid'];

    $sql = "SELECT UID, skill FROM software_skills
            WHERE skill NOT IN (SELECT skill 
            FROM (user_software_skills as U JOIN software_skills as S ON U.skill_id = S.UID) 
            WHERE user_id = '$uid');";

    $stmt = $base->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll();
}

function getHardBank(){
    $base = Connector::getDatabase();

    $uid = $_SESSION['uid'];

    $sql = "SELECT UID, skill FROM hardware_skills
            WHERE skill NOT IN (SELECT skill 
            FROM (user_hardware_skills as U JOIN hardware_skills as S ON U.skill_id = S.UID) 
            WHERE user_id = '$uid');";

    $stmt = $base->prepare($sql);

    $stmt->execute();

    return $stmt->fetchAll();
}