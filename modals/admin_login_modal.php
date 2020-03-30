<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content text-center">
			<div class="modal-header">
				<h5 class="modal-title"><i class="fas fa-user-lock"></i> Admin Sign In</h5>
			</div>
			<form method="post" action="">
			<div class="modal-body">
				<div>
					<input type="hidden" name="position" value="admin"/>
					<input type="hidden" name="username" value=""/>
					<div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span></div>
					<input class="form-control-sm form-control" id="pass" type="password" name="password" placeholder="Enter Password" required/></div>
				</div>
				<div class="modal-footer ">
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
					<button type="submit" name="login" class="btn btn-success"><i class="fas fa-sign-in-alt"></i> login</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>