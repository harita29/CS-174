<?php

define('ENVIRONMENT', 'development');

if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}



define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'notelist');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_CHARSET', 'utf8');


