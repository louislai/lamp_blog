<?php
function user_login($user, $password) {
    // Prepare database query
    $params = array  (
        array ($user, PDO::PARAM_STR),
        array ($password, PDO::PARAM_STR)
        );
    $sql = database_execute_query_and_fetch('SELECT *  FROM `blog_users` WHERE user = ? AND password = ?', $params);

    // Check query result
    if (is_null($sql) && $user && $password) {
        ?>
        <script type="text/javascript">

        alert('Invalid username/password combination.');
        </script>
        <?php
        return 0;
    } else if (isset($sql)) {
        echo 'ok';
        $user_id = $sql['id'];
        $_SESSION['user_id'] = $user_id;
        return 1;
    } else {
        echo 'Unknown error';
        return 0;
    }
}

function user_get_by_id($id) {
    // Prepare database query
    $params = array(
        array($id, PDO::PARAM_INT)
        );
    $sql = database_execute_query_and_fetch('SELECT * FROM `blog_users` WHERE id = ?', $params);

    // Return user
    return $sql;
}

function user_create($user, $password, $name) {
    if (!empty($user) && !empty($password) && !empty($name)) {
        $params = array (
            array($user, PDO::PARAM_STR),
            array($password, PDO::PARAM_STR),
            array($name, PDO::PARAM_STR)
            );
        $sql = database_execute_query('INSERT INTO `blog_users` (user, password, name) VALUES (?, ?, ?)', $params);
        ?>
        <script type="text/javascript">
        alert("Your account has been successfully created");
        </script>
        <?php
    }
}
