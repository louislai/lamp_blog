<?php
if (isset($_POST['user']) && isset($_POST['password'])) {
    $user = $_POST['user'];
    $password = $_POST['password'];
}
if (!empty($user) && !empty($password)) {
    $query = mysql_query("SELECT * FROM `blog_users` where user = '".$user."' and password = '".$password."'")
    or die(mysql_error());
}
$data = mysql_fetch_array($query);

$test = $data['password'];
echo '234'.$test.'<br>';
$query_run=$query;
$query_num_rows = mysql_num_rows($query_run);
if ($query_num_rows == 0) {
    echo 'Invadid username/password combination.';
} else if ($query_num_rows==1) {
    echo 'ok';
    $user_id = mysql_result($query_run,0,'id');
    $user_id = $data['id'];
    $_SESSION['user_id'] = $user_id;
    header("Location:".$_SERVER['PHP_SELF']. " ");
} else {
    echo 'You must supply a username and password';
}
?>
<div align="center">
<form action="<?php echo $current_file; ?>" method="POST">
Username: <input type="text" name="user"> Password: <input type="password" name="password">
<input type="submit" value="Log in">
</form>
</div>
