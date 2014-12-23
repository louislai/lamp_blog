<?php
require_once 'configs/config.inc.php';
require_once 'configs/core.inc.php';
?>

<?php
include_once VIEW_PATH.'common/header.php';
include_once VIEW_PATH.'common/navbar.php';
?>

<?php

if (isset($_SESSION['user_id'])) {
    $posts = getPostsByAuthorId($_SESSION['user_id']);

    displayAllPosts($posts);
}

// footer
include_once VIEW_PATH.'common/footer.php';
?>
