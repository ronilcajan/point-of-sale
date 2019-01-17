<?php
echo 
	'<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content text-center">
					<div class="modal-header">
						<h5 class="modal-title">Sign In</h5>
					</div>
					<div class="modal-body">
						<form method="post">
					<input type="hidden" name="position" />
							<input class="form-control-sm" type="password" name="password" placeholder="Enter Password" required/>
						</form>
					</div>
					<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-success">login</button>
					</div>
			</div>
		</div>
	</div>
	<div class="modal fade bd-example-modal-sm" id="modal-user" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content text-center">
					<div class="modal-header">
						<h5 class="modal-title">Sign In</h5>
					</div>
					<div class="modal-body">
						<form method="post">
							<div >
								<input class="form-control-sm mb-2" type="text" name="user" placeholder="Enter Username" required/>
								<input class="form-control-sm" type="password" name="password" placeholder="Enter Password" required/>
							</div>
						</form>
					</div>
					<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-success">login</button>
					</div>
			</div>
		</div>
	</div>';