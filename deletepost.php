<?php
require_once 'configs/config.inc.php';

// Check the querystring for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {
    // Get id from querystring
    $id = $_GET['id'];

    // Delete post
    $sql_result = deletePost($id);
}
?>
