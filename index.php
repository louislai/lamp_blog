<?php
require 'resources/core.inc.php';
require 'resources/connection.inc.php';
if (loggedin()) {
    echo 'yo';
    $rightvar=$_SESSION['user_id'];
    $result = mysql_query("SELECT * FROM blog_users WHERE id = $rightvar") or die(mysql_error());
    $data = mysql_fetch_array($result);
    $name=$data['shortname'];
    $userid=$data['id'];
    echo 'Welcome! ' . $name . ' ' .'<a  href="resources/logout.inc.php"><input type="button"  value="Logout"/></a>';
}
else
{
    include 'resources/login.inc.php';
}
?>}
