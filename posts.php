<?php
require_once 'configs/config.inc.php';

$posts = getAllPosts();

displayAllPosts($posts);

?>
