<?php
// Initialize variables
$user = null;
$password = null;
$name = null;

if (isset($_POST['user']) && isset($_POST['password']) && isset($_POST['name'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    $sql_result = createacc($user, $password, $name);

    // Reset variables
    $user = null;
    $password = null;
    $name = null;
}
?>
<div class="CreateAccount" align="center">
<h6> Create a new account </h6>
<form action="<?php echo $current_file; ?>" method="POST">
<p> Username: <input type="text" name="user"> </p>
<p> Password: <input type="password" name="password"> </p>
<p> Name: <input type="text" name="name"> </p>
<p><input type="submit" value="Create Account"></p>
</form>
</div>
