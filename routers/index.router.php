<?php

use lib\Config;

use Symfony\Component\Yaml\Parser;

$yaml = new Parser();
$value = $yaml->parse(file_get_contents('config.yml'));
// GET index route
$app->get('/', function () use ($app) {
    // // Get course list per user
    // If user ID is NULL, we don't have a user, i.e. no sign in
    if ($app->user->id == null) {
        // we will redirect to 500, so
        // create the view params
        $params = [
            "siteRoot" => Config::read('site.root')
        ];
        // render 500 page, passing in params
        $app->render('403.html', $params);
        // stop any further code from being run
        exit();
    }
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
        "readingLists" => $course->getReadings(),
        "userId" => $user->getId(),
        "userFirstName" => $user->getFirstName(),
        "userFullName" => $user->getFullName(),
    ];

    $app->render('course-page.html', $params);
});

$app->get('/login', function () use ($app) {

    $hello = "Hello!";
    $app->render('index.html', array('hello' => $hello));
});

$app->get('/404', function () use ($app) {

    // get site baseurl
    $base = Config::read('site.root');

    // Render 404 template
    $app->render('404.html', array('base' => $base));
});
