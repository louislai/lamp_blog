<?php
require_once 'configs/config.inc.php';
require_once 'configs/core.inc.php';
session_destroy();
header('Location: '.$http_referer);
?>
