<?php 
	include("../server/connection.php");
	include '../set.php';
	
	$id = $_GET['id'];
	$sql = "SELECT delivery.transaction_no,delivery.date,product_delivered.total_price,product_delivered.total_qty FROM supplier,delivery,product_delivered WHERE supplier.supplier_id = '$id' AND delivery.supplier_id = '$id' AND delivery.transaction_no = product_delivered.transaction_no";
	$result	= mysqli_query($db, $sql);


	$deleted = isset($_GET['deleted']);
	$added  = isset($_GET['added']);
	$updated = isset($_GET['updated']);
	$undelete = isset($_GET['undelete']);
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');?>
</head>
<body>
	<div class="contain h-100">
		<?php include('../supplier/base.php');?>
		<div>
			<h1 class="ml-4 pt-2">Supplier Management</h1>
			<hr>
			<?php include('../alert.php');?>
			<div class="table-responsive mt-4 pl-5 pr-5">
			<table class="table table-striped table-bordered" id="supplier_table">
				<thead>
					<tr>
						<th scope="col" class="column-text">Transaction No.</th>
						<th scope="col" class="column-text">Total Value</th>
						<th scope="col" class="column-text">Total Quantity</th>
						<th scope="col" class="column-text">Date</th>
						<th scope="col" class="column-text">Action</th>
					</tr>
				</thead>
				<tbody class="table-hover">
					<?php 
						while($row = mysqli_fetch_array($result)){
				  	?>
					<tr class="table-active">
						<td><?php echo $row['transaction_no'];?></td>
						<td><?php echo $row['total_price'];?></td>
						<td><?php echo $row['total_qty'];?></td>
						<td><?php echo $row['date'];?></td>
						<td>
							<input type="button" name="view" value="Details" style='font-size:10px; border-radius:5px;padding:4px;' id="<?php echo $row['id'];?>" class="btn btn-info btn-xs view_product">
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
	<?php include('../supplier/delete_supplier.php');?>
	<script>
		$(document).ready(function(){
			$('#supplier_table').dataTable();
		})
	</script>
</body>
</html>
<div id="productModal" class="modal fade bd-example-modal-md" data-backdrop="static" data-keyboard="false">  
	<div class="modal-dialog modal-md"  role="document">  
		<div class="modal-content">   
		<div class="modal-body d-inline" id="product_Details"></div> 
			<div class="modal-footer"> 
				<input type="button" class="btn btn-default btn-success" data-dismiss="modal" value="Okay">   
			</div>  
	   </div>  
	</div>  
</div>
<script src="../supplier/javascript.js"></script>