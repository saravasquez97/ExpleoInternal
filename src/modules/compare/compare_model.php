<?php

session_start();

function getUserInfo($uid) {

        try {
                $base = Connector::getDatabase();
                $sql = "SELECT first_name, last_name, gender, dateofbirth, city, state, photo FROM user WHERE UID = '$uid';";
                $stmt = $base->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result}
                        catch (Exception $e) {throw ($e);}}

?>
