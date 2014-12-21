<?php
function open_database() {
    // Set global variable scope
    global $conn;

    // Open database connection and select database
    try {
        $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        // set the PDO error mode to exception
        $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e)  {
        echo "conn failed: " . $e->getMessage();
        die();
    }
}

function close_database() {
    // Set global variable scope
    global $conn;

    // Close database connection
    if (isset($conn)) {
        $conn = null;
    }
}

function execute_query($query, $params) {
    // Get connection from global scope
    global $conn;
    // Open database connection
    open_database();

    // Execute database query
    try {
        $sql_query = $conn -> prepare($query);
        for ($i = 1; $i <= count($params); $i++) {
            $sql_query -> bindValue($i, $params[$i-1][0], $params[$i-1][1]);
        }
        $sql_query -> execute();
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }
    // Save the number of rows affected
    $result = $sql_query -> rowCount();
    // Close database connection
    close_database();
    return $result;
}

function execute_query_and_fetch($query, $params) {
    // Get connection from global scope
    global $conn;
    // Open database connection
    open_database();

    // Execute database query
    try {
        $sql_query = $conn -> prepare($query);
        for ($i = 1; $i <= count($params); $i++) {
            $sql_query -> bindValue($i, $params[$i-1][0], $params[$i-1][1]);
        }
        $sql_query -> execute();
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }
    $data = $sql_query -> fetchAll();
    $query_num_rows = count($data);

    // Manipulate returned data
    if ($query_num_rows == 0) {
        $result = null;
    } else if ($query_num_rows == 1) {
        $result = $data[0];
    } else {
        $result = $data;
    }

    // Close database connection
    close_database();
    return $result;
}
?>
