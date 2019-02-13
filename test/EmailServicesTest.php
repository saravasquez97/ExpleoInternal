<?php

require_once(__DIR__.'/../src/lib/EmailServices.php');


class EmailServicesTest extends PHPUnit\Framework\TestCase
{
    private $test_email = "stephenfritchie@gmail.com";

    protected function setUp()
    {
        // Temporarily setting DOCUMENT_ROOT so that log methods can be properly tested
        $_SERVER['DOCUMENT_ROOT'] = dirname(__FILE__) . "/..";
    }

    /**
     * Check that an EmailServices object can be instantiated.
     * @return EmailServices|null
     */
    public function test__construct()
    {
        $base = null;
        $base = new EmailServices($this->test_email);
        $this->assertNotNull($base);

        return $base;
    }

    /**
     * @depends test__construct
     * @param $base
     */
    /*public function test_notification($base)
    {
        $this->assertTrue($base->sendNotification("PHPUnit notification test"));
    }*/

    protected function tearDown()
    {
        unset($_SERVER['DOCUMENT_ROOT']); // unset temporarily defined DOCUMENT_ROOT
    }
}