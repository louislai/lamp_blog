<?php
require_once('Parsedown.php');

function render_comment($content) {
    $renderer = new Parsedown();
    $renderer->setMarkupEscaped(true);
    return $renderer->text($content);
}

function comment_insert($comment, $post_id, $author_id) {
	// Build database query
    $sql = 'INSERT INTO `blog_comments` (comment, post_id, author_id, create_date) VALUES (?, ?, ?, now())';
    $params = array(
        array($comment, PDO::PARAM_STR),
        array($post_id, PDO::PARAM_INT),
        array($author_id, PDO::PARAM_INT)
        );

    // Execute query and return no of rows affected
    return database_execute_query($sql, $params);
}

function comment_delete($id) {
    // Build database query
    $sql = 'DELETE FROM `blog_comments` WHERE id = ?';
    $params = array(
        array($id, PDO::PARAM_INT)
        );

    // Delete comment
    return database_execute_query($sql, $params);
}

function comment_get_by_id($id) {
    // Build database query
    $sql = 'SELECT c.id, c.comment, c.post_id, c.author_id, c.create_date, u.id AS user_id, u.name AS author 
    FROM `blog_comments` AS c 
    INNER JOIN `blog_users` AS u 
    ON c.author_id = u.id
    WHERE c.id = ?';
    
    $params = array(
        array($id, PDO::PARAM_INT)
    );

    // Execute query and return the post
    return database_execute_query_and_fetch($sql, $params);
}

function comment_get_by_post_id($post_id) {
	// Build database query
    $sql = 'SELECT c.id, c.comment, c.post_id, c.author_id, c.create_date, u.id AS user_id, u.name AS author 
    FROM `blog_comments` AS c 
    INNER JOIN `blog_users` AS u 
    ON c.author_id = u.id
    WHERE c.post_id = ?
    ORDER BY create_date DESC';
    $params = array(
    	array($post_id, PDO::PARAM_INT)
    	);

    // Execute query and return all comments for post
    return database_execute_query_and_fetch($sql, $params);
}

function comment_display($comment) {
	?>
	
  <div class="comment-box">

    <div>
        <?php echo render_comment(strip_tags($comment['comment'])) ?> 
    </div>
    <hr>
    <p>
      <small class="text-muted">
         Comment by <a href="userposts.php?id=<?php echo sanitize_output($comment['author_id']); ?>"><?php echo sanitize_output($comment['author'])?></a> on <?php echo sanitize_output($comment['create_date'])?>
     </small>
 </p>
 <?php
 
    // Check if user is comment author
    if (isset($_SESSION['user_id']) && sanitize_output($comment["author_id"]) == $_SESSION['user_id']) {
    ?>
    
    <span>

        <a class="btn btn-danger" href="deletecomment.php?id=<?php echo sanitize_output($comment['id']); ?>"
            onClick = "javascript: return confirm
            ('Are you sure you want to delete?');"><span class="glyphicon glyphicon-trash" aria-hidden="true"> </span> Delete</a>

        </span>
    


        <?php
    }
    ?>
    </div>
</div>
    <?php
}

function comment_display_all($comments) {
    echo '<hr><hr><h4> Comments</h4>';
    echo '<div id="comment-holder">';
    if (isset($comments)) {
        if (isset($comments['comment'])) {
            comment_display($comments);
        } else {
            foreach ($comments as $comment) {
                comment_display($comment);
            }
        }
    } else { 
 ?>
     <div class="comment-box">
        <p> No comments found. 
        
        <?php 
        if (loggedin()) {
            echo 'You can be the first to comment.';
        } else {
            echo 'Please log in to comment.';
        }
        ?> 
        </p>
    </div>
</div>
<?php
}
}