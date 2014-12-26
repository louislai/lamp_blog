<?php
function getAllPosts() {
    $sql = 'SELECT `blog_posts`.title, content, create_date, update_date, author_id, `blog_posts`.id, `blog_users`.name AS author FROM `blog_posts` INNER JOIN `blog_users` ON `blog_posts`.author_id = `blog_users`.id ORDER BY update_date DESC';

    // Execute query and return all posts
    return execute_query_and_fetch($sql, array());
}

function getPostById($id) {
    // Build database query
    $sql = 'SELECT `blog_posts`.title, content, create_date, update_date, author_id, `blog_posts`.id, `blog_users`.name AS author FROM `blog_posts` INNER JOIN `blog_users` ON `blog_posts`.author_id = `blog_users`.id WHERE `blog_posts`.id = ?';
    $params = array(
        array($id, PDO::PARAM_INT)
    );

    // Execute query and return the post
    return execute_query_and_fetch($sql, $params);
}

function getPostsByAuthorId($id) {
    // Build database query
    $sql = 'SELECT `blog_posts`.title, content, create_date, update_date, author_id, `blog_posts`.id, `blog_users`.name AS author FROM `blog_posts` INNER JOIN `blog_users` ON `blog_posts`.author_id = `blog_users`.id WHERE author_id = ? ORDER BY update_date DESC';
    $params = array(
        array($id, PDO::PARAM_INT)
    );

    // Execute query and return all posts by author
    return execute_query_and_fetch($sql, $params);
}

function insertPost($title, $content, $author_id) {
    // Build database query
    $sql = 'INSERT INTO `blog_posts` (title, content, author_id, update_date) VALUES (?, ?, ?, now())';
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
    $sql = 'UPDATE `blog_posts` SET title = ? , content = ?, update_date = now() WHERE id = ?';
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
    $sql = 'DELETE FROM `blog_posts` WHERE id = ?';
    $params = array(
        array($id, PDO::PARAM_INT)
    );

    // Delete post
    return execute_query($sql, $params);
}

function displayPost($post) {
?>
    <div class="post-box">
        <h5> <?php echo $post['title']?></h5>
        <p><small class="text-muted">
            <?php echo $post['update_date']?> by <?php echo $post['author']?></small>
        </p>
        
            <article><?php echo $post['content'] ?> </article>

<?php

    // Check if user is post author
    if (isset($_SESSION['user_id']) && $post["author_id"] == $_SESSION['user_id']) {
?>
                <span>
                    <a href="updatepost.php?id=<?php echo $post['id']; ?>">Edit</a>
                    <a href="deletepost.php?id=<?php echo $row['id']; ?>"
                        onClick = "javascript: return confirm
                        ('Are you sure you want to delete?');">Delete</a>

                    </span>
                
<?php
    }
?>
    </div>
<?php
}

?>

<?php
function searchPost($keyword) {
    // Build database query
    $params = array(
        array($keyword, PDO::PARAM_STR)
    );
    $sql = 'SELECT `blog_posts`.title, content, create_date, update_date, author_id, `blog_posts`.id, `blog_users`.name AS author FROM `blog_posts` INNER JOIN `blog_users` ON `blog_posts`.author_id = `blog_users`.id WHERE MATCH (title, content) AGAINST (? IN BOOLEAN MODE) ORDER BY update_date DESC';

    // Execute query and return result
    return execute_query_and_fetch($sql, $params);
}

function displayAllPosts($posts) {
    if (isset($posts)) {
        if (isset($posts['title'])) {
            displayPost($posts);
        } else {
            foreach ($posts as $post) {

                displayPost($post, true);
            }
        }
    } else {
?>
                
                <div class="post-box">
                    <p> No posts found :( </p>
                </div>
<?php
    }
}

?>
