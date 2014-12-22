<?php
require_once '../configs/config.inc.php';
require_once '../configs/core.inc.php';
// Check the query string for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {
    // Get id from querystring
    $id = $_GET['id'];

    // Fetch post
    $post = getPostById($id);
    displayPost($post, true);
}
?>
