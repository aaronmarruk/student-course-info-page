<?php 

namespace models;
use lib\Config;
use lib\SoapApi;

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

class UserDetails {
  // protected $core;
  public $files;
  // Construct, passing in a courseCode and optional Moodle
  public function __construct ( $studentid, $soapUrl ) {
    // Get the current app instance
    $app = \Slim\Slim::getInstance();
    // If we have a session, i.e. user is signed in
    if (isset($_COOKIE['MoodleSession'])) {
      // Check to see if moodle has been passed in, 
      // if not we use the app instance varaiable (latter preferd)
      // if ($moodle == NULL){
      //   $moodle = $app->moodle;
      // }
    // If no session, user needs to sign
    } else {
      echo '<p><em>Moodle session id <strong>not found</strong></em</p>';
      return false;
    }
    // Get Json from Sharepoint API (Fake url @ present)
    $soapUrl = $soapUrl;
    // Get a JSON API
    $soapApi = new SoapApi($studentid, $soapUrl);
    // Get json data by passing in url
    echo "k the soap API!";
    k($soapApi);
    // k($jsonData);
    // Check that the json is available



  }
  // Return Files
  // public function getFiles(){
  //   return $this->files;
  // }
} 
?>