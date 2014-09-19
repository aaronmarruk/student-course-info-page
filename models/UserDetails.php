<?php 

namespace models;

use lib\Config;
use lib\SoapApi;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

class UserDetails
{
    // protected $core;
    public $files;
    // Construct, passing in a courseCode and optional Moodle
    public function __construct($studentid, $soapUrl)
    {
        // Get the current app instance
        $app = \Slim\Slim::getInstance();

        // Get Json from Sharepoint API (Fake url @ present)
        $soapUrl = $soapUrl;
        // Get a JSON API
        $soapApi = new SoapApi($studentid, $soapUrl);
        // Get json data by passing in url

        k($soapApi);
        // k($jsonData);
        // Check that the json is available
    }
    // Return Files
    // public function getFiles(){
    //   return $this->files;
    // }
}
