<div class="col-md-8 col-md-offset-2"  id="search-box">
    <div class="well wlform-box">
        <form action="<?php echo sanitize_output($_SERVER['REQUEST_URI']);?>" method="POST">
            <legend>Search for Posts</legend>
            <div class="form-group">
                <label for="search">Search Box</label>
                <input value='' name="keyword" placeholder="Type in your keywords" type="text" class="form-control" required/>
            </div>
            <div class="form-group text-center">
                <input type="submit" name="btnCancel" class="btn btn-danger btn-cancel-action" value="Cancel"/>
                <input type="submit" class="btn btn-success btn-login-submit" value="Search" />
            </div>
        </form>
    </div>
</div>