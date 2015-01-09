<!-- Load js file -->
<script src="assets/js/post_stash.js" type="text/javascript"></script>

<div class="col-md-8 col-md-offset-2" id="add-box">
    <div class="well wlform-box">
        <form action="<?php echo $current_file;?>" method="POST">
            <legend>Add a new post</legend>
            <div class="form-group">
                <label for="title">Title</label>
                <input id="ap_title" name="title"  type="text" <?php if ($stashed_title) { echo 'value="'.sanitize_output($stashed_title).'"'; } else { echo 'placeholder="Put your post title here"'; } ?>" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="ap_content" rows="10" name="content" class="form-control" <?php if (!$stashed_content) { echo 'placeholder="Put your post content here"'; } ?> required><?php if ($stashed_content) { echo sanitize_output($stashed_content); }?></textarea>
            </div>
            <div class="form-group text-center">
                
                <input id="ap_submit" type="submit" class="btn btn-success btn-login-submit" value="Add post" />
                <input type="submit" name="btnCancel" class="btn btn-danger btn-cancel-action" value="Cancel" formnovalidate/>
            </div>
        </form>
    </div>
</div>