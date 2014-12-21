<?php
// Initialize variables
$user = null;
$password = null;

// Set variables to POST data
if (isset($_POST['user']) && isset($_POST['password'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];

    // Do login action
    $sql_result = login($user, $password);

    // Reset variables
    $user = null;
    $password = null;
}
?>

<div class="Login">
<h4> Log in </h4>
<form action="<?php echo $current_file; ?>" method="POST">
<p>Username: <input type="text" name="user"> </p>
<p>Password: <input type="password" name="password"></p>
<p><input type="submit" value="Log in"></p>
</form>
</div>
