<?php
	if($deleted){
		echo 
			'<div class="alert alert-danger alert-dismissible fade show" role="alert" style="position:absolute; margin-top:-20px;">
				Deleted Successfully!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
		}
		if($added){
		echo 
			'<div class="alert alert-info alert-dismissible fade show" role="alert" style="position:absolute; margin-top:-20px;">
				Successfully Added!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
	}
	if($updated){
		echo 
			'<div class="alert alert-success alert-dismissible fade show" role="alert" style="position:absolute; margin-top:-20px;">
				Successfully Updated!
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>';
	}