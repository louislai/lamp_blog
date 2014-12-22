<?php require_once 'configs/config.inc.php'; ?>
<?php require_once 'configs/core.inc.php'; ?>
<?php include_once VIEW_PATH.'common/header.php'; ?>

<!-- Pushy Menu -->
<nav class="pushy pushy-left">
    <ul>
        <li><a href="#">Item 1</a></li>
        <li><a href="#">Item 2</a></li>
    </ul>
</nav>

<!-- Site Overlay -->
<div class="site-overlay"></div>

<!-- Your Content -->
<div id="container">
    <nav class="navbar">
    <!-- Menu Button -->
    <div class="menu-btn"> Toggle Sidebar</div>
    <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    </nav>
    <div class="container-fluid">
    <?php
include_once 'posts.php';

if (loggedin()) {
    $id = $_SESSION['user_id'];
    $sql_result = getUserByID($id);
    $name = $sql_result['name'];
    $userid = $sql_result['id'];
?>
<div class="alert alert-success" role="alert">
    <p> Welcome! <?php echo $name; ?> <a href="logout.php"><input type="button" value="Logout"/></a></p>
</div>
<?php
    include_once 'addpost.php';

} else {
    include_once 'login.php';
    include_once 'createacc.php';
}
?>
    </div>
</div>
<?php
include_once VIEW_PATH.'common/footer.php';
?>
