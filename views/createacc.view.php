<div class="col-md-6">
	<div class="well wlform-box">
		<form action="<?php echo $current_file; ?>" method="POST">
			<legend>Create a new account</legend>
			<div class="form-group">
				<label for="name">Username</label>
				<input value='' name="user" id="username-email" placeholder="Username" type="text" class="form-control" />
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input id="password" name="password" value='' placeholder="Password" type="text" class="form-control" />
			</div>
			<div class="form-group">
				<label for="password">Name</label>
				<input name="name" value='' placeholder="Your name" type="text" class="form-control" />
			</div>
			<div class="form-group text-center">
				<button class="btn btn-danger btn-cancel-action">Cancel</button>
				<input type="submit" class="btn btn-success btn-login-submit" value="Create a new account" />
			</div>
		</form>
	</div>
</div>
