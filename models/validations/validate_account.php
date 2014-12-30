<?php
require_once '../../configs/config.inc.php';
require_once '../database.inc.php';
	$user = $_POST['username'];

	// Prepare query
	$params = array(
            array($user, PDO::PARAM_STR)
        );
        $sql = 'SELECT * FROM `blog_users` WHERE user = ?';

        // Get back no of row affected
        $result =  database_execute_query_and_fetch($sql, $params);

        echo $result;
?>
