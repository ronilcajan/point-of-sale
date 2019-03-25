<?php
	include("../server/connection.php");
	include '../set.php';
	$success = isset($_GET['success']);
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');?>

</head>
<body>
	<div class="contain h-100">
		<?php 
			include('../delivery/base.php');

			if($success){
			echo '<script>swal("Success","Successfully Added!","success");</script>';
			}
		?>
		<div class="pr-1">
			<div>
				<h1 class="ml-4 pt-2" align="left"><i class="fas fa-truck"></i> Delivery Records</h1>
			</div>
			<div class="form-group row pl-5" id="input-daterange">
				<div class="col-md-4">
					<div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span></div><input type="text" name="start_date" readonly id="start_date" class="form-control pr-5" placeholder="From Date" /></div>
				</div>
				<div class="col-md-4 pr-3">
					<div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span></div>
					<input type="text" name="end_date" readonly id="end_date" class="form-control" placeholder="To Date" /></div>
				</div>
				<button class="btn btn-info" type="button" id="filter"><i class="fas fa-search"></i> Search</button>
			</div>
			<div class="table-responsive pl-5 pr-5">
			<table class="table table-bordered table-striped table-sm" id="delivery_table" style="margin-top: -22px;">
				<thead>
					<tr>
						<th scope="col" class="column-text">Transaction No.</th>
						<th scope="col" class="column-text">Reciever Name</th>
						<th scope="col" class="column-text">Supplier Name</th>
						<th scope="col" class="column-text">Total Value(₱)</th>
						<th scope="col" class="column-text">Total Quantity</th>
						<th scope="col" class="column-text">Date</th>

					</tr>
				</thead>
				<tbody>
					
				</tbody>				
			</table>
			</div>
		</div>
	</div>
	<script src="../bootstrap4/jquery/jquery.min.js"></script>
	<script src="../bootstrap4/jquery/datepicker.js"></script>
	<script src="../bootstrap4/js/jquery.dataTables.js"></script>
	<script src="../bootstrap4/js/dataTables.bootstrap4.min.js"></script>
	<script src="../bootstrap4/js/bootstrap.bundle.min.js"></script>
	<script src="../bootstrap4/js/typeahead1.js"></script>
	<script src="../delivery/script.js"></script>
</body>
</html>