<?php

require_once ("../src/config/config.php");
require_once ("../src/lib/Logger.php");
require_once ("../src/lib/Connector.php");


$servername = constant("DB_SERVER");
$dbname = constant("DB_NAME");
$username = constant("DB_USER");
$password = constant("DB_PASSWORD");


if (isset($_POST['uid'])){

    $uid = $_POST['uid'];

    try {
        $base = Connector::getDatabase();

        $sql = "DELETE FROM user WHERE uid = '$uid';";
        $stmt = $base->prepare($sql);
        $stmt->execute();
    } catch (Exception $e){
        echo $e;
    }
}


// Attempting database connection
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $status = "available";
    $color = "#00FF00";
    //$conn = null;

    $stmt = $conn->prepare("SELECT * FROM user");
    $stmt->execute();



}
catch(PDOException $e){
    $status = $e->getMessage();
    $color = "#FF0000";
}




function userExists($email){

	try {
		$base = Connector::getDatabase();

		$sql = "SELECT * FROM user WHERE email = '$email';";
		$stmt = $base->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch();
		//return $result['UID'];
		if (isset($result['email'])){
			return True;
		} else {
			return False;
		}
	} catch (Exception $e){
		return $e;
	}

}

function printDatabase(){
  try {
    $base = Connector::getDatabase();
    $stmt = $base->prepare("SELECT * FROM user");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 

    echo "<table>";
    echo "<tr>";
    echo "<th>UID</th>";
    echo "<th>first_name</th>";
    echo "<th>last_name</th>";
    echo "<th>email</th>";
    echo "<th>role</th>";
    echo "<th>level</th>";
    echo "<th>gender</th>";
    echo "<th>dateofbirth</th>";
    echo "<th>address</th>";
    echo "<th>city</th>";
    echo "<th>state</th>";
    echo "<th>zip</th>";
    echo "<th>photo</th>";
    echo "<th>progress</th>";
    echo "<th>hash</th>";
    echo "<th>verified</th>";
    echo "<th>delete</th>";
    echo "</tr>";
    foreach($stmt->fetchAll() as $k=>$v) { 
      //print_r($v);
      printUser($v);
    }
    echo "</table>";
  }
  catch(PDOException $e){
      echo $e;
  }

}

function printUser($arry){
  //echo $arry['UID'];
  echo "<tr>";
  echo "<td>".$arry['UID']."</td>";
  echo "<td>".$arry['first_name']."</td>";
  echo "<td>".$arry['last_name']."</td>";
  echo "<td>".$arry['email']."</td>";
  echo "<td>".$arry['role']."</td>";
  echo "<td>".$arry['level']."</td>";
  echo "<td>".$arry['gender']."</td>";
  echo "<td>".$arry['dateofbirth']."</td>";
  echo "<td>".$arry['address']."</td>";
  echo "<td>".$arry['city']."</td>";
  echo "<td>".$arry['state']."</td>";
  echo "<td>".$arry['zip']."</td>";
  echo "<td>".$arry['photo']."</td>";
  echo "<td>".$arry['progress']."</td>";
  echo "<td>".$arry['hash']."</td>";
  echo "<td>".$arry['verified']."</td>";

  echo "<form action='database_diag.php' method='post'>";
  echo "<input type='hidden' id='uid' name='uid' value='".$arry['UID']."'>";
  echo "<td><input type=\"submit\" value=\"delete\"></td>";
  echo "</form>";

  echo "</tr>";

}






//$stmt->execute();

?>




<!doctype html>
<html lang="en">
  <head>
    <title>Database Test</title>
    <style>
      table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
      }
    </style>
  </head>
  <body>
    <h1>Database Tool</h1>
    <p>A simple diagnostic tool that shows you information about the database.</p>
    <table style="width:100%">
      <tr>
        <td>protocol</td>
        <td><a href="http://php.net/manual/en/book.pdo.php" target="_blank">PDO (PHP Data Objects)</a></td>
      </tr>
      <tr>
        <td>host</td>
        <td><?php echo $servername; ?></td>
      </tr>
      <tr>
        <td>database</td>
        <td><?php echo $dbname; ?></td>
      </tr>
      <tr>
        <td>user</td>
        <td><?php echo $username; ?></td>
      </tr>
      <tr>
        <td>status</td>
        <td bgcolor=<?php echo $color; ?>><?php echo $status; ?></td>
      </tr>
    </table>
    <br>
    <br>
    <?php printDatabase(); ?>

  </body>
</html>
</html>