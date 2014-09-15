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

  // // Get course list per user
  // If user ID is NULL, we don't have a user, i.e. no sign in
  if($app->user->id == NULL) {
    // we will redirect to 500, so
    // create the view params
    $params = [
      "siteRoot" => Config::read('site.root')
    ];
    // render 500 page, passing in params
    $app->render('403.html', $params);
    // stop any further code from being run
    exit();
  } else {
    // If the is a user, get the user
    $user = $app->user;
  }
  ///////////////
  // Aspire lists
  ///////////////
  // // Get the aspire config from Moodle object
  // $aspireconfig = $app->moodle->getaspireconfig();
  // $aspire = new aspire\AspireAPI($aspireconfig);
  // // Create an array for storing our lists per course
  // $aspireLists = array();
  // for each course in the courselist
  // foreach($course->getModuleList() as $module) {
  //   // k($module);
  //   // if the module has an id number
  //   if ($module->idnumber){
  //     // module id, prefix to most module fullnames
  //     $id = $module->idnumber . " ";
  //     // the module fullname
  //     $name = $module->fullname;
  //     // Remove the ID prefix from module name
  //     $newName = str_replace($id, "", $name); 
  //     // if there is a reading list for the module
  //     if( (array) $aspire->modulelists($module)[0] != FALSE ){
  //       // get the reading list object from aspire and cast as array
  //       $readinglists = (array) $aspire->modulelists($module);
  //       // store readinglist in lists array using module name as key
  //       $aspireLists[$module->fullname] = $readinglists;
  //     }
  //     // Update the module fullname. i.e. without id prefix        
  //     // Strip html tags from the module summary  
  //   }
  //   $module->newName = $newName;
  //   // Strip html tags from summary
  //   $module->summary = strip_tags($module->summary);
  //   // Strip ï¿½
  //   $module->summary = str_replace("\uFFFD", "", $module->summary);
  // }
  
  // Get the course for the given user... 
  // hint, user is an app singleton
  $course = new models\Course();
  // Create params array to pass into view
  $params = [
    "modules" => $course->getModules(),
    "siteRoot" => Config::read('site.root'),
    "scip" => Config::read('site.root.scip'),
    "personalTutor" => new models\PersonalTutor(),
    "courseWelcome" => $course->getWelcomeMessage(),
    "courseWelcomeName" => $course->getWelcomeName(),
    "courseWelcomePhoto" => $course->getWelcomePhoto(),
    "courseWelcomeJobTitle" => $course->getWelcomeJobTitle(),
    "courseName" => $course->getCourseName(),
    "files" => $course->getFiles(),
    "readingLists" => $course->getReadings(),
    "userId" => $user->getId(),
    "userFirstName" => $user->getFirstName(),
    "userFullName" => $user->getFullName(),
  ];

  $app->render('course-page.html', $params);
});