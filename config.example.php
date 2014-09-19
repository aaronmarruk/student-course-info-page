<?php

use lib\Config;

// DB Config
// Config::write('db.host', '');
// Config::write('db.type', '');
// Config::write('db.port', '');
// Config::write('db.basename', '');
// Config::write('db.user', '');
// Config::write('db.password', '');

Config::write('moodle.config.path', '');
// run the moodle config.php to create global $CFG object
require_once(Config::read('moodle.config.path'));
Config::write('moodle.config', $CFG);
// tidy up global variable
unset($CFG);

Config::write('site.root', '');
Config::write('site.root.scip', '');
Config::write('site.logout', '');

// Project Config
Config::write('path', '');

// API
Config::write('records.sits', '');
Config::write('records.student', '');
Config::write('records.vle', '');

// regex to remove config details for config.example.php (eg in Sublime): 
// , '[\w_\/:=\?.-]*'\)
// , '')