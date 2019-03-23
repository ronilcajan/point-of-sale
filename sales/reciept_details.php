<?php
	include("../server/connection.php");
	include '../set.php';
	$id = $_GET['reciept_id'];
	$sql = "SELECT * FROM sales_product,products WHERE reciept_no = '$id' AND sales_product.product_id = products.product_no";
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
			include('../sales/base.php');
		?>
		<div>
			<div>
				<h1 class="ml-4 pt-2 pb-4" align="left"><i class="fas fa-shopping-cart"></i> Sales Records</h1>
			</div>
			<div class="table-responsive pl-5 pr-5">
			<table class="table table-striped table-bordered" id="sales_table" style="margin-top: -22px;">
				<thead>
					<tr>
						<td colspan="5"><h2>Reciept No.&nbsp<?php echo $row['reciept_no'];?></h2></td>
					</tr>
					<tr>
						<th scope="col" class="column-text">Barcode</th>
						<th scope="col" class="column-text">Product Name</th>
						<th scope="col" class="column-text">Quantity</th>
						<th scope="col" class="column-text">Price</th>
						<th scope="col" class="column-text">Unit</th>
					</tr>
				</thead>
				<tbody class="table-hover">
					<?php 
						while($row1 = mysqli_fetch_array($result1)){
				  	?>
					<tr class="table-active">
						<td><?php echo $row1['product_id'];?></td>
						<td><?php echo $row1['product_name'];?></td>
						<td><?php echo $row1['qty'];?></td>
						<td>₱<?php echo $row1['price'];?></td>
						<td><?php echo $row1['unit'];?></td>
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
	<script type="text/javascript">
		$(document).ready(function(){
			$('#sales_table').dataTable();
			
		});
	</script>
</body>
</html>
<script>
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