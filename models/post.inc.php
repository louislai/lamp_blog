<?php
function post_get_all() {
    $sql = 'SELECT `blog_posts`.title, `blog_posts`.id, content, create_date, update_date, author_id, `blog_posts`.id, `blog_users`.name AS author FROM `blog_posts` INNER JOIN `blog_users` ON `blog_posts`.author_id = `blog_users`.id ORDER BY update_date DESC';

    // Execute query and return all posts
    return database_execute_query_and_fetch($sql, array());
}

function post_get_by_id($id) {
    // Build database query
    $sql = 'SELECT `blog_posts`.title, `blog_posts`.id, content, create_date, update_date, author_id, `blog_posts`.id, `blog_users`.name AS author FROM `blog_posts` INNER JOIN `blog_users` ON `blog_posts`.author_id = `blog_users`.id WHERE `blog_posts`.id = ?';
    $params = array(
        array($id, PDO::PARAM_INT)
    );

    // Execute query and return the post
    return database_execute_query_and_fetch($sql, $params);
}

function post_get_by_author_id($id) {
    // Build database query
    $sql = 'SELECT `blog_posts`.title, `blog_posts`.id, content, create_date, update_date, author_id, `blog_posts`.id, `blog_users`.name AS author FROM `blog_posts` INNER JOIN `blog_users` ON `blog_posts`.author_id = `blog_users`.id WHERE author_id = ? ORDER BY update_date DESC';
    $params = array(
        array($id, PDO::PARAM_INT)
    );

    // Execute query and return all posts by author
    return database_execute_query_and_fetch($sql, $params);
}

function post_insert($title, $content, $author_id) {
    // Build database query
    $sql = 'INSERT INTO `blog_posts` (title, content, author_id, update_date) VALUES (?, ?, ?, now())';
    $params = array(
        array($title, PDO::PARAM_STR),
        array($content, PDO::PARAM_STR),
        array($author_id, PDO::PARAM_INT)
    );

    // Execute query and return no of posts affected
    return database_execute_query($sql, $params);
}

function post_update($title, $content, $id) {
    // Build database query
    $sql = 'UPDATE `blog_posts` SET title = ? , content = ?, update_date = now() WHERE id = ?';
    $params = array(
        array($title, PDO::PARAM_STR),
        array($content, PDO::PARAM_STR),
        array($id, PDO::PARAM_INT)
    );

    // Execute query and return no of posts affected
    return database_execute_query($sql, $params);
}

function post_delete($id) {
    // Build database query
    $sql = 'DELETE FROM `blog_posts` WHERE id = ?';
    $params = array(
        array($id, PDO::PARAM_INT)
    );

    // Delete post
    return database_execute_query($sql, $params);
}

function post_display($post, $isFullPost=false) {

// ul wrapper for viewpost
if ($isFullPost) { echo '<ul class = "view-post">';}
?>
<li>
    <div class="post-box">
        <h5>
            <?php if (!$isFullPost) { ?> <a href="viewpost.php?id=<?php echo $post['id']; ?>"> <?php } ?>
                <?php echo $post['title']?>
            <?php if (!$isFullPost) { ?> </a> <?php } ?>
        </h5>
        
        <p><small class="text-muted">
            <?php echo $post['update_date']?> by <?php echo $post['author']?></small>
        </p>
        
            <div <?php if (!$isFullPost) { echo 'class="post_read_more"'; } ?> >
                <?php echo $post['content'] ?> 
            </div>

    <?php
    
    // Check if user is post author
    if (isset($_SESSION['user_id']) && $post["author_id"] == $_SESSION['user_id']) {
?>
                <span>
                    <a href="updatepost.php?id=<?php echo $post['id']; ?>">Edit</a>
                    <a href="deletepost.php?id=<?php echo $post['id']; ?>"
                        onClick = "javascript: return confirm
                        ('Are you sure you want to delete?');">Delete</a>

                </span>
               
<?php
    }
?>
    </div>
</li>
<?php
if ($isFullPost) { echo '</ul>';}

// Display comments on full view

    if ($isFullPost) {
        $comments = comment_get_by_post_id($post['id']);
        comment_display_all($comments);
    }
}

?>

<?php
function post_search($keyword) {
    // Build database query
    $params = array(
        array($keyword, PDO::PARAM_STR)
    );
    $sql = 'SELECT `blog_posts`.title, content, create_date, update_date, author_id, `blog_posts`.id, `blog_users`.name AS author FROM `blog_posts` INNER JOIN `blog_users` ON `blog_posts`.author_id = `blog_users`.id WHERE MATCH (title, content) AGAINST (? IN BOOLEAN MODE) ORDER BY update_date DESC';

    // Execute query and return result
    return database_execute_query_and_fetch($sql, $params);
}

function post_display_all($posts) {
    if (isset($posts)) {
        if (isset($posts['title'])) {
        ?>
        <div class="holder"></div>
        <ul id="pagination">
            <?php
            post_display($posts);
            ?>
        </ul>
    <?php
        } else {
            ?>
    <!-- Page navigation panel -->
    <div class="holder"></div>
        <ul id="pagination">
            <?php
            foreach ($posts as $post) {

                post_display($post);
            }
        ?>
        </ul>
    <?php
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