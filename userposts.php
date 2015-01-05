<?php
require_once 'configs'.DIRECTORY_SEPARATOR.'config.inc.php';
require_once 'configs'.DS.'core.inc.php';
 
require_once VIEW_PATH.'common'.DS.'header.php';
require_once VIEW_PATH.'common'.DS.'navbar.php';
?>

<?php


// Check the query string for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {
	$id = $_GET['id'];

	// Fetch user details
	$user = user_get_by_id($id);
	echo '<div><h3> Blog Posts by ' . sanitize_output($user['name']) . '</h3></div>';

	// Display posts
    $posts = post_get_by_author_id($id);
    post_display_all($posts);
} 

// footer
require_once VIEW_PATH.'common'.DS.'footer.php';
?>
