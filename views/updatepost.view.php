<div class="col-md-8 col-md-offset-2" id="update-box">
    <div class="well wlform-box">
        <form action="<?php
    echo sanitize_output($_SERVER['REQUEST_URI']);?>" method="POST">
            <legend>Update Your Post</legend>
            <div class="form-group">
                <label for="title">Title</label>
                <input name="title" value="<?php echo sanitize_output($title); ?>" type="text" class="form-control" required/>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea rows="10" id="content" name="content" class="form-control" required><?php echo sanitize_output($content);?></textarea></p>
            </div>
            <div class="form-group text-center">
                
                <input type="submit" name="btnUpdate" class="btn btn-success btn-login-submit" value="Update" />
                <input type="submit" name="btnCancel" class="btn btn-danger btn-cancel-action" value="Cancel" formnovalidate/>
            </div>
        </form>
    </div>
</div>