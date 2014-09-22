<?php 

namespace models;

use lib\Config;
use lib\JsonApi;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

class PersonalTutor
{

    public $email;
    public $name;
    public $photo;
    public $telephone;
    public $jobTitle;

    public function __construct()
    {
        // Get the current app instance
        $app = \Slim\Slim::getInstance();
        // Get the current user
        $username = $app->user->ldapUserName;
        $userInfoUrlBase = 'http://example.com/';
        // append username to url base so we can query info for user
        $userInfoUrl = $userInfoUrlBase . $username;
        // Create a fake url to test ryans api
        $baseUrl = Config::read('records.sits');
        // Get a JSON API
        $url = $baseUrl . $app->user->getLdapUserName();
        $jsonApi = new JsonApi();
        // Get json data by passing in url
        $jsonData = $jsonApi->getJson($url);
        // The tutor email
        $this->email = $jsonData["tutor"]["email"];
        // The tutor email
        $name = $jsonData["tutor"]["firstname"] .' '. $jsonData["tutor"]["surname"];
        if ($jsonData["tutor"]["firstname"] == "") {
            $name = null;
        }
        $this->name = $name;
        // The tutor photo
        $this->photo = "http://ih0.redbubble.net/image.13984018.5914/flat,550x550,075,f.u2.jpg";
        // The tutor phone
        $this->telephone = "";
        // The tutor job title
        $this->jobTitle = $jsonData["tutor"]["jobtitle"];
    } // end of constructor

    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getJobTitle()
    {
        return $this->jobTitle;
    }
}
