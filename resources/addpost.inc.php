<?php
if (isset($_GET['title']) && isset($_GET['content'])) {
    try {
        $title = htmlspecialchars($_GET['title']);
        $content = htmlspecialchars($_GET['content']);
        $author = $_SESSION['user_id'];
        $sql_query = $conn -> prepare('INSERT INTO `blog_posts` (title, content, author_id) VALUES (:title, :content, :author)');
        $sql_query -> bindValue(':title', $title, PDO::PARAM_STR);
        $sql_query -> bindValue(':content', $content, PDO::PARAM_STR);
        $sql_query -> bindValue(':author', $author, PDO::PARAM_INT);
        $sql_query -> execute();
        echo 'Post added successfully';
    } catch (PDOException $e) {

        echo "Connection failed: ". $e -> getMessage();
        die();
}
} else {
    echo "Please fill in all the required fields";
    }

?>
    <div class="AddPost">
    <h4> Add a new Post </h4>
    <form action="<?php echo $current_file; ?>" method="GET">
    <p>Title: <input type="text" name="title"> </p>
<p> Content <br> <textarea cols="40" rows="10" name="content"> Type here </textarea> </p>
<p><input type="submit" value="Add post"></p>
</form>
</div>
