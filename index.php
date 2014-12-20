<?php
require 'resources/core.inc.php';
require 'resources/connection.inc.php';
if (loggedin()) {
    echo 'yo';
    $rightvar=$_SESSION['user_id'];
    try {
        $stmt = $conn -> prepare('SELECT * FROM `blog_users` WHERE id = :id');
        $stmt -> bindValue(':id', $rightvar, PDO::PARAM_INT);
        $stmt -> execute();
    } catch (PDOException $e) {
        echo "Error!: ". $e ->getMessage() . "<br>";
        die();
    }
    $result = $stmt -> fetchAll();
    $name = $result[0]['shortname'];
    $userid = $result[0]['id'];
    echo 'Welcome! ' . $name . ' ' .'<a  href="resources/logout.inc.php"><input type="button"  value="Logout"/></a>';
}
else
{
    include 'resources/login.inc.php';
}
$conn = null;
?>}
