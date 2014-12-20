<?php
if (isset($_POST['user']) && isset($_POST['password']) && isset($_POST['name'])) {
    $user = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['password']);
    $name = htmlspecialchars($_POST['name']);
}
if (!empty($user) && !empty($password) && !empty($name)) {
    try {
        $sql_query = $conn -> prepare("INSERT INTO `blog_users` (user, password, name) VALUES (:user, :password, :name)");
        $sql_query -> bindValue(':user', $user, PDO::PARAM_STR);
        $sql_query -> bindValue(':password', $password, PDO::PARAM_STR);
        $sql_query -> bindValue(':name', $name, PDO::PARAM_STR);
        $sql_query -> execute();
        header('Location: '.$http_referer);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

?>
<div align="center">
<h6> Create a new account </h6>
<form action="<?php echo $current_file; ?>" method="POST">
<p> Username: <input type="text" name="user"> </p>
<p> Password: <input type="password" name="password"> </p>
<p> Name: <input type="text" name="name"> </p>
<p><input type="submit" value="Create Account"></p>
</form>
</div>
