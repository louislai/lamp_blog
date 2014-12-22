<?php
// Configure the default time zone
date_default_timezone_set('Asia/Singapore');

// Configure the default locale
setlocale(LC_ALL, 'en_SG');

// Define constants for database connectivity
define('DB_HOST', 'localhost');
define('DB_NAME', 'louis_blog');
define('DB_USER', 'admin');
define('DB_PASSWORD', '123456');

// Use PHP's directory separator for windows/unix compatibility
defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);

// Define absolute path to server root
define('SITE_ROOT', dirname(dirname(__FILE__)).DS);

// Define absolute paths
define('MODEL_PATH', SITE_ROOT.'models'.DS);
define('VIEW_PATH', SITE_ROOT.'views'.DS);
define('CONTROLLER_PATH', SITE_ROOT.'controllers'.DS);
define('ASSET_PATH', SITE_ROOT.'assets'.DS);

// Include models
require_once(MODEL_PATH.'functions.inc.php');
require_once(MODEL_PATH.'database.inc.php');
require_once(MODEL_PATH.'post.inc.php');
require_once(MODEL_PATH.'user.inc.php');
?>
