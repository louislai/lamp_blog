<?php
// Initialize variables
$user = null;
$password = null;
$name = null;

if (isset($_POST['user']) && isset($_POST['password']) && isset($_POST['name'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    $sql_result = createAccount($user, $password, $name);

    // Reset variables
    $user = null;
    $password = null;
    $name = null;


}

// Require view
require_once VIEW_PATH.'createacc.view.php';
?>
