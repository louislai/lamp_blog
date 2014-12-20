<?php
if (isset($_POST['user']) && isset($_POST['password'])) {
    $user = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['password']);
}
if (!empty($user) && !empty($password)) {
    try {
        $sql_query = $conn -> prepare("SELECT * FROM `blog_users` WHERE user = :user AND  password = :password");
        $sql_query -> bindValue(':user', $user, PDO::PARAM_STR);
        $sql_query -> bindValue(':password', $password, PDO::PARAM_STR);
        $sql_query -> execute();
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $data = $sql_query -> fetchAll();

    $query_num_rows = count($data);
    if ($query_num_rows == 0 && $user && $password) {
        echo 'Invalid username/password combination.';
    } else if ($query_num_rows == 1) {
        echo 'ok';
        $user_id = $data[0]['id'];
        $_SESSION['user_id'] = $user_id;
        $user = null;
        $password = null;
        header("Location:".$_SERVER['PHP_SELF']. " ");
    } else {
        echo 'You must supply a username and password';
    }
}
?>
<div align="center">
<h6> Log in </h6>
<form action="<?php echo $current_file; ?>" method="POST">
Username: <input type="text" name="user"> Password: <input type="password" name="password">
<input type="submit" value="Log in">
</form>
</div>
