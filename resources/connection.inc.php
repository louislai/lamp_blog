<?php
//:Initialize database credentials
$host = 'localhost';
$dbuser = 'root';
$dbpassword = '123456';
$dbname = 'louis_blog';

// Open database conn
try {

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbuser, $dbpassword);
    // set the PDO error mode to exception
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e)  {
    echo "conn failed: " . $e->getMessage();
    die();
}
?>
