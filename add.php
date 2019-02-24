
<style>
	input[name="image"]{
		width: 100px;
	}
	input[id="validationCustom02"]{
		margin-bottom: -20px
	}
</style>

<!-- Modal for Adding data -->
<div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-fluid" role="document">
		<div class="modal-content" style="width:70%; margin-left: 20%;">
	  		<div class="modal-header bg-secondary">
				<h4 class="modal-title text-light" id="exampleModalCenterTitle" ><strong>Add New Customer</strong></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	  		</div>
	  	<div class="modal-body">
			<div class="container-fluid">
				<form method="post" id="modal-form" action="add_customer.php" enctype="multipart/form-data" class="needs-validation">
		  			<div>
		  			<div align="center">
		  				<input type="hidden" name="size" class="form-control-sm" value="1000000">
		  				<input type="hidden" name="user" class="form-control-sm" value="<?php echo $_GET['username'];?>">
		  				<img class="mb-1" width="150" height="150" src="images/user.png"/>
		  			</div>
		  				<small>		  				
		  				<input class="form-control form-control-sm mb-1" type="text" name="fname" placeholder="Enter First name" required>
		  				<input class="form-control form-control-sm mb-1" type="text" name="lname" placeholder="Enter Last name" required>
		  				<input class="form-control form-control-sm mb-1" type="text" name="number" placeholder="Enter Phone number" required>
		  				<textarea type="text" class="form-control form-control-sm mb-1" name="address" placeholder="Enter Address" required></textarea>
		  				<label>Choose Picture:</label><input type="file" class="form-control-sm" name="image" required/>
		  				</small>

		  			</div>
				</form>
			</div>
		</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">&times&nbspCancel</button>
				<button  type="submit" name="submit" class="btn btn-secondary" form="modal-form">Submit</button>
			</div>
		</div>
	</div>
</div>

