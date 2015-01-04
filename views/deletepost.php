<?php
require_once 'configs'.DIRECTORY_SEPARATOR.'config.inc.php';
require_once 'configs'.DS.'core.inc.php';

// Check the querystring for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {
    // Get id from querystring
    $id = $_GET['id'];

    // // Fetch row from database to validate
    $post = post_get_by_id($id);

    // Prevent unauthentic user
    if (!isset($_SESSION['user_id']) || ($_SESSION['user_id'] != $post['author_id'])) {
        die('Not owner of post');
    }

    // Delete post
    $sql_result = post_delete($id);

    // Redirect to home page
    redirect_to('index.php');
}
?>
