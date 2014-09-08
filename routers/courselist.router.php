<?php

use lib\Config;
use \moodle;
use \aspire;

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

//require_once('moodlequery/config.php');
require_once('moodlequery/class.moodlequery.php');
require_once('moodlequery/class.aspireapi.php'); 
///////////////
// Get user
///////////////
$app->get('/student', function () use ($app) {  
    // Get course list per user
    // Get moodle config, i.e. $CFG
    $cfg = Config::read('moodle.config');
    // get site baseurl
    $base = Config::read('site.root');
    // get scip page url
    $scip = Config::read('site.root.scip');
    // Get instance of MoodleQuery, i.e. $CFG
    $moodle = new moodle\MoodleQuery($cfg);
    // Try to load user
    // if fails, redirect to Login
    try {
      // get a user
      $user = new models\User($moodle);
      // if getting a user fails, chances are 
      // user needs to log in.
    } catch (Exception $e){
      // we will redirect to 500, so
      // create the view params
      $params = [
        "base" => $base
      ];
      // render 500 page, passing in params
      $app->render('500.html', $params);
      // stop any further code from being run
      exit();
    }
    $userFirstName = $user->getFirstName();
    $userFullName = $user->getFullName();
    $userId = $user->getId();
    // Get the module list for the given user
    $moduleList = new models\ModuleList($user);
    ///////////////
    // Aspire lists
    ///////////////
    // Get the aspire config from Moodle object
    $aspireconfig = $moodle->getaspireconfig();
    $aspire = new aspire\AspireAPI($aspireconfig);
    // Create an array for storing our lists per course
    $aspireLists = array();
    // for each course in the courselist
    foreach($moduleList->getModuleList() as $module) {
      // k($module);
      // if the module has an id number
      if ($module->idnumber){
        // module id, prefix to most module fullnames
        $id = $module->idnumber . " ";
        // the module fullname
        $name = $module->fullname;
        // Remove the ID prefix from module name
        $newName = str_replace($id, "", $name); 
        // if there is a reading list for the module
        if( (array) $aspire->modulelists($module)[0] != FALSE ){
          // get the reading list object from aspire and cast as array
          $readinglists = (array) $aspire->modulelists($module);
          // store readinglist in lists array using module name as key
          $aspireLists[$module->fullname] = $readinglists;
        }
        // Update the module fullname. i.e. without id prefix        
        // Strip html tags from the module summary  
      }
      $module->newName = $newName;
      // Strip html tags from summary
      $module->summary = strip_tags($module->summary);
      // Strip ï¿½
      $module->summary = str_replace("\uFFFD", "", $module->summary);
    }
    // Get the modul
    $modules = $moduleList->getModuleList();
    ////////////////////////////////////////////////////
    // Get Json from Sharepoint API (Fake url @ present)
    ////////////////////////////////////////////////////
    $jsonUrl = 'https://webservices.fxplus.ac.uk/thelearningspace/bafinaff.json';
    // Get a JSON API
    $jsonApi = new models\JsonApi();
    // Get json data by passing in url
    $jsonData = $jsonApi->getJson($jsonUrl);
    // get the contacts from returned array
    $contacts = $jsonData["contacts"];
    // get the files also
    $files = $jsonData["files"];
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
        $files[$filesIterator] = $file; 
        // Update the iterator so we can look through the files in the array
        $filesIterator += 1;  
      }
    }
    ////////////////////////////////////////////////////////
    // Create the params array and pass into view and render
    ////////////////////////////////////////////////////////
    // Create params array to pass into view
    $params = [
        "modules" => $modules,
        "base" => $base,
        "scip" => $scip,
        "contacts" => $contacts,
        "files" => $files,
        "readingLists" => $aspireLists,
        "userId" => $userId,
        "userFirstName" => $userFirstName,
        "userFullName" => $userFullName,
    ];
    $app->render('course-page.html', $params);
});