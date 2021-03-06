<?php

require_once(__DIR__.'/../config/config.php');
require_once ("Connector.php");
require_once ("Logger.php");

/**
 * Class EmailServices
 * @author Stephen Ritchie <stephen.ritchie@uky.edu>
 */
class EmailServices {

    private $email;
    private $logger;
    private $headers;
    private $to;
    private $send_mail = SENDMAIL;

    /**
     * Constructor
     * @param $email string Email address of the user
     */
    public function __construct($email)
    {
        $this->email = $email;
        $this->init();
    }

    /**
     * Initialization
     */
    private function init()
    {
        $this->to = $this->email;
        $this->logger = Logger::getInstance(); // getting handle to the Logger

        // Setting headers
        $this->headers = "MIME-Version: 1.0" . "\r\n";
        $this->headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $this->headers .= 'From: SQSTraining' . "\r\n";
    }

    /**
     * Sends a notification email to the given email address.
     * @param $msg string notification message
     * @return bool Returns false if sending the email failed, true otherwise.
     */
    public function sendNotification($msg)
    {
        $subject = "SQSTraining";
        $message = $this->createNotificationMessage($msg);

        return $this->sendEmail($this->to, $subject, $message, $this->headers);
    }

    /**
     * Creates an HTML notification template with the provided text
     * @param $notification string Notification text.
     * @return string HTML formatted string.
     */
    private function createNotificationMessage($notification)
    {
        $msg = "<!DOCTYPE html><html><body>";
        $msg .= "<p>".$notification."</p>";
        $msg .= "</body></html>";

        return (string)$msg;
    }

    public function sendAccountVerification()
    {
        $subject = "Verify your account";
        $message = $this->createVerificationMessage();

        $this->sendEmail($this->to, $subject, $message, $this->headers);
    }

    private function createVerificationMessage()
    {
        $url = $this->createURL($this->email);

        $msg = "<!DOCTYPE html><html><body>";
        $msg .= "<h2>Welcome to SQS Training!</h2>";
        $msg .= "<p>To finish setting up your account, we just need to make sure this email address is yours.</p>";
        $msg .= "<a href=\"".$url."\">Verify Email</a>";
        $msg .= "<p>If the above link is broken contact an administrator to verify your account.</p>";
	$msg .= "<p>Thanks,</p>";
        $msg .= "<p>The SQS Training Team</p>";
        $msg .= "</body></html>";

        return (string)$msg;
    }

	/**
     * Sends email with generated message to the email address connected to this object
     */
    public function sendSalesVerification()
    {
        $subject = "New Account Created";
        $message = $this->createSalesMessage();

        $this->sendEmail($this->to, $subject, $message, $this->headers);
    }

    /**
     * Creates an HTML message template for email notification of sales account creation
     */

	private function createSalesMessage()
    {
        $msg = "<!DOCTYPE html><html><body>";
        $msg .= "<h2>New Unverified Account Needs Verification</h2>";
        $msg .= "<p>New personnel have created accounts that need verification before gaining access to the training site.</p>";
        $msg .= "<p>Navigate to the 'Verify Users' tab in the SQS training site to verify new accounts.</p>";
        $msg .= "<p>Thanks,</p>";
        $msg .= "<p>The SQS Training Team</p>";
        $msg .= "</body></html>";

        return (string)$msg;
    }    

    /**
     * Creates a unique url using an email and specific hash associated with that email.
     * @param $email
     * @return string URL
     */
    private function createURL($email)
    {
        $filename = "src/modules/verify/verify_controller.php";
        $hash = $this->getHash();
        $url = "http://".$_SERVER['HTTP_HOST']."/".$filename.'?email='.$email.'&hash='.$hash;

        return (string)$url;
    }

    /**
     * Retrieves the hash associated with the object's email address from the database.
     * @return bool|string
     */
    private function getHash()
    {
        $hash = md5( rand(0,1000) );
        $email = $this->email;

        # Store hash into database
        try {
            $base = Connector::getDatabase();
            $sql = "UPDATE user SET hash='$hash' WHERE email = '$email';";
            $stmt = $base->prepare($sql);
            $stmt->execute();
            $this->logger->log_debug("Added hash to user ".$this->email, basename(__FILE__));
        } catch (Exception $e){
            $this->logger->log_error("Could not add hash to database. Exception: ".$e, basename(__FILE__));
            return False;
        }

        return $hash;
    }

    /**
     * @param $to
     * @param $subject
     * @param $message
     * @param $headers
     * @return bool
     */
    private function sendEmail($to, $subject, $message, $headers)
    {
        if ($this->send_mail){
            if(mail($to, $subject, $message, $headers)){
                $this->logger->log("Email notification sent to ".$to, basename(__FILE__));
                return true;
            } else {
                $this->logger->log_error("Email notification send failure to ".$to, basename(__FILE__));
                return false;
            }
        } else {
            $this->logger->log_warning("Email created, but not sent to ".$to." due to SENDMAIL being set", basename(__FILE__));
            return true;
        }
    }
}



