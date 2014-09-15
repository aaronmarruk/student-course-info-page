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