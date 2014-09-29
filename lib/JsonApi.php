<?php 

namespace lib;

// use lib\Core;
// use PDO;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

class JsonApi
{

    public function __construct()
    {

    }

    public function getJson($url)
    {

        $curlSession = curl_init($url);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, false);

        $r = curl_exec($curlSession);




        // $r = preg_replace('/\s+/', '',$r);

        //$r = substr($r, 3);

        $r = json_decode($r, true);


   
        

        // k($r);

        curl_close($curlSession);
        return $r;
    }
}
