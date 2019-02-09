<?php 
	include("../server/connection.php");
	$sql = "SELECT * FROM cashflow ORDER BY transaction_id ASC ";
	$result	= mysqli_query($db, $sql);
	$deleted = isset($_GET['deleted']);
	$added  = isset($_GET['added']);
	$updated = isset($_GET['updated']);
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');?>
</head>
<body>
	<div class="contain h-100">
		<?php include('../cashflow/base.php');?>
		<div>
			<h1 class="ml-4 pt-2">Cash Management</h1>
			<hr>
			<div class="d-flex justify-content-center mt-4">
				<?php include('../alert.php');?>
			<table class="table table-striped border" style="margin-top: -22px;">
				<thead class="bg-info">
					<tr>
						<th scope="row"><h4>Cash Flow</h4></th>
						<th scope="row"></th>
						<th scope="row"></th>
						<th scope="row"></th>
						<th scope="row"></th>
					</tr>
					<tr>
						<th scope="col" class="column-text">Username</th>
						<th scope="col" class="column-text">Purpose</th>
						<th scope="col" class="column-text">Amount</th>
						<th scope="col" class="column-text">Date</th>
						<th scope="col" class="column-text">Action</th>
					</tr>
				</thead>
				<tbody id="myTable">
					<?php 
						if (mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_assoc($result)){
				  	?>
					<tr class="table-active">
						<td><?php echo $row['username'];?></td>
						<td><?php echo $row['description'];?></td>
						<td>P<?php echo $row['amount'];?></td>
						<td><?php echo $row['transaction_date'];?></td>
						<td>
							<input type="button" name="view" value="View" style='font-size:10px; border-radius:5px;padding:4px;' id="<?php echo $row['transaction_id'];?>" class="btn btn-success btn-xs view_data">
						</td>
					</tr>
					<?php
								} 
							}else{ 
								echo "<tr><td></td><td><p style='color:red;'>No data available!</p></td><td></td><td></td>";
								echo "<td></td>";
								echo "</tr>";
							}?>
				</tbody>
				<tfoot>
					
				</tfoot>
			</table>

			</div>
		</div>
	</div>
	<script src="../bootstrap4/jquery/jquery.js"></script>
	<script src="../bootstrap4/js/bootstrap.bundle.min.js"></script>
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