<?php
require_once 'configs/config.inc.php';

$posts = getAllPosts();

if (isset($posts)) {
    if (isset($posts['title'])) {
        displayPost($posts);
    } else {
        foreach ($posts as $post) {
            displayPost($post, true);
        }
    }
}
?>
