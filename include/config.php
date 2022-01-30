<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','orange_family');


defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('CSS') ? null : define('CSS', 'layout' . DS . 'css' . DS);
defined('JS') ? null : define('JS', 'layout' . DS . 'js' . DS);

// defined('USERS_MAIN_PHOTOS_PATH') ? null : define('USERS_MAIN_PHOTOS_PATH', 'user.png');

defined('SYS_PATH') ? null : define('SYS_PATH', realpath(getcwd()) . DS);
// define("SESSIONS_SAVE_PATH", realpath(dirname(dirname(__FILE__))) . DS . "session");
