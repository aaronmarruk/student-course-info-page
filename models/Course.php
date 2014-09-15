<?php 

namespace models;
use moodle\MoodleQuery;
use lib\Config;
use lib\JsonApi;
use lib\SoapApi;
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
    $userData = $this->loadUserData($user);
    $this->courseName = $userData["course"];
    $courseData = $this->getJsonData(
      "https://webservices.fxplus.ac.uk/thelearningspace/bafinaff.json"
    );
    $this->loadWelcomeMsg($courseData);
    $this->loadCollections();
  }
  ////////////////
  // PRIVATE FUNCS
  ////////////////
  private function getJsonData($url){
    $api = new JsonApi();
    // Get json data by passing in url
    $data = $api->getJson($url);
    return $data;
  }
  private function loadCollections(){
    $this->moduleCollection = new ModuleCollection();
    $this->filesCollection = new FilesCollection(
      $this->courseCode
    );
    $this->readingsCollection = new ReadingsCollection(
      $this->moduleCollection->getModules()
    );
  }
  private function loadWelcomeMsg($jsonData2){
    // Get the welcome info, including course leader details
    $this->welcomeMessage = $jsonData2["welcome"]["message"];
    $this->welcomeName = $jsonData2["welcome"]["name"];
    $this->welcomePhoto = $jsonData2["welcome"]["photo"];
    $this->welcomeJobtitle = $jsonData2["welcome"]["title"];
  }
  private function getUserDataUrlString($user, $baseUrl, $fakeUrl = NULL){
    // Get the current user LDAP username
    $username = $user->username;
    // if there is a fake url, just return a dummy url
    if($fakeUrl == NULL){
      $userInfoUrl = $baseUrl . $username;
    } else {
      $userInfoUrl = $fakeUrl;
    }
    return $userInfoUrl;
  }
  private function loadUserData($user){
    // Get the user data
    // i.e. course, course code, tutor
    $fakeUrl = 'https://webservices.fxplus.ac.uk/scip/student.ashx?stu=1201434';
    $baseUrl = 'http://example.com/';
    $userDataUrlString = $this->getUserDataUrlString(
      $user, 
      $baseUrl,
      $fakeUrl
    );
    // Get json data by passing in userDataUrlString
    $jsonData = $this->getJsonData(
      $userDataUrlString
    );
    return $jsonData;
  }
  //////////
  // GETTERS
  //////////
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