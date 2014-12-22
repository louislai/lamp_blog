<?php
function getAllPosts() {
    $sql = "SELECT * FROM `blog_posts`";

    // Execute query and return all posts
    return execute_query_and_fetch($sql, array());
}

function getPostById($id) {
    // Build database query
    $sql = "SELECT `blog_posts`.title, content, create_date, update_date, author_id, `blog_posts`.id, `blog_users`.name AS author FROM `blog_posts` INNER JOIN `blog_users` ON `blog_posts`.author_id = `blog_users`.id WHERE `blog_posts`.id = ?";
    $params = array(
        array($id, PDO::PARAM_INT)
    );

    // Execute query and return the post
    return execute_query_and_fetch($sql, $params);
}

function getPostsByAuthorId($id) {
    // Build database query
    $sql = "SELECT * FROM `blog_post` WHERE author_id = ?";
    $params = array(
        array($id, PDO::PARAM_INT)
    );

    // Execute query and return all posts by author
    return execute_query_and_fetch($sql, $params);
}

function insertPost($title, $content, $author_id) {
    // Build database query
    $sql = "INSERT INTO `blog_posts` (title, content, author_id) VALUES (?, ?, ?)";
    $params = array(
        array($title, PDO::PARAM_STR),
        array($content, PDO::PARAM_STR),
        array($author_id, PDO::PARAM_INT)
    );

    // Execute query and return no of posts affected
    return execute_query($sql, $params);
}

function updatePost($title, $content, $id) {
    // Build database query
    $sql = "UPDATE `blog_posts` SET title = ? , content = ? WHERE id = ?";
    $params = array(
        array($title, PDO::PARAM_STR),
        array($content, PDO::PARAM_STR),
        array($id, PDO::PARAM_INT)
    );

    // Execute query and return no of posts affected
    return execute_query($sql, $params);
}

function deletePost($id) {
    // Build database query
    $sql = "DELETE FROM `blog_posts` WHERE id = ?";
    $params = array(
        array($id, PDO::PARAM_INT)
    );

    // Delete post
    return execute_query($sql, $params);
}

function displayPost($post, $isFullPost) {
?>
    <body>
    <div class="panel panel-primary">
        <div class="panel-title"><?php echo $post['title']?></div>
        <div class="panel-body">
        <p>Posted on <?php echo $post['create_date']?>  Last editted on <?php echo $post['update_date']?></p>
        <p>By <?php echo $post['author']?></p>
<?php
    if ($isFullPost) {
        echo '<p>'.$post['content'].'<br>';
    } else {
        echo '<p>'.$post['content'].'</p>';
        echo '<p><a href="viewpost.php?id='.$post['id'].
            '">Read more</a></p>';
    }

    // Check if logged in user is author
    //if ($post['author_id'] == $_SESSION['user_id']) {
?>
    <a href="updatepost.php?id=<?php echo $post['id']; ?>">Update</a>
            <a href="deletepost.php?id=<?php echo $row['id']; ?>"
                onClick = "javascript: return confirm
                ('Are you sure you want to delete?');">Delete</a>
<?php
    //}
    echo '</p>';
    echo '</div></div></body></html>';
}
?>
