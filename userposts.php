<?php
require_once 'configs'.DIRECTORY_SEPARATOR.'config.inc.php';
require_once 'configs'.DS.'core.inc.php';
 
require_once VIEW_PATH.'common'.DS.'header.php';
require_once VIEW_PATH.'common'.DS.'navbar.php';
?>

<?php

if (isset($_SESSION['user_id'])) {
    $posts = post_get_by_author_id($_SESSION['user_id']);

    post_display_all($posts);
}

// footer
require_once VIEW_PATH.'common'.DS.'footer.php';
?>
