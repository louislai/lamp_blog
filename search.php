<?php
require_once 'configs/config.inc.php';
require_once 'views/search.view.php';

// Initialize variables
$keyword = null;

// Check for postback
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $keyword = $_POST['keyword'];

    // Get matching posts
    $posts = searchPost($keyword);

    // Reset variable
    $keyword = null;

    // Display matching posts
    displayAllPosts($posts);
}
?>
