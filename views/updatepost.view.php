<div class="col-md-6" id="update-box">
    <div class="well wlform-box">
        <form action="<?php
    echo sanitize_output($_SERVER['REQUEST_URI']);?>" method="POST">
            <legend>Update Your Post</legend>
            <div class="form-group">
                <label for="title">Title</label>
                <input value='' name="title" placeholder="<?php echo sanitize_output($title); ?>" type="text" class="form-control" />
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea rows="10" id="content" name="content" class="form-control"><?php echo sanitize_output($content);?></textarea></p>
            </div>
            <div class="form-group text-center">
                
                <input type="submit" name="btnCancel" class="btn btn-danger btn-cancel-action" value="Cancel"/>
            
                <input type="submit" name="btnUpdate" class="btn btn-success btn-login-submit" value="Update" />
            </div>
        </form>
    </div>
</div>