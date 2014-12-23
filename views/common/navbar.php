<nav>
    <ul>
        <li><a href="#">Login</a></li>
        <li><a href="#">Register</a></li>
        <li><a href="#">View all posts</a></li>
<?php
        // Check logged in
if (loggedin()) {
?>
        <li><a href="#">View your posts</a></li>
<?php
} ?>
        <li><a href="#">Search posts</a></li>
<?php
if (loggedin()) {
?>
        <li><a href="logout.php">Logout</a></li>
<?php
} ?>

    </ul>
</nav>

<hr>
