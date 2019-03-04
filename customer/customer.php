<?php 
	include("../server/connection.php");
	include '../set.php';
	$sql = "SELECT * FROM customer ORDER BY customer_id ASC ";
	$result	= mysqli_query($db, $sql);
	$deleted = isset($_GET['deleted']);
	$added  = isset($_GET['added']);
	$updated = isset($_GET['updated']);
	$undelete = isset($_GET['undelete']);
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');
	?>
</head>
<body>
	<div class="contain h-100">
		<?php 
			include('../customer/base.php');
			include('../alert.php');
		?>
		<div>
			<h1 class="ml-4 pt-2">Customer Management</h1>
			<hr>
			<div class="table-responsive mt-4 pl-5 pr-5">
			<table class="table table-striped table-bordered" id="customer_table" style="margin-top: -22px;">
				<thead> 
					<tr>
						<th scope="col" class="column-text">Customer ID</th>
						<th scope="col" class="column-text">Customer Name</th>
						<th scope="col" class="column-text">Address</th>
						<th scope="col" class="column-text">Contact Number</th>
						<th scope="col" class="column-text">Actions</th>
					</tr>
				</thead>
				<tbody class="table-hover">
					<?php 
						while($row = mysqli_fetch_assoc($result)){
				  	?>
					<tr class="table-active">
						<td><?php echo $row['customer_id'];?></td>
						<td><?php echo $row['firstname'].'&nbsp'.$row['lastname'];?></td>
						<td><?php echo $row['address'];?></td>
						<td><?php echo $row['contact_number'];?></td>
						<td>
							<a name="edit" title="Edit" style='font-size:10px; border-radius:5px;padding:4px;' href="update_customer.php?id=<?php echo $row['customer_id'];?>" class="btn btn-info btn-xs">Edit</a>
							<input type="button" name="view" value="View" style='font-size:10px; border-radius:5px;padding:4px;' id="<?php echo $row['customer_id'];?>" class="btn btn-success btn-xs view_data">
							<input type="button" name="delete" title="Delete" value="Delete" style='font-size:10px; border-radius:5px;padding:4px;' data-id="<?php echo $row['customer_id'];?>"  class="delete btn btn-danger btn-xs" data-toggle="#deleteModal" title="Delete">
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>

			</div>
		</div>
	</div>
	<script src="../bootstrap4/jquery/jquery.min.js"></script>
	<script src="../bootstrap4/js/jquery.dataTables.js"></script>
	<script src="../bootstrap4/js/dataTables.bootstrap4.min.js"></script>
	<script src="../bootstrap4/js/bootstrap.bundle.min.js"></script>
	<?php include('../customer/delete_customer.php');?>
	<script src="../customer/javascript.js"></script>	
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
