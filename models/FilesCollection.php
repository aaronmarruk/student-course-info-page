<?php
namespace models;

use lib\Config;
use lib\JsonApi;

class FilesCollection
{
    public $files;
    // Construct, passing in a courseCode and optional Moodle
    public function __construct($courseCode, $moodle = null)
    {
        // Get the current app instance
        $app = \Slim\Slim::getInstance();

        
        $baseUrl = Config::read('records.vle');
        $url = $baseUrl . $courseCode .'.json';
        k($url);

        $this->loadFiles($url);
        $this->processFiles($this->files);
    }
    // Getters
    public function getFiles()
    {
        return $this->files;
    }
    // Private Functions
    private function loadFiles($url)
    {
        k($url);
        // Get Json from Sharepoint API (Fake url @ present)
        $jsonUrl = $url;
        // Get a JSON API
        $jsonApi = new JsonApi();
        // Get json data by passing in url
        $jsonData = $jsonApi->getJson($jsonUrl);
        // k($jsonData);
        // Check that the json is available
        if ($jsonData != null) {
            // $welcomeMessage = $jsonData[""]
            // get the files
            $this->files = $jsonData["files"];
        } else {
            $this->files = null;
        }
    }
    private function processFiles($files)
    {
        // Iterator for files array
        $filesIterator = 0;
        if ($files) {
            // for each course in the courselist
            foreach ($files as $file) {
                // The subject of our preg_match
                $subject = $file["link"];
                // Regex for finding file extensions
                $pattern = '/\.[0-9a-z]+$/i';
                // Find possible matches, i.e. the file ext e.g. .png
                preg_match($pattern, $subject, $matches, PREG_OFFSET_CAPTURE, 3);
                // The result of the regex, i.e. the extension e.g. .png
                $ext = str_replace(".", "", (string) $matches[0][0]);
                // add the extensiin to the file array
                $file["ext"] = $ext;
                // Update the files array with our updated file, i.e. now contains ext
                $this->files[$filesIterator] = $file;
                // Update the iterator so we can look through the files in the
                // array
                $filesIterator += 1;
            }
        }
    }
}
