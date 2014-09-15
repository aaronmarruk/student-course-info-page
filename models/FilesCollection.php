<?php 

namespace models;
use lib\Config;
use lib\JsonApi;

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

class FilesCollection {
  // protected $core;
  public $files;
  // Construct, passing in a courseCode and optional Moodle
  public function __construct ( $courseCode, $moodle = NULL ) {
    // Get the current app instance
    $app = \Slim\Slim::getInstance();
    // If we have a session, i.e. user is signed in
    if (isset($_COOKIE['MoodleSession'])) {
      // Check to see if moodle has been passed in, 
      // if not we use the app instance varaiable (latter preferd)
      if ($moodle == NULL){
        $moodle = $app->moodle;
      }
    // If no session, user needs to sign
    } else {
      echo '<p><em>Moodle session id <strong>not found</strong></em</p>';
      return false;
    }
    $url = 'https://webservices.fxplus.ac.uk/thelearningspace/bafinaff.json';
    $this->loadFiles($url);
    $this->processFiles($this->files);
  }
  //////////
  // GETTERS
  //////////
  public function getFiles(){
    return $this->files;
  }
  ////////////////
  // PRIVATE FUNCS
  ////////////////
  private function loadFiles($url){
    // Get Json from Sharepoint API (Fake url @ present)
    $jsonUrl = $url;
    // Get a JSON API
    $jsonApi = new JsonApi();
    // Get json data by passing in url
    $jsonData = $jsonApi->getJson($jsonUrl);
    // k($jsonData);
    // Check that the json is available
    if($jsonData != NULL){
      // $welcomeMessage = $jsonData[""]
      // get the files 
      $this->files = $jsonData["files"]; 
    } else {
      $this->files = NULL;
    }
  }
  private function processFiles($files){
    // Iterator for files array
    $filesIterator = 0;
    if ($files) {
      // for each course in the courselist
      foreach($files as $file) {
        // The subject of our preg_match
        $subject = $file["link"];
        // Regex for finding file extensions
        $pattern = '/\.[0-9a-z]+$/i';
        // Find possible matches, i.e. the file ext e.g. .png
        preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE, 3);
        // The result of the regex, i.e. the extension e.g. .png
        $ext = str_replace(".", "", (string) $matches[0][0]);
        // add the extensiin to the file array
        $file["ext"] = $ext;
        // Update the files array with our updated file, i.e. now contains ext
        $this->files[$filesIterator] = $file; 
        // Update the iterator so we can look through the files in the array
        $filesIterator += 1;  
      }
    }
  }
} 
?>