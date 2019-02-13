<?php
/**
 * Created by PhpStorm.
 * User: Nick Sladic
 * Date: 11/19/18
 * Time: 20:04
 */

require_once ("../../lib/Connector.php");
session_start();

/**
 * @function:       getAllUsers
 * @params:         NA
 * @return          array|Exception
 * @Description:    gets all users first name, last name, and email
 *
 */
function getAllUsers(){
    try{
        $base = Connector::getDatabase();
        $sql = "SELECT user.UID, user.first_name, user.last_name, user.email FROM user;";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;

    }catch(Exception $e){
        return $e;
    }
}


/**
 * @function:       getErrors
 * @params:         $name
 * @return          array|Exception
 * @Description:    gets all $name error files
 *
 */
function getErrors($name){
    try{
        $base = Connector::getDatabase();
        $sql = "SELECT features_available.name, features_available.id FROM features_available WHERE features_available.feature_group_name = '$name'";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;

    }catch(Exception $e){
        return $e;
    }
}

function getAssignedId($uid){
    try{
        $base = Connector::getDatabase();
        $sql = "SELECT assigned_features.id FROM assigned_features WHERE assigned_features.user_id = '$uid'";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }catch(Exception $e){
        return $e;
    }
}

function getAssignFeatures($uid){
    try{
        $base = Connector::getDatabase();
        $sql = "SELECT features_available.id, features_available.name, features_available.feature_group_name FROM features_available JOIN assigned_features ON features_available.id = assigned_features.feature_number WHERE assigned_features.user_id = '$uid'";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }catch(Exception $e){
        return $e;
    }
}

/**
 * @function:       setFeatures()
 * @params:         $uid - UID | $fid - id | $uid
 * @return          array|Exception
 * @Description:    sets the feature id assigned to the user
 *
 */
function setFeatures($uid,$fid,$aid){
    try{
        $base = Connector::getDatabase();
        $sql = "UPDATE assigned_features SET feature_number = '$fid' WHERE assigned_features.id = '$aid' AND assigned_features.user_id = '$uid';";
        $stmt = $base->prepare($sql);
        $stmt->execute();

    }catch(Exception $e){
        return $e;
    }
}