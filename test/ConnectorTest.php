<?php
/**
 * Created by PhpStorm.
 * User: connor
 * Date: 10/9/18
 * Time: 1:50 AM
 */

require_once(__DIR__.'/../src/lib/Connector.php');


class ConnectorTest extends PHPUnit\Framework\TestCase
{

    public function test__construct()
    {
        $base = null;
        $base = Connector::getDatabase();
        $this->assertNotNull($base);
    }


    public function testInsert(){
        $base = Connector::getDatabase();
        $sql = "INSERT INTO user (first_name, last_name, email, password) VALUES('John', 'Crickets', 'jc2@gmail.com', 'asdf');";
        $stmt = $base->prepare($sql);
        $this->assertTrue($stmt->execute());
    }

    public function testUpdate(){
        //TODO
    }

    public function testDelete(){
        $base = Connector::getDatabase();
        $sql = "DELETE FROM user WHERE last_name = 'Crickets';";
        //$base->query($sql);
        $stmt = $base->prepare($sql);
        $this->assertTrue($stmt->execute());
    }
}
