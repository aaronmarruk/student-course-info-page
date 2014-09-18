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
        $ldapUserName = $user->getLdapUserName();
        echo "This is ldapuserName";
        k($ldapUserName);
        $userId = $user->getId();

        // Returns: Course code, course name, student sits id
        // personal tutor
        $this->courseData = $this->loadCourseData($ldapUserName);
        $this->courseName = $this->courseData["course"];

        $this->courseCode = $this->courseData["course"]["coursecode"];

        $baseUrl = "https://webservices.fxplus.ac.uk/scipstu/handler.ashx?u=";

        echo "This is courseData";
        k($this->courseData);

        $this->loadWelcomeMsg($this->courseData);
        $this->loadCollections($this->courseData);

        echo "this is the files collection";
        k($this->filesCollection);
    }
    // Private functions
    private function getJsonData($url)
    {
        $api = new JsonApi();
        // Get json data by passing in url
        $data = $api->getJson($url);
        return $data;
    }
    private function loadCollections()
    {
        $this->moduleCollection = new ModuleCollection();
        $this->filesCollection = new FilesCollection(
            $this->courseCode
        );
        $this->readingsCollection = new ReadingsCollection(
            $this->moduleCollection->getModules()
        );
    }
    private function loadWelcomeMsg($courseData)
    {
        // Get the welcome info, including course leader details
        if (isset($courseData["welcome"]["message"])) {
            $this->welcomeMessage = $courseData["welcome"]["message"];
        } else {
            $this->welcomeMessage = null;
        }
        if (isset($courseData["welcome"]["name"])) {
            $this->welcomeName = $courseData["welcome"]["name"];
        } else {
            $this->welcomeName = null;
        }
        if (isset($courseData["welcome"]["photo"])) {
            $this->welcomePhoto = $courseData["welcome"]["photo"];
        } else {
            $this->welcomePhoto = null;
        }
        if (isset($courseData["welcome"]["title"])) {
            $this->welcomeJobtitle = $courseData["welcome"]["title"];
        } else {
            $this->welcomeJobtitle = null;
        }
        
    }
    private function loadCourseData($ldapUserName)
    {
        // Accepts an LDAP username
        // Returns: Course code, course name, student sits id
        // personal tutor

        // Get the user data
        // i.e. course, course code, tuto
        $baseUrl = 'https://webservices.fxplus.ac.uk/scipstu/handler.ashx?u=';
        echo "ins loadcourseData";
        $subStrings = array(
            $baseUrl,
            $ldapUserName
        );
        $courseDataUrlString = join($subStrings);
        // Get json data by passing in courseDataUrlString
        $jsonData = $this->getJsonData(
            $courseDataUrlString
        );
        
        echo "ins loadcourseData";
        k($jsonData);

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