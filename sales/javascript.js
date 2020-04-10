$(document).ready(function(){

			$('#start_date, #end_date').datepicker({
  				todayBtn:'linked',
  				format: "yyyy-mm-dd",
  				autoclose: true
 			});

			fetch_data('no');

 			function fetch_data(is_date_search, start_date='', end_date=''){
  				var dataTable = $('#sales_table').DataTable({
   					"processing" : true,
   					"serverSide" : true,
   					"order" : [],
   					"ajax" : {
   						url:"fetch_all_data.php",
    					type:"POST",
    					data:{
     						is_date_search:is_date_search, start_date:start_date, end_date:end_date
    					}
   					}
  				});
 			}

 			$('#filter').click(function(){
 				var start_date = $('#start_date').val();
 				var end_date = $('#end_date').val();
 				if(start_date != '' && end_date != ''){
 					$('#sales_table').DataTable().destroy();
 					fetch_data('yes', start_date, end_date);

 				}else{
 					swal("Warning","Both Date is Required!","warning");
 				}
 			})
		});


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



setInterval(function(){
	total();
}, 1000);

function total(){
	$(document).ready(function(){
		var discount = 0;
		var sales = 0;

			$('#sales_table tbody tr td:nth-child(4)').each(function(){
				discount += parseInt($(this).text());
			});

			$('#sales_table tbody tr td:nth-child(5)').each(function(){
				sales += parseFloat($(this).text().replace(/,/g, "").replace("₱",""));
			});

		$('#sales_table tfoot #discount').text(discount);
		$('#sales_table tfoot #sales').text(formatNumber(sales));
	});
}

function formatNumber(num){
	return '₱' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '1,')
}