<?php require_once 'configs/config.inc.php'; ?>
<?php require_once 'configs/core.inc.php'; ?>
<?php include_once VIEW_PATH.'common/header.php'; ?>

<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Start Bootstrap
                </a>
            </li>
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li>
                <a href="#">Shortcuts</a>
            </li>
            <li>
                <a href="#">Overview</a>
            </li>
            <li>
                <a href="#">Events</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Services</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
                </ul>
     </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="container-fluid">
<?php

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
    <!-- /#page-content-wrapper -->
</div>
</div>
<!-- /#wrapper -->

<?php
include_once VIEW_PATH.'common/footer.php';
?>
