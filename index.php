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
    'debug' => true,
    'view' => $twigView,
    'templates.path' => 'templates/',
));
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
// Run the app
$app->run();
