<div>
	<h3> All Blog Posts </h3>
</div>
<?php
require_once 'configs/config.inc.php';
require_once 'configs/core.inc.php';
?>

<?php 
include_once VIEW_PATH.'common/header.php';
include_once VIEW_PATH.'common/navbar.php';
?>

<?php


$posts = getAllPosts();

displayAllPosts($posts);

// footer
include_once VIEW_PATH.'common/footer.php';
?>
