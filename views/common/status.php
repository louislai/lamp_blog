<?php
// Context-based statusbar
if (loggedin()) {
?>
<div class="alert alert-success" role="alert">
            <p> Welcome! <?php echo $_SESSION['user_name']; ?> </p>
        </div>
<?php
} else {
?>
<div class="alert alert-info" role="alert">
            <p> You are not logged in. You can login or register for a new account</p>
        </div>
<?php
}
?>
