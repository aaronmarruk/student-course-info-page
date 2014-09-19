<?php 

namespace models;

use lib\Config;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

class User
{

    public $moodleUser;
    public $id;
    public $ldapUserName;
    public $firstname;
    public $lastname;
    public $fullname;

    public function __construct($userIsSet = false)
    {
        // Get the current app instance
        $app = \Slim\Slim::getInstance();
        // Returns moodle config
        $moodle = $app->moodle;
        // if there is a Moodle Session, i.e. logged into Moodle
        if (isset($_COOKIE['MoodleSession'])) {
            // Check that we have a moodle session
            if ($this->moodleUser = $moodle->getuser($_COOKIE['MoodleSession'])) {
                // Set this Moodle user to user in session cookie
                $this->moodleUser = $moodle->getuser($_COOKIE['MoodleSession']);
                // grab the uid from user
                $this->id = $this->moodleUser->id;
                // grab the LDAP username, e.g. am144296 from user
                $this->ldapUserName = $this->moodleUser->username;
                // grab the first name
                $this->firstname = $this->moodleUser->firstname;
                // grab the last name
                $this->lastname = $this->moodleUser->lastname;
                // Create fullname var
                $this->fullname = $this->firstname .' '. $this->lastname;
                $userIsSet = true;
            } else {
                return false;
            }
        // else, if no session found, not logged in
        } else {
        // throw new \Exception('No user set');
        }
    } // end of constructor

    public function getMoodleuser()
    {
        return $this->moodleUser;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLdapUserName()
    {
        return $this->ldapUserName;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getFullname()
    {
        return $this->fullname;
    }
}
