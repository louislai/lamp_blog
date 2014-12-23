<?php require_once 'configs/config.inc.php'; ?>
<?php require_once 'configs/core.inc.php'; ?>
<?php include_once VIEW_PATH.'common/header.php';
include_once VIEW_PATH.'common/navbar.php';
?>

<div id="container">
    <div class="container-fluid">
        <?php
        include_once 'posts.php';

        if (loggedin()) {
        $id = $_SESSION['user_id'];
        $sql_result = getUserByID($id);
        $name = $sql_result['name'];
        $userid = $sql_result['id'];
        require_once VIEW_PATH.'common/status.php';
        ?>

        <?php
        include_once 'addpost.php';

        } else {
        require_once VIEW_PATH.'common/status.php';

        include_once 'login.php';
        include_once 'createacc.php';
        }
        ?>
    </div>
</div>
<?php
include_once VIEW_PATH.'common/footer.php';
?>
