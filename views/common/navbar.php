<nav>
    <ul>
    	<li><a href="index.php">Home</a></li>
        
<?php
        // Check logged in
if (loggedin()) {
?>
        <li><a href="userposts.php?id=<?php echo $_SESSION['user_id']; ?>">View your posts</a></li>
        <li><a href="addpost.php">Add a new post</a></li>
<?php
} else {?>
		<li class="btn-login"><a href="login.php">Log in</a></li>
        <li><a href="createacc.php">Register</a></li>
 <?php } ?>
        <li><a href="search.php">Search posts</a></li>
<?php
if (loggedin()) {
?>
        <li><a href="logout.php">Log out</a></li>
<?php
} ?>

    </ul>
</nav>

<hr>
<?php
require_once VIEW_PATH.'common/status.php';
?>
