$(document).ready(function(){
			$('#supplier_table').dataTable();
		});
		$(document).ready(function(){
			$('#supplier_table').dataTable();
		});

$(function () {
  		$('[data-toggle="popover"]').popover()
	});
	$(function(){
		$('button.delete').click(function(e){
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
				url:"view_supplier.php",  
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

 $(document).ready(function(){
	/* function for activating modal to show data when click using ajax */
	$(document).on('click', '.view_product', function(){  
		var id = $(this).attr("id");  
		if(id != ''){  
			$.ajax({  
				url:"view_products.php",  
				method:"POST",  
				data:{id:id},  
				success:function(data){  
					$('#product_Details').html(data);  
					$('#productModal').modal('show');  
				}  
			});  
		}            
	});   
 });