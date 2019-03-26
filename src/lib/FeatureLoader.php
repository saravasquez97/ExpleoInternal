<?php

require_once ("Connector.php");
require_once ("Logger.php");

if(!isset($_SESSION))
{
    session_start();
}

/**
 * The FeatureLoader is responsible for allowing the serving of "bugged" or "errored" pages to a user.  When one of
 * these pages, or "features" is requested, the database is queried to determine which version of a feature to serve.
 * The version of a feature to serve is dependent on the user's unique ID.
 * @author Stephen Ritchie <stephen.ritchie@uky.edu>
 */
class FeatureLoader
{
    /** @var FeatureLoader Holds handler to single instance of class. */
    private static $instance;

    /**
     * FeatureLoader constructor
     * Nothing is done here.
     */
    private function __construct(){}

    /**
     * Produces file path to the version of the given feature associated with user.
     *
     * @param string $UID The ID of the user.
     * @param string $feature The type of feature requested.
     * @return string The file path of the specific feature version.
     */
    public function getFeature($UID, $feature)
    {
        $getDefault = 0;

        // If testing is not turned "on" then set the version to 0, which means the default version of the feature will
        // be loaded.
        if (!$_SESSION['testing_mode']){
            Logger::getInstance()->log_debug("Testing mode is not enabled...setting version to default", basename(__FILE__));
            $getDefault = 1;
        }


        // Query database to see if the UID exists.  If it does not, set the version to default.
        if (!$this->userExists($UID)){
            Logger::getInstance()->log_warning("UID could not be found in database...setting version to default", basename(__FILE__));
            $getDefault = 1;
        }


        // Getting filename of correct version of feature based on what the database says.
        $filename = $this->getFilename($UID, $feature, $getDefault);
        if (!isset($filename)){
            $getDefault = 1;
            $filename = $this->getFilename($UID, $feature, $getDefault);
        }


        // Check that the feature is available in the features directory.  If not, serve an error page.
        $filepath = __DIR__."/../../features/".$feature."/".$filename;
        if (!file_exists($filepath)){
            Logger::getInstance()->log_error("Could not find feature in folder: ".$filepath, basename(__FILE__));
            include ("../views/error.php");
            exit();
        }

        // Return the file path to the feature.
        Logger::getInstance()->log_debug("Serving ".$filename." for UID=".$UID, basename(__FILE__));
        return $filepath;
    }

    /**
     * Checks if a given user exists in the database.
     *
     * @param string $uid ID of user.
     * @return bool|Exception True if user exists, false if not.  Exception if sql query fails.
     */
    private function userExists($uid)
    {
        try {
            $base = Connector::getDatabase();

            $sql = "SELECT UID FROM user WHERE uid = '$uid';";
            $stmt = $base->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();

            if ($result['UID'] == $uid){
                return True;
            } else {
                return False;
            }

        } catch (Exception $e){
            return $e;
        }
    }

    /**
     * Queries database to get filename of feature associated with the given user.
     * @param string $UID user ID
     * @param string $feature
     * @param int $getDefault
     * @return string|Exception
     */
    private function getFilename($UID, $feature, $getDefault=0)
    {
        try {
            $base = Connector::getDatabase();

            if ($getDefault){

                $sql = "SELECT name FROM features_available WHERE version='0' AND feature_group_name='$feature';";

            } else {
                $sql = "SELECT features_available.version, features_available.name
                        FROM features_available
                        JOIN assigned_features
                        ON features_available.id = assigned_features.feature_number
                        WHERE assigned_features.user_id = '$UID' AND features_available.feature_group_name = '$feature';";
            }

            $stmt = $base->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();

            return $result['name'];

        } catch (Exception $e){
            return $e;
        }
    }


    /**
     * Interface to singleton.
     * @return FeatureLoader
     */
    public static function getInterface()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new FeatureLoader();
        }
        return self::$instance;
    }
}
