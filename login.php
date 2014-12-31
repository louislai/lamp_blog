<?php

require_once 'configs'.DIRECTORY_SEPARATOR.'config.inc.php';
require_once 'configs'.DS.'core.inc.php';
 

// Check if user already logged in and redirect to home page
if (loggedin()) {
    redirect_to('index.php');
    exit();
}

require_once VIEW_PATH.'common'.DS.'header.php';
require_once VIEW_PATH.'common'.DS.'navbar.php';
?>

<?php
// Check if Cancel button pressed
if (isset($_POST['btnCancel'])) {
    redirect_to('index.php');
    exit();
}

// Initialize variables
$user = null;
$password = null;

// Set variables to POST data
if (isset($_POST['user']) && isset($_POST['password'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];

    // Hash password
    $password = md5($password);

    // Do login action
    $sql_result = user_login($user, $password);

    

    // Reset variables
    $user = null;
    $password = null;

    // If login successful
    if ($sql_result === 1) { 
        // Get back current user data
        $id = $_SESSION['user_id'];
        $sql_result = user_get_by_id($id);
        $_SESSION['user_name'] = $sql_result['name'];

        // Redirect to home page
        header('Location: '.'index.php');
    }
}

// Require views
require_once VIEW_PATH.'login.view.php';

// footer
require_once VIEW_PATH.'common'.DS.'footer.php';
?>
