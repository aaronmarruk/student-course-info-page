<?php 

namespace models;
use moodle\MoodleQuery;
use lib\Config;
use lib\JsonApi;
use PDO;


ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

class ModuleCollection {

  // protected $core;
  public $modules;

  public function __construct ( $user = NULL, $moodle = NULL ) {
    // Get the current app instance
    $app = \Slim\Slim::getInstance();
    // If we have a session, i.e. user is signed in
    if (isset($_COOKIE['MoodleSession'])) {
      // Check to see if moodle has been passed in, 
      // if not we use the app instance varaiable (latter preferd)
      if ($moodle == NULL){
        $moodle = $app->moodle;
      }
      // Check to see if user has been passed in, 
      // if not we use the app instance variable (latter preferd)
      if ($user == NULL){
        $user = $app->user;
      }
    // If no session, user needs to sign
    } else {
      echo '<p><em>Moodle session id <strong>not found</strong></em</p>';
      return false;
    }
    // Get the modules
    $this->modules = $moodle->getenrolments($user);
    // Now we will process the modules, add a 
    // few things that will be useful in the view.
    $this->processModuleNames();
  }
  //////////
  // GETTERS
  //////////
  public function getModules(){
    return $this->modules;
  }
  ////////////////
  // PRIVATE FUNCS
  ////////////////
  private function processModuleNames(){
    // Iterator
    $i = 0;
    // for each course in the courselist
    foreach($this->modules as $module) {
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
        // if( (array) $aspire->modulelists($module)[0] != FALSE ){
        //   // get the reading list object from aspire and cast as array
        //   $readinglists = (array) $aspire->modulelists($module);
        //   // store readinglist in lists array using module name as key
        //   $aspireLists[$module->fullname] = $readinglists;
        // }
        // Update the module fullname. i.e. without id prefix        
        // Strip html tags from the module summary  
      }
      $module->newName = $newName;
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
?>