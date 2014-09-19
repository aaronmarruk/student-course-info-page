<?php

use lib\Config;

include 'moodlequery/config.php';

Config::write('moodle.config', $CFG);
Config::write('site.root', 'http://localhost:8888/learningspace');
Config::write('site.root.scip', 'http://localhost:8888/learningspace/apps/scip');
Config::write('site.logout', 'http://localhost:8888/learningspace/logout');
// Project Config
Config::write('path', 'http://localhost/learningspace/apps/scip');
