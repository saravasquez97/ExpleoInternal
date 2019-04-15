<?php
/**
 * Created by PhpStorm.
 * User: luke
 * Date: 10/24/18
 * Time: 7:48 PM
 */

require_once ("../../lib/Connector.php");

if(!isset($_SESSION))
{
    session_start();
}

function verifyUserInfo($data) {

    try {
        $base = Connector::getDatabase();

        $email = $data['email'];
        $password = $data['password'];

        $sql = "SELECT password FROM user WHERE email = '$email';";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        if($result = $stmt->fetch()) {
            if ($result['password'] == $password) {
                $sql = "SELECT UID, first_name, last_name, verified, role FROM user WHERE email = '$email';";
                $stmt = $base->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
                // write a verified check after implementation
            } else {
                return errorModel('password');
            }
        }
        else{
            return errorModel("email");
        }
    } catch (Exception $e) {
        throw ($e);
    }
}

function errorModel($var) {
    if ($var == 'password') {
        $message = "Invalid password! Please try again.";
    }else{
        $message = "This email does not exist! There is a chance that your account creation has been rejected by an administrator. Please try again, and contact an adminstrator if you continue to have problems logging in. ";
    }
    return $message;
}
?>
