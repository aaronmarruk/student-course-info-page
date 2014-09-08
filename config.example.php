<?php

use lib\Config;

include 'moodlequery/config.php'; 

// DB Config
Config::write('db.host', 'localhost');
Config::write('db.type', 'mysql');
Config::write('db.port', '');
Config::write('db.basename', 'moodle_26');
Config::write('db.user', 'moodle_26');
Config::write('db.password', 'm768zVWyH3c5Hyez');

Config::write('moodle.config', $CFG);

Config::write('site.root', 'http://localhost/moodle_26');
Config::write('site.root.scip', 'http://localhost/moodle_26/scip');
Config::write('site.logout', 'http://localhost/moodle_26/logout');

// Project Config
Config::write('path', 'http://localhost/moodle_26/scip');