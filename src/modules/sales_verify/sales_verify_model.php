<?php
/**
 * Created by GLAS1.
 * User: sara
 * Date: 14/2/19
 * Time: 1:55 PM
 */

require_once ("../../lib/Connector.php");

if(!isset($_SESSION))
{
    session_start();
}

/**
 * gets unverified sale users
 * @return data
 */
function getSalesUsers()
{
	$base = Connector::getDatabase();
	$sql = "SELECT * FROM user WHERE (role LIKE 'SALES' AND verified = 0);";
	$stmt = $base->prepare($sql);
    $stmt->execute();
    return $stmt->fetchALL();
}


/**
 * verify selected sales users
 * @param uid
 */
function verify($UID)
{
	try{
		$base = Connector::getDatabase();
		$sql = "UPDATE user SET verified = 1, hash = NULL WHERE UID LIKE '$UID';";
		$stmt = $base->prepare($sql);
		$stmt->execute();
	}catch(Exception $e){
		error_log($e);
	}
}

/**
 * removes selected sales users
 * @param uid
 */

function remove($UID)
{
	try{
		$base = Connector::getDatabase();
		$sql = "DELETE FROM user WHERE UID LIKE '$UID';";
		$stmt = $base->prepare($sql);
    	$stmt->execute();
	}catch(Exception $e){
		error_log($e);
	}
}

?>