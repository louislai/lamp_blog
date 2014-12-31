<?php if (loggedin()) { ?>
<div class='comment-box'>
	<form action="addcomment.php" method="POST">            		
            <div class="form-group">
                <textarea placeholder="Type your comment here" rows="3" name="comment" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" name="comment_submit" class="btn btn-success btn-submit" value="Comment" />
            </div>
       </form>
</div>
<?php
}