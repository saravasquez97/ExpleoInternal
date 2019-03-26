<?php
/**
 * Created by PhpStorm.
 * User: Nick
 * Date: 10/25/18
 * Time: 12:05 PM
 */


require_once ("../../lib/Connector.php");

if(!isset($_SESSION))
{
    session_start();
}

/**
 * @function:       getGroups
 * @params:         NA
 * @return          array|Exception
 * @Description:    retrieves all the current groups in the database
 *
 */

function getGroups(){
    try{
        $base = Connector::getDatabase();
        $sql = "SELECT * FROM groups";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;

    }catch(Exception $e){
        return $e;
    }
}

/**
 * @function:       getMyGroup
 * @params:         $uid = UID
 * @return          array|Exception
 * @Description:    retrieves group for current user
 *
 */
function getMyGroup($uid){
    try{
        $base = Connector::getDatabase();
        $sql = "SELECT groups.UID, groups.name FROM groups INNER JOIN group_members ON groups.UID = group_members.group_id WHERE group_members.uid = $uid";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }catch(Exception $e){
        return $e;
    }
}

/**
 * @function:       getMyGroupMembers
 * @params:         $uid = UID
 * @return          array|Exception
 * @Description:    gets all group members of the user is a member of
 *
 */
function getMyGroupMembers($uid){
    try{
        $base = Connector::getDatabase();
        $sql = "SELECT user.first_name, user.last_name FROM user INNER JOIN group_members ON user.UID = group_members.uid WHERE group_members.group_id = $uid";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }catch(Exception $e){
        return $e;
    }
}

/**
 * @function:       getInnerGroupMember
 * @params:         $uid = UID
 * @return          array|Exception
 * @Description:    retrieves group members within each of the groups
 *
 */
function getInnerGroupMembers($uid){
    try{
        $base = Connector::getDatabase();
        $sql = "SELECT user.UID, user.first_name, user.last_name, user.Email, group_members.leader FROM user INNER JOIN group_members ON user.uid=group_members.uid WHERE group_members.group_id=$uid ORDER BY leader DESC;";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }catch(Exception $e){
        return $e;
    }
}

/**
 * @function:       getAllUsers
 * @params:         NA
 * @return          array|Exception
 * @Description:    returns all users
 *
 */
function getAllUsers(){
    try{
        $base = Connector::getDatabase();
        $sql = "SELECT * FROM user ORDER BY first_name";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }catch( Exception $e){
        return $e;
    }
}

/**
 * @function:       addGroup
 * @params:         $newGroup - group's name
 * @return          array|Exception
 * @Description:    sets new group in the database
 *
 */
function addGroup($newGroup){
    try{
        $base = Connector::getDatabase();
        $sql = "INSERT INTO groups (name) VALUES ('$newGroup')";
        $stmt = $base->prepare($sql);
        $stmt->execute();
    }catch( Exception $e){
        return $e;
    }
}

/**
 * @function:       addUserToGroup
 * @params:         $uid = UID | $gid = group_id | $isLeader
 * @return          array|Exception
 * @Description:    sets new user to the new group with the ability to set as a leader or not
 *
 */
function addUserToGroup($uid,$gid, $isLeader){
    try{
        $base = Connector::getDatabase();
        $sql = "INSERT INTO group_members (group_id, uid, leader) VALUES('$gid', '$uid', '$isLeader')";
        $stmt = $base->prepare($sql);
        $stmt->execute();

        $sql2 = "SELECT user.email FROM user WHERE user.UID = '$uid'";
        $stmt = $base->prepare($sql2);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }catch( Exception $e){
        return $e;
    }
}
/**
 * @function:       getGroup
 * @params:         $gid = group_id
 * @return          array|Exception
 * @Description:    gets group based on group id passed
 *
 */
function getGroup($gid){
    try{
        $base = Connector::getDatabase();
        $sql3 = "SELECT groups.name FROM groups WHERE groups.UID = '$gid'";
        $stmt = $base->prepare($sql3);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }catch( Exception $e){
        return $e;
    }
}

/**
 * @function:       removeUser
 * @params:         $uid = UID | $gid = group_id
 * @return          array|Exception
 * @Description:    removes user from group selected
 *
 */
function removeUser($uid, $gid){
    try {
        $base = Connector::getDatabase();
        $sql = "DELETE FROM group_members WHERE uid = '$uid' AND group_id = '$gid'";
        $stmt = $base->prepare($sql);
        $stmt->execute();
    } catch (Exception $e) {
        return $e;
    }
}

/**
 * @function:       changeLeader
 * @params:         $uid = UID | $gid = group_id | $isLeader
 * @return          array|Exception
 * @Description:    sets and changes user's leader status
 *
 */
function changeLeader($uid,$gid,$isLeader){
    try {
        $base = Connector::getDatabase();
        if($isLeader == 1){
            try{
                $sql = "UPDATE group_members SET leader = 0 WHERE group_id='$gid' AND uid='$uid'";
                $stmt = $base->prepare($sql);
                $stmt->execute();

                $sql2 = "UPDATE user SET role = 'USER' WHERE uid='$uid'";
                $stmt = $base->prepare($sql2);
                $stmt->execute();
            }catch( Exception $e){
                return $e;
            }
        }
        else{
            try{
                $sql3 = "UPDATE group_members SET leader = 1 WHERE group_id='$gid' AND uid='$uid'";
                $stmt2 = $base->prepare($sql3);
                $stmt2->execute();

                $sql4 = "UPDATE user SET role = 'SUPERUSER' WHERE uid='$uid'";
                $stmt = $base->prepare($sql4);
                $stmt->execute();
            }catch( Exception $e){
                return $e;
            }
        }
    } catch (Exception $e) {
        echo $e;
        return $e;
    }
}

/**
 * @function:       removeCurrentGroup
 * @params:         gid = group_id
 * @return          array|Exception
 * @Description:    removes the selected group by its identifier in the database
 *
 */
function removeCurrentGroup($gid){
    try {
        $base = Connector::getDatabase();
        $sql = "DELETE FROM group_members WHERE group_id = '$gid'";
        $stmt = $base->prepare($sql);
        $stmt->execute();
        $sql = "DELETE FROM groups WHERE UID = '$gid'";
        $stmt = $base->prepare($sql);
        $stmt->execute();
    } catch (Exception $e) {
        return $e;
    }

}
