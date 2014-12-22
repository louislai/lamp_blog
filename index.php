<?php require_once 'configs/config.inc.php'; ?>
<?php require_once 'configs/core.inc.php'; ?>
<?php include_once VIEW_PATH.'common/header.php'; ?>
<?php
if (loggedin()) {
    $id = $_SESSION['user_id'];
    $sql_result = getUserByID($id);
    $name = $sql_result['name'];
    $userid = $sql_result['id'];
?>
<div class="alert alert-success" role="alert">
    <p> Welcome! <?php echo $name; ?> <a href="controllers/logout.php"><input type="button" value="Logout"/></a></p>
</div>
<?php
    include_once CONTROLLER_PATH.'addpost.php';
} else {
    include_once CONTROLLER_PATH.'login.php';
    include_once CONTROLLER_PATH.'createacc.php';
}

include_once VIEW_PATH.'common/footer.php';
?>
