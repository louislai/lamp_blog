<?php if (loggedin()) { ?>
<div class='comment-box'>
	<form action="viewpost.php?id=<?php echo $_SESSION['post_id'] ?>" method="POST">      
      	
            <div class="form-group">
                <textarea placeholder="Type your comment here" rows="3" name="comment" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success btn-submit" value="Comment" />
            </div>
       </form>
</div>
<?php
}