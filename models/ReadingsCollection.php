<?php 

namespace models;

use lib\Config;
use lib\JsonApi;
use \aspire;

require_once('vendor/ucfalmouth/moodlequery/class.aspireapi.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

class ReadingsCollection
{
    // protected $core;
    public $readings;
    // Construct, passing in a courseCode and optional Moodle
    public function __construct($modules, $moodle = null)
    {
        // Get the current app instance
        $app = \Slim\Slim::getInstance();
        // If we have a session, i.e. user is signed in
        if (isset($_COOKIE['MoodleSession'])) {
            // Check to see if moodle has been passed in,
            // if not we use the app instance varaiable (latter preferd)
            if ($moodle == null) {
                $moodle = $app->moodle;
            }
            // If no session, user needs to sign
        } else {
                echo '<p><em>Moodle session id <strong>not found</strong></em</p>';
            return false;
        }
        // Get the aspire config from Moodle object
        $aspireconfig = $moodle->getaspireconfig();
        $aspire = new aspire\AspireAPI($aspireconfig);
        // Loop through modules and grab reading list for each, if any
        foreach ($modules as $module) {
            // k($module);
            // if the module has an id number
            if ($module->idnumber) {
            // module id, prefix to most module fullnames
                $id = $module->idnumber . " ";
                // the module fullname
                $name = $module->fullname;
                // Remove the ID prefix from module name
                $newName = str_replace($id, "", $name);
                // if there is a reading list for the module
                if ((array)$aspire->modulelists($module)[0] != false) {
                    // get the reading list object from aspire and cast as array
                    $aspireList = (array) $aspire->modulelists($module);
                    // store readinglist in lists array using module name as key
                    $this->readings[$module->fullname] = $aspireList;
                }
                // Update the module fullname. i.e. without id prefix
                // Strip html tags from the module summary
                $module->newName = $newName;
            }
            $module->newName = $module->fullname;
            // Strip html tags from summary
            $module->summary = strip_tags($module->summary);
            // Strip ï¿½
            $module->summary = str_replace("\uFFFD", "", $module->summary);
        }
    }
    // Return Readings
    public function getReadings()
    {
        return $this->readings;
    }
}
