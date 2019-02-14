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
			<div class="justify-content-center table-responsive" id="pagination_data">
			
			</div>
		</div>
	</div>
	<script src="../bootstrap4/jquery/jquery.min.js"></script>
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

	$(document).ready(function(){
		load_data();
		function load_data(page)
		{
			$.ajax({
				url:"pagination.php",
				method:"POST",
				data:{page:page},
				success:function(data){
					$('#pagination_data').html(data);
				}
			});
		}
		$(document).on('click','.pagination_link',function(){
			var page = $(this).attr("id");
			load_data(page);
		});
	});
</script>