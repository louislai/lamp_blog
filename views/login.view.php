
<div class="col-md-6" id="login-box">
	<div class="well wlform-box">
		<form action="<?php echo $current_file; ?>" method="POST">
			<legend>Login</legend>
			<div class="form-group">
				<label for="name">Name</label>
				<input value='' name="user" placeholder="Username" type="text" class="form-control" />
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input name="password" value='' placeholder="Password" type="password" class="form-control" />
			</div>
			<div class="form-group text-center">
				<button class="btn btn-danger btn-cancel-action">Cancel</button>
				<input type="submit" class="btn btn-success btn-login-submit" value="Login" />
			</div>
		</form>
	</div>
</div>