<?php
	include("../server/connection.php");
	$sql = "SELECT * FROM sales,customer,sales_product,products WHERE sales.reciept_no = sales_product.reciept_no AND sales.customer_id=customer.customer_id AND sales_product.product_id=products.id";
	$result = mysqli_query($db,$sql);
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
		<div align="center">
			<div>
				<h1 class="ml-4 pt-2" align="left">Sales Records</h1>
			</div>
			<div class="table-responsive pl-5 pr-5">
			<table class="table table-striped border" id="sales_table" style="margin-top: -22px;">
				<thead class="bg-info">
					<tr>
						<th scope="col" class="column-text">Username</th>
						<th scope="col" class="column-text">Receipt No.</th>
						<th scope="col" class="column-text">Customer Name</th>
						<th scope="col" class="column-text">Products</th>
						<th scope="col" class="column-text">Price</th>
						<th scope="col" class="column-text">Quantity</th>
						<th scope="col" class="column-text">Date</th>
					</tr>
				</thead>
					<?php 
						while($row = mysqli_fetch_array($result)){
				  	?>
					<tr class="table-active">
						<td><?php echo $row['username'];?></td>
						<td><?php echo $row['reciept_no'];?></td>
						<td><?php echo $row['firstname'].'&nbsp'.$row['lastname'];?></td>
						<td><?php echo $row['product_name'];?></td>
						<td>₱<?php echo $row['price'];?></td>
						<td><?php echo $row['qty'];?></td>
						<td><?php echo $row['date'];?></td>
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
	<script type="text/javascript">
		$(document).ready(function(){
			$('#sales_table').dataTable();
			
		});
	</script>
</body>
</html>
<div id="dataModal" class="modal fade bd-example-modal-md" data-backdrop="static" data-keyboard="false">  
	<div class="modal-dialog modal-md" role="document">  
		<div class="modal-content">   
		<div class="modal-body d-inline" id="Contact_Details"></div> 
			<div class="modal-footer"> 
				<input type="button" class="btn btn-default btn-success" data-dismiss="modal" value="Okay">   
			</div>  
	   </div>  
	</div>  
</div>
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