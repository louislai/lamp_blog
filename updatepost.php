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
    $post = post_get_by_id($id);

    // Prevent unauthentic user
    if (!isset($_SESSION['user_id']) || ($_SESSION['user_id'] != $post['author_id'])) {
        die('Not owner of post');
    }
    // Set form values
    $title = $post['title'];
    $content = $post['content'];
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
require_once VIEW_PATH.'updatepost.view.php';

// footer
require_once VIEW_PATH.'common'.DS.'footer.php';
?>
