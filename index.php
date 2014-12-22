<?php require_once 'includes/config.inc.php'; ?>
<?php require INCLUDE_PATH.'core.inc.php'; ?>
<?php require INCLUDE_PATH.'connection.inc.php'; ?>
<?php include_once TEMPLATE_PATH.'header.php'; ?>
<?php
if (loggedin()) {
    $rightvar=$_SESSION['user_id'];
    try {
        $sql_query = $conn -> prepare('SELECT * FROM `blog_users` WHERE id = :id');
        $sql_query -> bindValue(':id', $rightvar, PDO::PARAM_INT);
        $sql_query -> execute();
    } catch (PDOException $e) {
        echo 'Error!: '. $e ->getMessage() . '<br>';
        die();
    }
    $result = $sql_query -> fetchAll();
    $name = $result[0]['name'];
    $userid = $result[0]['id'];
?>
<div class="alert alert-success" role="alert">
    <p> Welcome! <?php echo $name; ?> <a href="logout.php"><input type="button" value="Logout"/></a></p>
</div>
<?php
    include_once SITE_ROOT.'addpost.php';
} else {
    include SITE_ROOT.'login.php';
    include SITE_ROOT.'createacc.php';
}
$conn = null;

include_once TEMPLATE_PATH.'footer.php';
?>
