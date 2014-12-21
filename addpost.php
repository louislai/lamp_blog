<?php
// Define default content
DEFINE('DEFAULT_CONTENT', 'Type here');

// Initialize the variables
$title = null;
$content = null;
$author = null;

// Check for post back
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Check if all fields keyed in
    if (isset($_POST['title']) && isset($_POST['content']) &&$_POST['content'] != DEFAULT_CONTENT && $_POST['title'] != '' && $_POST['content'] != '') {
        // Set variables to POST data
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = (int) $_SESSION['user_id'];

        // Execute query and return result
        $sql_result = insert_post($title, $content, $author);

        //Reset the variables
        $title = null;
        $content = null;
        $author = null;
        echo '<p>Post added successfully</p>';

    } else if (isset($_POST['title']) || isset($content) ) {
        echo "<p>Please fill in all the required fields</p>";
    } else {
NULL;
    }
}

?>
<div class="container AddPost">
    <h3> Add a new Post </h3>
    <form action="<?php echo $current_file; ?>" method="POST">
    <p>
        <label for "title">Title: </label>
        <input type="text" name="title">
    </p>

    <p>
        <label for "content">Content </label><br>
        <textarea id = "content" cols="40" rows="10" name="content"> <?php echo DEFAULT_CONTENT; ?>  </textarea>
    </p>

    <p><input type="submit" value="Add post"></p>
</form>
</div>
