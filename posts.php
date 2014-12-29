<div>
	<h3> All Blog Posts </h3>
</div>
<?php
require_once 'configs'.DIRECTORY_SEPARATOR.'config.inc.php';
require_once 'configs'.DS.'core.inc.php';
 
require_once VIEW_PATH.'common/header.php';
require_once VIEW_PATH.'common/navbar.php';
?>

<?php


$posts = getAllPosts();

displayAllPosts($posts);

// footer
require_once VIEW_PATH.'common'.DS.'footer.php';
?>
