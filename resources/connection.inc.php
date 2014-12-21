<?php
require_once('config.inc.php');
// Open database connection
try {

    $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    // set the PDO error mode to exception
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e)  {
    echo "conn failed: " . $e->getMessage();
    die();
}
?>
