<!-- Load js file -->
<script src="assets/js/post_stash.js" type="text/javascript"></script>

<div class="col-md-8 col-md-offset-2" id="add-box">
    <div class="well wlform-box">
        <form action="<?php echo $current_file;?>" method="POST">
            <legend>Add a new post</legend>
            <div class="form-group">
                <label for="title">Title</label>
                <input id="ap_title" name="title"  type="text" value="<?php echo $stashed_title ?: ''; ?>" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="ap_content" rows="10" name="content" class="form-control" required><?php echo $stashed_content ?: ''; ?></textarea>
            </div>
            <div class="form-group text-center">
                <input type="submit" name="btnCancel" class="btn btn-danger btn-cancel-action" value="Cancel" formnovalidate/>
                <input id="ap_submit" type="submit" class="btn btn-success btn-login-submit" value="Add post" />
            </div>
        </form>
    </div>
</div>