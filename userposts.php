<?php
require_once 'configs'.DIRECTORY_SEPARATOR.'config.inc.php';
require_once 'configs'.DS.'core.inc.php';
 
require_once VIEW_PATH.'common'.DS.'header.php';
require_once VIEW_PATH.'common'.DS.'navbar.php';
?>

<?php

if (isset($_SESSION['user_id'])) {
    $posts = getPostsByAuthorId($_SESSION['user_id']);

    displayAllPosts($posts);
}

// footer
require_once VIEW_PATH.'common'.DS.'footer.php';
?>
