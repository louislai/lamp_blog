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
