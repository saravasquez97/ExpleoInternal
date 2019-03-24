<?php

require_once ("Logger.php");

/**
 * Class ConfigurationInterface
 * @author Stephen Ritchie <stephen.ritchie@uky.edu>
 */
class ConfigurationInterface
{
    private static $instance;
    private $config_filename;
    private $database_filename;

    /**
     * ConfigurationInterface constructor
     */
    private function __construct()
    {
        $this->config_filename = "config.ini";
        $this->database_filename = $this->getSystemConfig()['database']['filename'];
        Logger::getInstance()->log_debug("created interface", basename(__FILE__));
    }

    /**
     * Parses the system configuration file.
     * @return array|bool
     */
    public function getSystemConfig()
    {
        $filename = __DIR__."/../../src/config/".$this->config_filename;

        if (file_exists($filename)){
            $ini = parse_ini_file($filename, true);
            return $ini;
        } else {
            Logger::getInstance()->log_error("System configuration file could not be parsed. Refer to php_error.log for more information.", basename(__FILE__));
            error_log("Could not open configuration file");
            header("Location: /src/views/error.php");
            exit();
        }
    }

    /**
     * Parses the database configuration file.
     * @return array|bool
     */
    public function getDatabaseConfig()
    {
        $filename = __DIR__."/../../src/config/".$this->database_filename;

        if (file_exists($filename)){
            $ini = parse_ini_file($filename, true);
            return $ini;
        } else {
            Logger::getInstance()->log_error("Database configuration file could not be parsed. Refer to php_error.log for more information.", basename(__FILE__));
            error_log("Could not open database configuration file.");
            header("Location: /src/views/error.php");
            exit();
        }
    }

    /**
     * Singleton interface
     * @return ConfigurationInterface
     */
    public static function getInterface()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new ConfigurationInterface();
        }
        return self::$instance;
    }
}


