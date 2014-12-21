<?php
if (isset($_POST['user']) && isset($_POST['password']) && isset($_POST['name'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
    $name = $_POST['name'];
}
if (!empty($user) && !empty($password) && !empty($name)) {
    $params = array (
        array($user, PDO::PARAM_STR),
        array($password, PDO::PARAM_STR),
        array($name, PDO::PARAM_STR)
    );
    $query_result = execute_query("INSERT INTO `blog_users` (user, password, name) VALUES (?, ?, ?)", $params);
    header('Location: '.$http_referer);
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
