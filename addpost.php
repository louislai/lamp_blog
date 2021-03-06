<?php


require_once 'configs'.DIRECTORY_SEPARATOR.'config.inc.php';
require_once 'configs'.DS.'core.inc.php';
 
// Prevent anonymous user from adding post
if (!loggedin()) {
    die('You are not logged in');
}

require_once VIEW_PATH.'common'.DS.'header.php';
require_once VIEW_PATH.'common'.DS.'navbar.php';

// Obtained stashed unsaved post
$stashed_post = user_get_stashed_post($_SESSION['user_id']);
$stashed_title = $stashed_post['stored_title'];
$stashed_content = $stashed_post['stored_content'];

// Check if Cancel button pressed
if (isset($_POST['btnCancel'])) {
    redirect_to('index.php');
    exit();
}

// Initialize the variables
$title = null;
$content = null;
$author = null;

// Check for post back
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Check for field values
    if (isset($_POST['title']) && isset($_POST['content']) && $_POST['title'] != '' && $_POST['content'] != '') {
        // Set variables to POST data
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = (int) $_SESSION['user_id'];

        // Execute query and return result
        $sql_result = post_insert($title, $content, $author);

        //Reset the variables
        $title = null;
        $content = null;
        $author = null;
        ?>
        <script type="text/javascript">
            alert('Post added successfully');
        </script>
        <?php
    }
}

// Require view
require_once VIEW_PATH.'addpost.view.php';

// footer
require_once VIEW_PATH.'common'.DS.'footer.php';
?>
