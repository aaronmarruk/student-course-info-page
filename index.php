<?php

use \moodle;
use lib\Config;

require 'vendor/autoload.php';
require 'config.php';
require_once('moodlequery/class.moodlequery.php');

// Setup custom Twig view
$twigView = new \Slim\Views\Twig();
// Create the app
$app = new \Slim\Slim(array(
    'view' => $twigView,
    'templates.path' => 'templates/',
));
$view = $app->view();
$view->parserOptions = array(
    'debug' => true,
    'cache' => dirname(__FILE__) . '/templates/cache'
);
// Automatically load router files
$routers = glob('routers/*.router.php');
foreach ($routers as $router) {
    require $router;
}
// Define moodle resource
$app->container->singleton('moodle', function () {
    // Get moodle config, i.e. $CFG
    $cfg = Config::read('moodle.config');
    // Get instance of MoodleQuery, i.e. $CFG
    return new moodle\MoodleQuery($cfg);
});
// Define user resource
$app->container->singleton('user', function ($moodle) {
    // Get instance of user, passing in moodle instance
    return new models\User($moodle);
});
// Define user resource
$app->container->singleton('userDetails', function () {
    // $app = \Slim\Slim::getInstance();
    // Get instance of user, passing in moodle instance
    // $studentid = $app->user->getId();
    $studentid = '157580';
    $soapUrl = 'https://webservices.fxplus.ac.uk/LearningSpaceStudentFeed/WebService.asmx/GetStudents';
    return new lib\SoapApi($studentid, $soapUrl);
});
// Before the router is run
$app->hook('slim.before.router', function () use ($app) {
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
});
// Run the app
$app->run();
