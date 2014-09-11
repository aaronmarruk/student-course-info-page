<?php 

namespace models;
// use lib\Core;
use moodle\MoodleQuery;
use lib\Config;
use lib\JsonApi;
use PDO;


ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

class Course {

  public $moduleCollection;
  public $filesCollection;
  public $readingsCollection;
  public $courseCode;
  public $courseName;
  public $welcomeMessage;
  public $welcomeName;
  public $welcomePhoto;
  public $welcomeJobTitle;

  public function __construct ( $user = NULL, $moodle = NULL ) {
    echo "Orange Pith";
    // Get the current app instance
    $app = \Slim\Slim::getInstance();
    if (isset($_COOKIE['MoodleSession'])) {
      // Check to see if moodle has been passed in, 
      // if not we use the app instance varaiable (latter preferd)
      if ($moodle == NULL){
        $moodle = $app->moodle;
      }
      // Check to see if user has been passed in, 
      // if not we use the app instance variable (latter preferd)
      if ($user == NULL){
        $user = $app->user;
      }
    } else {
      echo '<p><em>Moodle session id <strong>not found</strong></em</p>';
      return false;
    }
    // Get the module collection
    $this->moduleCollection = new ModuleCollection();
    echo "PRINTING THE MODULE COLLECTION";
    k($this->moduleCollection->getModules());
    // Get the files collection
    $this->filesCollection = new FilesCollection($this->courseCode);
    // Get the readings for the course
    $this->readingsCollection = new ReadingsCollection($this->moduleCollection->getModules());
    // Get the current user
    k($this->readingsCollection);
    $username = $user->username;
    $userInfoUrlBase = 'http://example.com/';
    // append username to url base so we can query info for user
    $userInfoUrl = $userInfoUrlBase . $username;
    // Create a fake url to test ryans api
    $fakeUrl = 'https://webservices.fxplus.ac.uk/scip/student.ashx?stu=1201434';
    // Get a JSON API
    $jsonApi = new JsonApi();
    // Get json data by passing in url
    $jsonData = $jsonApi->getJson($fakeUrl);
    $this->courseCode = $jsonData["code"];
    $this->courseName = $jsonData["course"];

    $jsonUrl2 = 'https://webservices.fxplus.ac.uk/thelearningspace/bafinaff.json';
    // Get a JSON API
    $jsonApi2 = new JsonApi();
    // Get json data by passing in url
    $jsonData2 = $jsonApi2->getJson($jsonUrl2);

    $this->welcomeMessage = $jsonData2["welcome"]["message"];
    $this->welcomeName = $jsonData2["welcome"]["name"];
    $this->welcomePhoto = $jsonData2["welcome"]["photo"];
    $this->welcomeJobtitle = $jsonData2["welcome"]["title"];
  }

  private function readingsModulesMap(){

  }

  public function getModules(){
    return $this->moduleCollection->getModules();
  }

  public function getFiles(){
    return $this->filesCollection->getFiles();
  }

  public function getReadings(){
    return $this->readingsCollection->getReadings();
  }

  public function getCourseCode(){
    return $this->courseCode;
  }

  public function getCourseName(){
    return $this->courseName;
  }

  public function getWelcomeMessage(){
    return $this->welcomeMessage;
  }

  public function getWelcomeName(){
    return $this->welcomeName;
  }

  public function getWelcomePhoto(){
    return $this->welcomePhoto;
  }

  public function getWelcomeJobTitle(){
    return $this->welcomeJobTitle;
  }
} 
?>