<?php
require_once 'configs/config.inc.php';
require_once 'configs/core.inc.php';
?>

<?php 
include_once VIEW_PATH.'common/header.php';
include_once VIEW_PATH.'common/navbar.php';
?>
<?php
// Check if Cancel button pressed
if (isset($_POST['btnCancel'])) {
    header('location: index.php');
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
    $sql_result = login($user, $password);

    

    // Reset variables
    $user = null;
    $password = null;

    // If login successful
    if ($sql_result === 1) { 
        // Get back current user data
        $id = $_SESSION['user_id'];
        $sql_result = getUserByID($id);
        $_SESSION['user_name'] = $sql_result['name'];

        // Redirect to home page
        header('Location: '.'index.php');
    }
}

// Require views
require_once VIEW_PATH.'login.view.php';

// footer
include_once VIEW_PATH.'common/footer.php';
?>
