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