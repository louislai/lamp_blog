<?php
require_once 'configs'.DIRECTORY_SEPARATOR.'config.inc.php';
require_once 'configs'.DS.'core.inc.php';

// Check the querystring for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {
    // Get id from querystring
    $id = $_GET['id'];

    // // Fetch row from database to validate
    $comment = comment_get_by_id($id);

    // Prevent unauthentic user
    if (!isset($_SESSION['user_id']) || ($_SESSION['user_id'] != $comment['author_id'])) {
        die($comment['author_id'] );
    }

    // Delete comment
    $sql_result = comment_delete($id);

    // Redirect to post page
    redirect_to('viewpost.php?id=' . $_SESSION['post_id']);
}
?>
