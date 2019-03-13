<?php 
	include("../server/connection.php");
	include '../set.php';
	$customer_id = $_GET['customer_id'];
	$sql = "SELECT sales_product.reciept_no,sales_product.price,sales_product.qty FROM customer,sales,sales_product WHERE customer.customer_id = $customer_id AND sales.customer_id = $customer_id AND sales.reciept_no = sales_product.reciept_no";
	$result	= mysqli_query($db, $sql);
	$query = "SELECT firstname,lastname FROM customer WHERE customer_id=$customer_id";
	$result1 = mysqli_query($db, $query);
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
				<?php $row1 = mysqli_fetch_assoc($result1);
					echo "<h3>Customer Name:<span  class='text-success'>".$row1['firstname'].'&nbsp'.$row1['lastname']."</span></h3>";
				?>
				<thead> 
					<tr>
						<th scope="col" class="column-text">Reciept No</th>
						<th scope="col" class="column-text">Total Value</th>
						<th scope="col" class="column-text">Total Quantity</th>
					</tr>
				</thead>
				<tbody class="table-hover">
					<?php 
						while($row = mysqli_fetch_assoc($result)){
				  	?>
					<tr class="table-active">
						<td><?php echo $row['reciept_no'];?></td>
						<td><?php echo $row['price'];?></td>
						<td><?php echo $row['qty'];?></td>
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
