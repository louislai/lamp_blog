<?php
require 'resources/core.inc.php';
require 'resources/connection.inc.php';
echo '<link rel="stylesheet" href="assets/css/index.css" type="text/css">';
if (loggedin()) {
    $rightvar=$_SESSION['user_id'];
    try {
        $sql_query = $conn -> prepare('SELECT * FROM `blog_users` WHERE id = :id');
        $sql_query -> bindValue(':id', $rightvar, PDO::PARAM_INT);
        $sql_query -> execute();
    } catch (PDOException $e) {
        echo "Error!: ". $e ->getMessage() . "<br>";
        die();
    }
    $result = $sql_query -> fetchAll();
    $name = $result[0]['name'];
    $userid = $result[0]['id'];
    echo 'Welcome! ' . $name . ' ' .'<a  href="resources/logout.inc.php"><input type="button"  value="Logout"/></a>';
} else {
    include 'resources/login.inc.php';
    include 'resources/createacc.inc.php';
}
$conn = null;
?>
