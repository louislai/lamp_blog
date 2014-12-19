<?php
//:Initialize database credentials
$host = 'localhost';
$user = 'root';
$password = '123456';
$dbname = 'louis_blog';

// Open database conn
/*try {

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    // set the PDO error mode to exception
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e)  {
    echo "conn failed: " . $e->getMessage();
}*/
$dbc = mysql_connect($host, $user, $password) or  die("Cant connect :" . mysql_error());

mysql_select_db($dbname, $dbc)
    or
    die("Cant connect :" . mysql_error());

?>
