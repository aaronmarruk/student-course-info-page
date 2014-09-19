<?php 

namespace models;

use moodle\MoodleQuery;
use lib\Config;
use lib\JsonApi;
use PDO;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

class ModuleCollection
{

    // protected $core;
    public $modules;

    public function __construct($moodle = null, $user = null)
    {
        // Get the current app instance
        $app = \Slim\Slim::getInstance();
        // Get the modules
        $this->modules = $moodle->getenrolments($user);
        // Now we will process the modules, add a
        // few things that will be useful in the view.
        $this->processModuleNames();
    }
    //////////
    // GETTERS
    //////////
    public function getModules()
    {
        return $this->modules;
    }
    ////////////////
    // PRIVATE FUNCS
    ////////////////
    private function processModuleNames()
    {
        // Returns a more nicely formatted module name,
        // removing module code if present, and storing
        // code for later use
        // Iterator
        $i = 0;
        // for each course in the courselist
        foreach ($this->modules as $module) {
            // k($module);
            // if the module has an id number
            if ($module->idnumber) {
                // module id, prefix to most module fullnames
                $id = $module->idnumber . " ";
                // the module fullname
                $name = $module->fullname;
                // Remove the ID prefix from module name
                $readableName = str_replace($id, "", $name);
                $module->readableName = $readableName;
            }
            $module->readableName = $module->fullname;
            // Strip html tags from summary
            $module->summary = strip_tags($module->summary);
            // Strip ï¿½
            $module->summary = str_replace("\uFFFD", "", $module->summary);
            $this->moduleList[$i] = $module;
            // k($this->$moduleList);
            $i += 1;
        } // End foreach
    }
}
