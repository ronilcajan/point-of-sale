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
				<h1 class="ml-4 pt-2" align="left">Sales Records</h1>
			</div>
			<div class="input_daterange form-group row pl-5">
				<div class="col-md-4">
					<input type="text" name="start_date" id="start_date" class="form-control-sm pr-5" />
				</div>
				<div class="col-md-4 pr-5">
					<input type="text" name="end_date" id="end_date" class="form-control-sm" />
				</div>
				<input class="btn btn-info" type="button" name="search" value="Filter"/>
			</div>
			<div class="table-responsive pl-5 pr-5">
			<table class="table table-striped" id="sales_table" style="margin-top: -22px;">
				<thead class="bg-info">
					<tr>
						<th scope="col" class="column-text">Receipt No.</th>
						<th scope="col" class="column-text">Username</th>
						<th scope="col" class="column-text">Customer Name</th>
						<th scope="col" class="column-text">Quantity</th>
						<th scope="col" class="column-text">Value</th>
						<th scope="col" class="column-text">Date</th>

					</tr>
				</thead>
				</table>
			</div>
		</div>
	</div>
	<script src="../bootstrap4/jquery/jquery.min.js"></script>
	<script src="../bootstrap4/jquery/datepicker.js"></script>
	<script src="../bootstrap4/js/jquery.dataTables.js"></script>
	<script src="../bootstrap4/js/dataTables.bootstrap4.min.js"></script>
	<script src="../bootstrap4/js/bootstrap.bundle.min.js"></script>
	
</body>
</html>
<script>
	$(document).ready(function(){

			 $('.input-daterange').datepicker({
  				todayBtn:'linked',
  				format: "yyyy-mm-dd",
  				autoclose: true
 			});
			 fetch_data('no');

 			function fetch_data(is_date_search, start_date='', end_date=''){
  				var dataTable = $('#sales_table').DataTable({
   					"processing" : true,
   					"serverSide" : true,
   					"order" : [],
   					"ajax" : {
   						url:"fetch_all_data.php",
    					type:"POST",
    					data:{
     						is_date_search:is_date_search, start_date:start_date, end_date:end_date
    					}
   					}
  				});
 			}
		});


	$(function () {
  		$('[data-toggle="popover"]').popover()
	});
	$(document).ready(function(){
	/* function for activating modal to show data when click using ajax */
	$(document).on('click', '.view_data', function(){  
		var id = $(this).attr("id");  
		if(id != ''){  
			$.ajax({  
				url:"view_cashflow.php",  
				method:"POST",  
				data:{id:id},  
				success:function(data){  
					$('#Contact_Details').html(data);  
					$('#dataModal').modal('show');  
				}  
			});  
		}            
	});   
 });  

</script>