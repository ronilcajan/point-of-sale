<?php
	if($deleted){
		echo 
			'<script>swal("","Successfully Deleted!","success");</script>';
		}
	if($added){
		echo 
			'<script>swal("","Successfully Added!","success");</script>';
	}
	if($updated){
		echo 
			'<script>swal("","Successfully Updated!","success");</script>';
	}
	if($undelete){
		echo '<script>swal("","Cannot Delete this one!","warning");</script>';
	}
	if($error){
		echo '<script>swal("","Cannot Delete this item!","warning");</script>';
	}
	if($failure){
		echo '<script>swal("Unsuccesful","Customer not found!","error");</script>';
	}

