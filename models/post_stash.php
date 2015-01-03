<?php
require_once '../configs/config.inc.php';
require_once '../configs/core.inc.php';
require_once 'database.inc.php';


// Check if logged in
if (loggedin()) {
// Handle action depending on post data
	if (isset($_POST['title'])) {

		user_stash_post_title($_SESSION['user_id'], $_POST['title'] ?: null);
	} else if (isset($_POST['content'])) {
		user_stash_post_content($_SESSION['user_id'], $_POST['content'] ?: null);
	} else {
		null;
	}
}




