<?php 
	include("../server/connection.php");
	include('../user/add.php');
	$sql = "SELECT * FROM users ORDER BY firstname ASC ";
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
		<?php include('../user/base.php');?>
		<div>
			<h1 class="ml-4 pt-2">User Management</h1>
			<hr>
			<div class="d-flex justify-content-center mt-4">
				<?php include('../alert.php');?>
			<table class="table table-striped w-100 border" style="margin-top: -22px;">
				<thead class="bg-info">
					<tr>
						<th scope="row"><h4>Users</h4></th>
						<th scope="row"></th>
						<th scope="row"></th>
						<th scope="row"></th>
						<th scope="row"></th>
					</tr>
					<tr>
						<th scope="col" class="column-text">Username</th>
						<th scope="col" class="column-text">Name</th>
						<th scope="col" class="column-text">Position</th>
						<th scope="col" class="column-text">Contact Number</th>
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
						<td><?php echo $row['firstname'];echo '&nbsp';echo $row['lastname'];?></td>
						<td><?php echo $row['position'];?></td>
						<td><?php echo $row['contact_number'];?></td>
						<td>
							<a name="edit" title="Edit" style='font-size:10px; border-radius:5px;padding:4px;' href="update_user.php?id=<?php echo $row['id'];?>" class="btn btn-info btn-xs">Edit</a>
							<input type="button" name="view" value="View" style='font-size:10px; border-radius:5px;padding:4px;' id="<?php echo $row['id'];?>" class="btn btn-success btn-xs view_data">
							<input type="button" name="delete" title="Delete" value="Delete" style='font-size:10px; border-radius:5px;padding:4px;' data-id="<?php echo $row['id'];?>"  class="delete btn btn-danger btn-xs" data-toggle="#deleteModal" title="Delete">
						</td>
					</tr>
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
	<?php include('../templates/js_popper.php');?>
	<?php include('../user/delete_user.php');?>
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
	$(function(){
		$('input.delete').click(function(e){
			e.preventDefault();
			var link = this;
			var deleteModal = $("#deleteModal");
			deleteModal.find('input[name=id]').val(link.dataset.id);
			deleteModal.modal();
		});
	});
	$(document).ready(function(){
	/* function for activating modal to show data when click using ajax */
	$(document).on('click', '.view_data', function(){  
		var id = $(this).attr("id");  
		if(id != ''){  
			$.ajax({  
				url:"view.php",  
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