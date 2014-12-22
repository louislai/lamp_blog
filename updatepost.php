<?php
require_once 'includes/config.inc.php';

// Check the query string for a numeric id
if (isset($_GET['id']) && intval($_GET['id']) > 0) {

    // Initialize FORM values
    $title = null;
    $content = null;

    // Get id from query string
    $id = $_GET['id'];

    // Fetch row from database
    $row = get_post_by_id($id);

    // Set form values
    $title = $row['title'];
    $content = $row['content'];
}

// Check for page postback
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input from form
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Update post
    $sql_result = update_post($title, $content, $id);

    // Reset variables
    $title = null;
    $content = null;
}
?>

<div class="container">
        <h4>Update Post</h4><hr />
        <form method="POST" action="<?php
echo sanitize_output($_SERVER['REQUEST_URI']);?>">
            <p>
                <label for="title">Title</label><br />
                <input id="title" name="title" type="text" value="<?php
    echo sanitize_output($title); ?>" autofocus/></p>
            <p>
                <label for="content">Content</label><br />
                <textarea id="content" name="content"><?php
    echo sanitize_output($content);?></textarea></p>
            <p>
                <input type="submit"/></p>
        </form>
    </div>
