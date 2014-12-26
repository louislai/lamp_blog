<!-- Load validation js file -->
<script src="assets/js/validation.js" type="text/javascript"></script>

<div class="col-md-6">
	<div class="well wlform-box">
		<form id="register" action="<?php echo $current_file; ?>" method="POST">
			<legend>Create a new account</legend>
			<div class="form-group">
				<label for="name">Username</label>
				<input id="username" value='' name="user" placeholder="Username" type="text" class="form-control" required/>
				<span id="checkUsername"></span>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input id="password" name="password" value='' placeholder="Password" type="password" class="form-control" required/>

			</div>
			<div class="form-group">
				<label for="repassword">Confirm Password</label>
				<input id="repassword" value='' placeholder="Re-type your password" type="password" class="form-control" required/>
				<span id="checkPassword"></span>
			</div>
			<div class="form-group">
				<label for="password">Name</label>
				<input name="name" value='' placeholder="Your name" type="text" class="form-control" required />
				
			</div>
			<div class="form-group text-center">
				<input type="submit" name="btnCancel" class="btn btn-danger btn-cancel-action" value="Cancel"/>
				<input type="submit" class="btn btn-success btn-login-submit" value="Create a new account" />
			</div>
		</form>
	</div>
</div>
