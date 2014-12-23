<?php
require_once 'configs/config.inc.php';
require_once 'configs/core.inc.php';

include_once VIEW_PATH.'common/header.php';
include_once VIEW_PATH.'common/navbar.php';

// Check the query string for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {

    // Initialize FORM values
    $title = null;
    $content = null;

    // Get id from query string
    $id = $_GET['id'];

    // Fetch row from database
    $row = getPostById($id);

    // Set form values
    $title = $row['title'];
    $content = $row['content'];
}

// Check for page postback
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input from form
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Update post
    $sql_result = updatePost($title, $content, $id);

    // Reset variables
    $title = null;
    $content = null;

    // Redirect to index page
    header('location: index.php');
    exit();
}

// Require view
require_once VIEW_PATH.'updatepost.view.php';

// footer
include_once VIEW_PATH.'common/footer.php';
?>
