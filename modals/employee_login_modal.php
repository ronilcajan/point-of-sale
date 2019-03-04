<div class="modal fade" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-sm modal-dialog-centered">
		<div class="modal-content text-center">
			<div class="modal-header">
				<h5 class="modal-title">Sign In</h5>
			</div>
			<form method="post" action="">
			<div class="modal-body">
				<div>
					
					<input class="form-control-sm mb-2" type="text" name="username" placeholder="Enter Username" required/><br>
					<input class="form-control-sm mb-2" type="password" name="password" placeholder="Enter Password" required/>
					<input type="hidden" name="position" value="Employee"/>
				</div>
				<div class="modal-footer">

					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name='login' class="btn btn-success">login</button>					
				</div>
			</form>
			</div>
		</div>
	</div>
</div>
