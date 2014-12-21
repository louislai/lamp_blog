<?php
// Configure the default time zone
date_default_timezone_set('Asia/Singapore');

// Configure the default locale
setlocale(LC_ALL, 'en_SG');

// Define constants for database connectivity
define('DB_HOST', 'localhost');
define('DB_NAME', 'louis_blog');
define('DB_USER', 'root');
define('DB_PASSWORD', '123456');

// Define absolute application paths

// Use PHP's directory separator for windows/unix compatibility
defined('DS') ? NULL : define('DS', DIRECTORY_SEPARATOR);

// Define absolute path to server root
define('SITE_ROOT', dirname(dirname(__FILE__)).DS);

// Define absolute path to includes
define('INCLUDE_PATH', SITE_ROOT.'includes'.DS);
define('FUNCTION_PATH', INCLUDE_PATH.'library'.DS);
define('TEMPLATE_PATH', INCLUDE_PATH.'templates'.DS);
define('ASSET_PATH', SITE_ROOT.'assets'.DS);
////////////////////////////////////////////////////////////////////////////////
// Include library, helpers, functions, footers, headers
////////////////////////////////////////////////////////////////////////////////
require_once(FUNCTION_PATH.'functions.inc.php');
require_once(FUNCTION_PATH.'database.inc.php');
require_once(TEMPLATE_PATH.'header.php');
require_once(TEMPLATE_PATH.'footer.php');
?>
