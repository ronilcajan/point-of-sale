<?php 
	include("../server/connection.php");
	$sql = "SELECT * FROM logs";
	$result	= mysqli_query($db, $sql);
	?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');?>
</head>
<body>
	<div class="contain h-100">
		<?php include('../logs/base.php');?>
		<div>
			<h1 class="ml-4 pt-2">Logs Management</h1>
			<hr class="mt-0 mb-0">
			<div class="table-responsive mt-4 pl-5 pr-5">
				<table class="table table-striped border" id="logs_table" style="margin-top: -22px;">
				<thead class="bg-info"> 
					<tr>
						<th scope="col" class="column-text">Username</th>
						<th scope="col" class="column-text">Activity</th>
						<th scope="col" class="column-text">Date</th>
					</tr>
				</thead>
					<?php 
						while($row = mysqli_fetch_assoc($result)){
				  	?>
					<tr class="table-active">
						<td><?php echo $row['username'];?></td>
						<td><?php echo $row['purpose'];?></td>
						<td><?php echo $row['logs_time'];?></td>
					</tr>
					<?php } ?>
			</table>
			</div>
		</div>
	</div>
	<script src="../bootstrap4/jquery/jquery.min.js"></script>
	<script src="../bootstrap4/js/jquery.dataTables.js"></script>
	<script src="../bootstrap4/js/dataTables.bootstrap4.min.js"></script>
	<script src="../bootstrap4/js/bootstrap.bundle.min.js"></script>
	<?php include('../customer/delete_customer.php');?>
	<script>
		$(function () {
  			$('[data-toggle="popover"]').popover()
		});
		$(document).ready(function(){
			$('#logs_table').dataTable();
		})
</script>
</body>
</html>
<div id="dataModal" class="modal fade bd-example-modal-md" data-backdrop="static" data-keyboard="false">  
	<div class="modal-dialog modal-md"  role="document">  
		<div class="modal-content">   
		<div class="modal-body d-inline" id="Contact_Details"></div> 
			<div class="modal-footer"> 
				<input type="button" class="btn btn-default btn-success" data-dismiss="modal" value="Okay">   
			</div>  
	   </div>  
	</div>  
</div>