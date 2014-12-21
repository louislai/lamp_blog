<?php
DEFINE('DEFAULT_CONTENT', 'Type here');
if (isset($_GET['title']) && isset($_GET['content']) &&$_GET['content'] != DEFAULT_CONTENT && $_GET['title'] != '' && $_GET['content'] != '') {
    // Set variables to GET data
    $title = $_GET['title'];
    $content = $_GET['content'];
    $author = (int) $_SESSION['user_id'];

    // Execute query
    $params = array(
        array($title, PDO::PARAM_STR),
        array($content, PDO::PARAM_STR),
        array($author, PDO::PARAM_INT)
    );
    $sql_result = execute_query("INSERT INTO `blog_posts` (title, content, author_id) VALUES (?, ?, ?)", $params);

    //Reset the variables
    $title = null;
    $content = null;
    $author = null;
    echo '<p>Post added successfully</p>';

} else if (isset($_GET['title']) || isset($content) ) {
    echo "<p>Please fill in all the required fields</p>";
} else {
NULL;
}

?>
    <div class="AddPost">
    <h4> Add a new Post </h4>
    <form action="<?php echo $current_file; ?>" method="GET">
    <p>Title: <input type="text" name="title"> </p>
    <p> Content <br> <textarea cols="40" rows="10" name="content"> <?php echo DEFAULT_CONTENT; ?>  </textarea> </p>
<p><input type="submit" value="Add post"></p>
</form>
</div>
