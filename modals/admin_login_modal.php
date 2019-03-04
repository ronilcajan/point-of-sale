<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content text-center">
			<div class="modal-header">
				<h5 class="modal-title">Sign in as Admin</h5>
			</div>
			<form method="post" action="">
			<div class="modal-body">
				<div>
					<input type="hidden" name="position" value="admin"/>
					<input type="hidden" name="username" />
					<input class="form-control-sm mb-2" id="pass" type="password" name="password" placeholder="Enter Password" required/>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="login" class="btn btn-success">login</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>