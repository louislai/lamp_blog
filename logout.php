<?php
require_once 'includes/config.inc.php';
require_once INCLUDE_PATH.'core.inc.php';
session_destroy();
header('Location: '.$http_referer);
?>
