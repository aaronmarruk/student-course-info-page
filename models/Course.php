<?php 

namespace models;

use moodle\MoodleQuery;
use lib\Config;
use lib\JsonApi;
use lib\SoapApi;
use PDO;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

class Course
{
    public $moduleCollection;
    public $filesCollection;
    public $readingsCollection;
    public $courseCode;
    public $courseName;
    public $welcomeMessage;
    public $welcomeName;
    public $welcomePhoto;
    public $welcomeJobTitle;
    public $courseData;

    public function __construct($user = null, $moodle = null)
    {
        // Get the current app instance
        $app = \Slim\Slim::getInstance();
        // Returns moodle config object
        $moodle = $app->moodle;
        // Returns moodle config object
        $user = $app->user;
        $ldapUserName = $user->getLdapUserName();
        $userId = $user->getId();
        $this->courseData = $this->loadCourseData(
            $ldapUserName,
            Config::read('records.sits')
        );
        $this->courseName = $this->courseData["course"]["coursename"];
        $this->courseCode = $this->courseData["course"]["coursecode"];
        $this->loadWelcomeMsg($this->courseCode);
        $this->loadCollections($moodle, $user, $this->courseCode);
    }
    // Private functions
    private function getJsonData($url)
    {
        
        // Accepts a url with which to make an api call
        // Returns PHP array – i.e
        $api = new JsonApi();
        
        // Get json data by passing in url
        $data = $api->getJson($url);
        
        return $data;
    }
    private function loadCollections($moodle, $user, $courseCode)
    {
        $this->moduleCollection = new ModuleCollection(
            $moodle,
            $user
        );
        $this->filesCollection = new FilesCollection(
            $courseCode
        );
        $this->readingsCollection = new ReadingsCollection(
            $this->moduleCollection->getModules()
        );
    }
    private function isValid($str)
    {
        $newstr = preg_replace('/[^\da-z]/i', '', $str);
        return !preg_match('/[^A-Za-z0-9.#\\-$]/', $newstr);
        
    }
    private function loadWelcomeMsg($courseCode)
    {
        $baseUrl =  Config::read('records.vle');
        $jsonData = $this->getJsonData(
            $baseUrl.$courseCode.".json"
        );

        // Get the welcome info, including course leader details
        if (isset($jsonData["welcome"]["message"])) {
            $this->welcomeMessage = $jsonData["welcome"]["message"];
        } else {
            $this->welcomeMessage = null;
        }
        if (isset($jsonData["welcome"]["name"])) {
            $this->welcomeName = $jsonData["welcome"]["name"];
        } else {
            $this->welcomeName = null;
        }
        if (isset($jsonData["welcome"]["photo"])) {
            $this->welcomePhoto = $jsonData["welcome"]["photo"];
        } else {
            $this->welcomePhoto = null;
        }
        if (isset($jsonData["welcome"]["title"])) {
            $this->welcomeJobTitle = $jsonData["welcome"]["title"];
        } else {
            $this->welcomeJobtitle = null;
        }
    }
    private function loadCourseData($ldapUserName, $baseUrl)
    {
        // Accepts an LDAP username
        // Returns: Course code, course name, student sits id
        // personal tutor
        // Get the user data
        // i.e. course, course code, tuto
        // Get json data
        $jsonData = $this->getJsonData(
            $baseUrl.$ldapUserName
        );
        return $jsonData;
    }
    // Getters
    public function getModules()
    {
        return $this->moduleCollection->getModules();
    }
    public function getFiles()
    {
        return $this->filesCollection->getFiles();
    }
    public function getReadings()
    {
        return $this->readingsCollection->getReadings();
    }
    public function getCourseCode()
    {
        return $this->courseCode;
    }
    public function getCourseName()
    {
        return $this->courseName;
    }
    public function getWelcomeMessage()
    {
        return $this->welcomeMessage;
    }
    public function getWelcomeName()
    {
        return $this->welcomeName;
    }
    public function getWelcomePhoto()
    {
        return $this->welcomePhoto;
    }
    public function getWelcomeJobTitle()
    {
        return $this->welcomeJobTitle;
    }
}
