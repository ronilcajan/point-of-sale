
<div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content text-center">
			<div class="modal-header">
				<h5 class="modal-title">Change Password</h5>
			</div>
			<form method="post" action="">
			<div class="modal-body">
				<div>
					<input type="hidden" name="position"/>
					<input class="form-control-sm mb-2" type="password" name="newpass" placeholder="Enter New Password" required/><br>
					<input class="form-control-sm mb-2" type="password" name="confirmpass" placeholder="Confirm Password" required/>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					<button type="submit" name='changepass' class="btn btn-success">change</button>					
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
