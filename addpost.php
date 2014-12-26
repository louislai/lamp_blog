<?php
require_once 'configs/config.inc.php';
require_once 'configs/core.inc.php';
 
include_once VIEW_PATH.'common/header.php';
include_once VIEW_PATH.'common/navbar.php';


// Initialize the variables
$title = null;
$content = null;
$author = null;

// Check for post back
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Check if all fields keyed in
    if (isset($_POST['title']) && isset($_POST['content']) && $_POST['title'] != '' && $_POST['content'] != '') {
        // Set variables to POST data
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = (int) $_SESSION['user_id'];

        // Execute query and return result
        $sql_result = insertPost($title, $content, $author);

        //Reset the variables
        $title = null;
        $content = null;
        $author = null;
        ?>
        <script type="text/javascript">
            alert('<p>Post added successfully</p>');
        </script>
        <?php

    } else if (isset($_POST['title']) || isset($content) ) {
        echo "<p>Please fill in all the required fields</p>";
    } else {
NULL;
    }
}

// Require view
require_once VIEW_PATH.'addpost.view.php';

// footer
include_once VIEW_PATH.'common/footer.php';
?>
