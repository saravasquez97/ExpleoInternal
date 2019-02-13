<?php
/**
 * Created by PhpStorm.
 * User: Stephen
 * Date: 11/20/18
 * Time: 10:55 PM
 */

require_once(__DIR__.'/../src/lib/Logger.php');

/**
 * LoggerTest
 */
class LoggerTest extends PHPUnit\Framework\TestCase
{

    protected function setUp()
    {
        // Temporarily setting DOCUMENT_ROOT so that log methods can be properly tested
        $_SERVER['DOCUMENT_ROOT'] = dirname(__FILE__) . "/..";
    }

    /**
     * Check that a Logger object can be instantiated.
     * @return Logger|null Logger singleton
     */
    public function test__construct()
    {
        $base = null;
        $base = Logger::getInstance();
        $this->assertNotNull($base);

        return $base;
    }

    /**
     * Test that the log file can be written to.
     * @depends test__construct
     */
    public function test_log($base)
    {
        $this->assertTrue($base->log("PHPUnit test message"));
    }

    /**
     * Test that error messages can be logged.
     * @depends test__construct
     */
    public function test_error($base)
    {
        $this->assertTrue($base->log_error("PHPUnit test message"));
    }

    /**
     * Test that warning messages can be logged.
     * @depends test__construct
     */
    public function test_warning($base)
    {
        $this->assertTrue($base->log_warning("PHPUnit test message"));
    }

    /**
     * Test that debug messages can be logged.
     * @depends test__construct
     */
    public function test_debug($base)
    {
        $this->assertTrue($base->log_debug("PHPUnit test message"));
    }

    /**
     * Check that all required public methods exists.
     * @depends test__construct
     */
    public function test_methods($base)
    {
        $this->assertTrue(
            method_exists($base, 'log'),
            "Logger does not have log method"
        );

        $this->assertTrue(
            method_exists($base, 'log_warning'),
            "Logger does not have log_warning method"
        );

        $this->assertTrue(
            method_exists($base, 'log_error'),
            "Logger does not have log_error method"
        );

        $this->assertTrue(
            method_exists($base, 'log_debug'),
            "Logger does not have log_debug method"
        );

        $this->assertTrue(
            method_exists($base, 'getInstance'),
            "Logger does not have getInstance method"
        );
    }


    protected function tearDown()
    {
        unset($_SERVER['DOCUMENT_ROOT']); // unset temporarily defined DOCUMENT_ROOT
    }
}