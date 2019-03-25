
<style>
	input[name="image"]{
		width: 100px;
	}
	input[id="validationCustom02"]{
		margin-bottom: -20px
	}
</style>

<!-- Modal for Adding data -->
<div class="modal fade modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content" style="width:70%; margin-left: 20%;">
	  		<div class="modal-header bg-secondary">
				<h4 class="modal-title text-light" id="exampleModalCenterTitle" ><strong>Add New Customer</strong></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  		</div>
	  	<div class="modal-body">
			<div class="container-fluid">
				<form method="post" id="modal-form" action="../delivery/supplier_add.php" enctype="multipart/form-data" class="needs-validation">
		  			<div>
		  			<div align="center">
		  				<input type="hidden" name="size" class="form-control-sm" value="1000000">
		  				<img class="mb-1" width="150" height="150" src="../images/Worker.png"/>
		  			</div>
		  				<small>
						<div class="input-group  mb-2"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-building"></i></span></div><input type="text" name="com_name" class="form-control-sm form-control" required placeholder="Enter Company Name"></div>
						<div class="input-group mb-2"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div>		  				
		  				<input class="form-control form-control-sm" type="text" name="fname" placeholder="Enter First name" required></div>
		  				<div class="input-group mb-2"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div>
		  				<input class="form-control form-control-sm" type="text" name="lname" placeholder="Enter Last name" required></div>
		  				<div class="input-group mb-2"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span></div>
		  				<input class="form-control form-control-sm" type="text" name="number" placeholder="Enter Phone number" required></div>
		  				<div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span></div>
		  				<textarea type="text" class="form-control form-control-sm" name="address" placeholder="Enter Address" required></textarea></div>
		  				<label>Choose Picture:<i class="fas fa-file-upload"></i></label><input type="file" class="form-control-sm" name="image" required/>
		  				</small>

		  			</div>
				</form>
			</div>
		</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
				<button  type="submit" name="submit" class="btn btn-secondary" form="modal-form">Submit</button>
			</div>
		</div>
	</div>
</div>

