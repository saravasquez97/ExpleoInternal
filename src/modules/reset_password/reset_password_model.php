<?php
/**
 * Created by PhpStorm.
 * User: ConnorKunstek
 * Date: 12/2/18
 * Time: 6:26 PM
 */

require_once ("../../lib/Connector.php");

if(!isset($_SESSION))
{
    session_start();
}

function change($uid, $temp){

    $base = Connector::getDatabase();

    $sql = "UPDATE user
            SET password = '$temp'
            WHERE uid = '$uid'";

    $stmt = $base->prepare($sql);

    return $stmt->execute();
}


/**
 * gets user's group name
 * @param  none
 * @return group name
 */
function check($email)
{
    $base = Connector::getDatabase();

    $sql = "SELECT UID FROM user WHERE email = '$email';";

    $stmt = $base->prepare($sql);

    $stmt->execute();

    return $stmt->fetch();
}
