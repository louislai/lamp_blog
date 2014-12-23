<?php
require_once 'configs/config.inc.php';
require_once 'configs/core.inc.php';

// Initialize variables
$user = null;
$password = null;

// Set variables to POST data
if (isset($_POST['user']) && isset($_POST['password'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];

    // Do login action
    $sql_result = login($user, $password);

    // Reset variables
    $user = null;
    $password = null;
}

// Require views
require_once VIEW_PATH.'login.view.php';
?>
