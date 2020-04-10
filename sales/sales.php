<?php
	include("../server/connection.php");
	include '../set.php';
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');?>

</head>
<body>
	<div class="contain h-100">
		<?php 
			include('../sales/base.php');
		?>
		<div class="pr-1">
			<div>
				<h1 class="ml-4 pt-2" align="left"><i class="fas fa-shopping-cart"></i> Sales Records</h1>
			</div>
			<div class="form-group row pl-5" id="input-daterange">
				<div class="col-md-4">
					<div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span></div>
					<input type="text" name="start_date" readonly id="start_date" class="form-control pr-5" placeholder="From Date" /></div>
				</div>
				<div class="col-md-4 pr-5">
					<div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span></div>
					<input type="text" name="end_date" readonly id="end_date" class="form-control" placeholder="To Date" /></div>
				</div>
				<button class="btn btn-info" type="button" id="filter"><i class="fas fa-search"></i> Search</button>	
			</div>
			<div class="table-responsive pl-5 pr-5">
			<table class="table table-bordered table-striped" id="sales_table" style="margin-top: -22px;">
				<thead>
					<tr>
						<th scope="col" class="column-text">Receipt No.</th>
						<th scope="col" class="column-text">Cashier</th>
						<th scope="col" class="column-text">Customer Name</th>
						<th scope="col" class="column-text">Discount(%)</th>
						<th scope="col" class="column-text">Value(₱)</th>
						<th scope="col" class="column-text">Date</th>

					</tr>
				</thead>
				<tbody>
					
				</tbody>
				<tfoot>
					<th colspan="3" class="text-right">Total:</th>
					<th id="discount"></th>
					<th id="sales"></th>
					<th></th>
				</tfoot>				
			</table>
			</div>
		</div>
	</div>
	<script src="../bootstrap4/jquery/jquery.min.js"></script>
	<script src="bootstrap4/jquery/accounting.min.js"></script>
	<script src="../bootstrap4/jquery/datepicker.js"></script>
	<script src="../bootstrap4/js/jquery.dataTables.js"></script>
	<script src="../bootstrap4/js/dataTables.bootstrap4.min.js"></script>
	<script src="../bootstrap4/js/bootstrap.bundle.min.js"></script>
	<script src="../sales/javascript.js"></script>

</body>
</html>