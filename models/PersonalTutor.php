<?php 

namespace models;

use lib\Config;
use models\JsonApi;

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

class PersonalTutor {

  public $email;
  public $name;
  public $photo;
  public $telephone;
  public $jobTitle;

  public function __construct () {
    // Get the current app instance
    $app = \Slim\Slim::getInstance();
    // Get the current user
    $username = $app->user->username;
    $userInfoUrlBase = 'http://example.com/';
    // append username to url base so we can query info for user
    $userInfoUrl = $userInfoUrlBase . $username;
    // Create a fake url to test ryans api
    $fakeUrl = 'https://webservices.fxplus.ac.uk/scip/student.ashx?stu=1201434';
    // Get a JSON API
    $jsonApi = new JsonApi();
    // Get json data by passing in url
    $jsonData = $jsonApi->getJson($fakeUrl);
    // The tutor email
    $this->email = $jsonData["tutor"]["email"];
    // The tutor email
    $this->name = $jsonData["tutor"]["name"];
    // The tutor photo
    $this->photo = $jsonData["tutor"]["photo"];
    // The tutor phone
    $this->telephone = $jsonData["tutor"]["telephone"];
    // The tutor job title
    $this->jobTitle = $jsonData["tutor"]["title"];
  } // end of constructor

  public function getEmail(){
    return $this->email;
  }

  public function getName(){
    return $this->name;
  }

  public function getPhoto(){
    return $this->photo;
  }

  public function getTelephone(){
    return $this->telephone;
  }

  public function getJobTitle(){
    return $this->jobTitle;
  }


} // End class definition
?>