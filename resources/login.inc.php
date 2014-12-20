<?php
if (isset($_POST['user']) && isset($_POST['password'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
}
if (!empty($user) && !empty($password)) {
    try {
        $stmt = $conn -> prepare("SELECT * FROM `blog_users` WHERE user = :user AND  password = :password");
        $stmt -> bindValue(':user', $user, PDO::PARAM_STR);
        $stmt -> bindValue(':password', $password, PDO::PARAM_STR);
        $stmt -> execute();
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $data = $stmt -> fetchAll();

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
<form action="<?php echo $current_file; ?>" method="POST">
Username: <input type="text" name="user"> Password: <input type="password" name="password">
<input type="submit" value="Log in">
</form>
</div>
