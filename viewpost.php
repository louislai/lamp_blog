<?php
require_once 'includes/config.inc.php';
// Check the query string for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {
    // Get id from querystring
    $id = $_GET['id'];

    // Fetch post
    $post = get_post_by_id($id);
    display_post($post, true);
}
?>
