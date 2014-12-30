<?php
require_once 'configs'.DIRECTORY_SEPARATOR.'config.inc.php';
require_once 'configs'.DS.'core.inc.php';
 
require_once VIEW_PATH.'common'.DS.'header.php';
require_once VIEW_PATH.'common'.DS.'navbar.php';

// Check if Cancel button pressed
if (isset($_POST['btnCancel'])) {
    redirect_to('index.php');
    exit();
}


// Check the query string for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {
    

    // Initialize FORM values
    $title = null;
    $content = null;

    // Get id from query string
    $id = $_GET['id'];

    // Fetch row from database
    $row = post_get_by_id($id);

    // Set form values
    $title = $row['title'];
    $content = $row['content'];
}

// Check for page postback
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // If Update button pressed
    if (isset($_POST['btnUpdate'])) {
    // Get user input from form
        $title = $_POST['title'];
        $content = $_POST['content'];

    // Update post
        $sql_result = post_update($title, $content, $id);

    // Reset variables
        $title = null;
        $content = null;

    // Redirect to index page
        redirect_to('index.php');
        exit();
    }
}

// Require view
require_once VIEW_PATH.'post_update.view.php';

// footer
require_once VIEW_PATH.'common'.DS.'footer.php';
?>
