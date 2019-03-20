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
