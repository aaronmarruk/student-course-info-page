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

    public function __construct($user = null, $moodle = null)
    {
        $username = $user->getUsername();
        $userData = $this->loadUserData($username);
        $this->courseName = $userData["course"];
        $courseData = $this->getJsonData(
            "https://webservices.fxplus.ac.uk/thelearningspace/bafinaff.json"
        );
        $this->loadWelcomeMsg($courseData);
        $this->loadCollections();
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
    private function loadWelcomeMsg($jsonData2)
    {
        // Get the welcome info, including course leader details
        $this->welcomeMessage = $jsonData2["welcome"]["message"];
        $this->welcomeName = $jsonData2["welcome"]["name"];
        $this->welcomePhoto = $jsonData2["welcome"]["photo"];
        $this->welcomeJobtitle = $jsonData2["welcome"]["title"];
    }
    private function loadUserData($username)
    {
        // Get the user data
        // i.e. course, course code, tuto
        $baseUrl = 'https://webservices.fxplus.ac.uk/scipstu/handler.ashx?u=';
        echo "ins loadUserData";
        $subStrings = array(
            $baseUrl,
            "R1173293"
        );
        $userDataUrlString = join($subStrings);
        // Get json data by passing in userDataUrlString
        $jsonData = $this->getJsonData(
            $userDataUrlString
        );
        
        echo "ins loadUserData";
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
