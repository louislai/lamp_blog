<nav>
    <ul>
    	<li><a href="index.php">Home</a></li>
        <li><a href="posts.php">All Posts</a></li>
        
<?php
        // Check logged in
if (loggedin()) {
?>
        <li><a href="userposts.php">View your posts</a></li>
        <li><a href="addpost.php">Add a new post</a></li>
<?php
} else {?>
		<li class="btn-login"><a href="login.php">Login</a></li>
        <li><a href="createacc.php">Register</a></li>
 <?php } ?>
        <li><a href="search.php">Search posts</a></li>
<?php
if (loggedin()) {
?>
        <li><a href="logout.php">Logout</a></li>
<?php
} ?>

    </ul>
</nav>

<hr>
<?php
require_once VIEW_PATH.'common/status.php';
?>
