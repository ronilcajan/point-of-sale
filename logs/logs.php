<?php 
	include("../server/connection.php");
	$sql = "SELECT * FROM logs ";
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
			<hr>
			<div class="d-flex justify-content-center mt-4">
			<table class="table table-striped w-100 border" style="margin-top: -22px;">
				<thead class="bg-info">
					<tr>
						<th scope="row"><h4>Logs</h4></th>
						<th scope="row"></th>
						<th scope="row"></th>
						<th scope="row"></th>
					</tr>
					<tr>
						<th scope="col" class="column-text">ID</th>
						<th scope="col" class="column-text">Table ID</th>
						<th scope="col" class="column-text">Activity</th>
						<th scope="col" class="column-text">Date</th>
					</tr>
				</thead>
				<tbody id="myTable">
					<?php 
						if (mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_assoc($result)){
				  	?>
					<tr class="table-active">
						<td><?php echo $row['id'];?></td>
						<td><?php echo $row['table_id'];?></td>
						<td><?php echo $row['activity'];?></td>
						<td><?php echo $row['logs_date'];?></td>	
					<?php
								} 
							}else{ 
								echo "<tr><td></td><td><p style='color:red;'>No data available!</p></td>";
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
	<?php include('../customer/delete_customer.php');?>
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
</script>