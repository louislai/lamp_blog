<?php
require_once 'configs'.DIRECTORY_SEPARATOR.'config.inc.php';
require_once 'configs'.DS.'core.inc.php';

require_once VIEW_PATH.'common'.DS.'header.php';
require_once VIEW_PATH.'common'.DS.'navbar.php';


$id = null;


// Check the query string for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {
    // Get id from querystring
	$id = $_GET['id'];

	// Set current post in SESSION
	$_SESSION['post_id'] = $id;


    // Fetch post
	$post = post_get_by_id($id);
	post_display($post, true);  

	
	// For adding new comments
	require_once 'addcomment.php';

}



// footer
require_once VIEW_PATH.'common'.DS.'footer.php';
?>
