<div class="col-md-6" id="add-box">
    <div class="well wlform-box">
        <form action="<?php echo $current_file;?>" method="POST">
            <legend>Add a new post</legend>
            <div class="form-group">
                <label for="title">Title</label>
                <input value='' name="title" placeholder="<?php echo sanitize_output($title); ?>" type="text" class="form-control" />
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea placeholder="Type here" rows="10" id="content" name="content" class="form-control"></textarea></p>
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-success btn-login-submit" value="Add post" />
            </div>
        </form>
    </div>
</div>