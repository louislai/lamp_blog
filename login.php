<?php
// Set variables to POST data
if (isset($_POST['user']) && isset($_POST['password'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
}

// Execute query
if (!empty($user) && !empty($password)) {
    $params = array  (
        array ($user, PDO::PARAM_STR),
        array ($password, PDO::PARAM_STR)
    );
    $query_result = execute_query_and_fetch("SELECT *  FROM `blog_users` WHERE user = ? AND password = ?", $params);

    // Check query result
    if (is_null($query_result) && $user && $password) {
        echo 'Invalid username/password combination.';
    } else if (isset($query_result)) {
        echo 'ok';
        $user_id = $query_result['id'];
        $_SESSION['user_id'] = $user_id;
        $user = null;
        $password = null;
        header("Location:".$_SERVER['PHP_SELF']. " ");
    } else {
        echo 'You must supply a username and password';
    }
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
