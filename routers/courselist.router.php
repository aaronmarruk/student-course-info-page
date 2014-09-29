<?php

use lib\Config;
use \moodle;
use \aspire;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

//require_once('vendor/ucfalmouth/moodlequery/config.php');
require_once('vendor/ucfalmouth/moodlequery/class.moodlequery.php');
require_once('vendor/ucfalmouth/moodlequery/class.aspireapi.php');

$app->get('/student', function () use ($app) {
    // Get the app user
    $user = $app->user;
    // Get the moodle instance
    $moodle = $app->moodle;
    // Get the course for the given user...
    // hint, user is an app singleton
    $course = new models\Course($user, $moodle);
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
        // "readingLists" => $course->getReadings(),
        "readingLists" => "",
        "userId" => $user->getId(),
        "userFirstName" => $user->getFirstName(),
        "userFullName" => $user->getFullName(),
    ];

    $app->render('course-page.html', $params);
});
