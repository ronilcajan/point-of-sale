<?php
	include("../server/connection.php");
	include '../set.php';
	$id = $_GET['transaction_no'];
	$sql = "SELECT * FROM product_delivered,products WHERE transaction_no = '$id' AND product_delivered.product_id = products.product_no";
	$result = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($result);
	$result1 = mysqli_query($db,$sql); 
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
		?>
		<div class="">
			<div>
				<h1 class="ml-4 pt-2 pb-4" align="left"><i class="fas fa-truck"></i> Delivery Records</h1>
			</div>
			<div class="table-responsive pl-5 pr-5">
			<table class="table table-sm table-striped table-bordered" id="sales_table" style="margin-top: -22px;">
				<thead>
					<tr>
						<td colspan="5"><h2>Transaction No.&nbsp<span style="color: blue;"><?php echo $row['transaction_no'];?></span></h2></td>
					</tr>
					<tr>
						<th scope="col" class="column-text">Barcode</th>
						<th scope="col" class="column-text">Product Name</th>
						<th scope="col" class="column-text">Quantity</th>
						<th scope="col" class="column-text">Price</th>
						<th scope="col" class="column-text">Unit</th>
						<th scope="col" class="column-text">Tax Added</th>
						<th scope="col" class="column-text">Sell Price</th>
					</tr>
				</thead>
				<tbody class="table-hover">
					<?php 
						while($row1 = mysqli_fetch_array($result1)){
				  	?>
					<tr class="table-active">
						<td><?php echo $row1['product_no'];?></td>
						<td><?php echo $row1['product_name'];?></td>
						<td><?php echo $row1['total_qty'];?></td>
						<td>₱<?php echo $row1['buy_price'];?></td>
						<td><?php echo $row1['unit'];?></td>
						<td><?php echo $row1['tax_rate'];?>%</td>
						<td>₱<?php echo $row1['sell_price'];?></td>
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
	<script src="../delivery/javascript.js"></script>
</body>
</html>
