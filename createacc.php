<?php
require_once 'configs/config.inc.php';
require_once 'configs/core.inc.php';
?>

<?php 
include_once VIEW_PATH.'common/header.php';
include_once VIEW_PATH.'common/navbar.php';
?>

<?

// Check if Cancel button pressed
if (isset($_POST['btnCancel'])) {
    header('location: index.php');
    exit();
}

// Initialize variables
$user = null;
$password = null;
$name = null;


if (isset($_POST['user']) && isset($_POST['password']) && isset($_POST['name'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    // Hash password
    $password = md5($password);

    
    $sql_result = createAccount($user, $password, $name);


    // Reset variables
    $user = null;
    $password = null;
    $name = null;
}

// Require view
require_once VIEW_PATH.'createacc.view.php';
// footer
include_once VIEW_PATH.'common/footer.php';
?>
