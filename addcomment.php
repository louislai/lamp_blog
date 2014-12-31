<?php


require_once 'configs'.DIRECTORY_SEPARATOR.'config.inc.php';
require_once 'configs'.DS.'core.inc.php';

// Prevent unauthenticated access
if (!loggedin()) {
	die('Does not permit direct access');
}

// View
require_once VIEW_PATH . 'addcomment.view.php';

// Initialize variables
$comment = null;
$author_id = null;
$post_id = null;

// Check for postback of comment
if ($_SERVER['REQUEST_METHOD']  == 'POST' && isset($_POST['comment'])) {
	// Prepare variables
	$comment = $_POST['comment'];
	$author_id = $_SESSION['user_id'];
	$post_id = $_SESSION['post_id'];

	// Insert comment
	$result = comment_insert($comment, $post_id, $author_id);

	// Reset variable
	$comment = null;
	$author_id = null;
	$post_id = null;

	// Redirect to post page
    redirect_to('viewpost.php?id=' . $_SESSION['post_id']);
}