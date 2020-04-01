<div id="deleteModal" class="modal fade" data-backdrop="static" data-keyboard="false">  
	<div class="modal-dialog" role="document">  
		<div class="modal-content">
			<form action="delete.php" method="GET">
		   		<div class="modal-header" style="background-color:#F44336;"> 
					<h3>Delete!</h3>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		   		</div>
				<div class="modal-body">
					<p>Are you sure you want to delete this user?</p>
					<p><small>This action cannot be undoned.</small></p>
				</div> 
				<div class="modal-footer">
					<input type="hidden" name="id" value="" />
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<button class="btn btn-danger" type="submit">Delete</button>  
				</div>
			</form>  
		</div>  
	</div>  
</div>