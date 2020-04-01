
$(document).ready(function(){
	$('#sales_table').dataTable();
	
});


// $(function () {
// 		$('[data-toggle="popover"]').popover()
// });
// $(document).ready(function(){
// /* function for activating modal to show data when click using ajax */
// $(document).on('click', '.view_data', function(){  
// 	var id = $(this).attr("id");  
// 	if(id != ''){  
// 		$.ajax({  
// 			url:"view_cashflow.php",  
// 			method:"POST",  
// 			data:{id:id},  
// 			success:function(data){  
// 				$('#Contact_Details').html(data);  
// 				$('#dataModal').modal('show');  
// 			}  
// 		});  
// 	}            
// });   
// });  

$(document).ready(function(){
	$('#order_date').datepicker({
  				todayBtn:'linked',
  				format: "yyyy-mm-dd",
  				autoclose: true
 			});
	});
$(function () {
  	$('[data-toggle="popover"]').popover()
});

$(document).ready(function(){
	var final_total_amount = $('#final_total_amount').text();
	var count = 1;
	$(document).on('click','#add_row', function(){
		count += 1;
		$('#quantity').val(count);
		var html_code = ''; 
		html_code += '<tr id="row_id_'+count+'">';
		html_code += '<td <span id="sr-no">'+count+'</span></td>';
		html_code += '<td><input type="text" name="barcode" id="barcode'+count+'" class="form-control form-control-sm input-sm barcode" placeholder="Barcode"/></td>';
		html_code += '<td><input type="text" pattern="[A-Za-z]+" title="No number on product name" name="product_name" id="product_name'+count+'" placeholder="Title" class="product_name form-control form-control-sm input-sm"/></td>';
		html_code += '<td><input type="number" name="quantity" min="1" id="quantity'+count+'" data-srno="'+count+'" placeholder="Qty"  class="form-control form-control-sm nput-sm quantity" /></td>';
		html_code += '<td><input type="number" name="buy_price" min="0.00" step="0.00" placeholder="Price" id="buy_price'+count+'" data-srno="'+count+'" class="form-control form-control-sm input-sm buy_price"></td>';
		html_code += '<td><input type="text" name="unit" pattern="[A-Za-z]+" title="No number on unit" id="unit'+count+'" placeholder="Kilograms" data-srno="'+count+'" class="form-control form-control-sm input-sm unit"></td>';
		html_code += '<td><input type="number" name="tax_rate" min="1" id="tax_rate'+count+'" placeholder="%" data-srno="'+count+'" class="form-control form-control-sm input-sm tax_rate"></td>';
		html_code += '<td><input type="number" name="min_qty" min="1" id="min_qty'+count+'" data-srno="'+count+'" class="form-control form-control-sm input-sm min_qty" placeholder="Qty" /></td>';
		html_code += '<td><input type="text" name="sell_price" readonly id="sell_price'+count+'" placeholder="Price+Tax" data-srno="'+count+'" class="form-control form-control-sm input-sm sell_price number_only"></td>';		
		html_code += '<td><input type="text" name="total_amount" readonly id="total_amount'+count+'" placeholder="Sum" data-srno="'+count+'" class="form-control form-control-sm input-sm total_amount"></td>';
		html_code += '<td><input type="text" name="remarks" id="remarks'+count+'" placeholder="Remarks" data-srno="'+count+'" class="form-control form-control-sm input-sm remarks"></td>';
		html_code += '<td><input type="text" name="location" id="location'+count+'" placeholder="Location" data-srno="'+count+'" class="form-control form-control-sm input-sm location"></td>';
		html_code += '<td><button type="button" name="remove_row" id="'+count+'" class="btn btn-sm btn-danger btn-xs remove_row"><i class="fas fa-minus-circle"></i></button></td></tr>';
		$("#invoice-item-table").append(html_code);
	});
	$(document).on('click','.remove_row',function(){
		var row_id = $(this).attr("id");
		var total_product_amount = $('#total_amount'+row_id).val().replace("P","");
		var final_amount = $('#final_total_amount').text().replace("₱","");
		var result_amount = parseFloat(final_amount) - parseFloat(total_product_amount);
		if(isNaN(result_amount)){

			if(total_product_amount == ""){
				var total_product_amount = 0;
				var minus_total = parseFloat(final_amount) - parseFloat(total_product_amount);
				$('#total_amount').text('₱ '+minus_total);
			}else{
				$('#final_total_amount').text('₱ 0.00');
			}
			
		}else{
			$('#final_total_amount').text('₱ '+result_amount);
		}
		
		$('#row_id_'+row_id).remove();
		count -= 1;
		$('#quantity').val(count);
	});
	function barcode_load(count){
			var barcode = $("#barcode"+count).val();
			$.ajax({
				url: "../delivery/loadbarcode.php",
				data : {
					barcode:barcode
				},
				method : "POST",
				dataType: "json",
				success :function(data){
					for(x in data){
						$('#product_name'+count).val(data.product_name);
						$('#quantity'+count).val(data.quantity);
						$('#buy_price'+count).val(data.buy_price);
						$('#unit'+count).val(data.unit);
						$('#tax_rate'+count).val(data.tax_rate);
						$('#sell_price'+count).val(data.sell_price);
					}
				}
			});

	}
	function final_total(count){
		var final_product_amount = 0;
		for(j=1;j<=count;j++){
			var quantity = 0;
			var buy_price = 0;
			var sell_price = 0;
			var tax_rate = 0;
			var total_amount = 0;
			var total_sell = 0;
			var actual_amount = 0;
			var total_tax = 0;
			var min_qty = 0;
			quantity = $('#quantity'+j).val();
			if(quantity>0){
				buy_price = $('#buy_price'+j).val().replace(",","");
				if(buy_price > 0 ){
					total_amount = parseFloat(quantity).toFixed(2) * parseFloat(buy_price).toFixed(2);
					$('#total_amount'+j).val('P '+total_amount);
					tax_rate = $('#tax_rate'+j).val();
					if(tax_rate>0){	
						total_sell = parseFloat(buy_price) * parseFloat(tax_rate)/100;
						total_tax = parseFloat(buy_price) + parseFloat(total_sell);
						$('#sell_price'+j).val('P '+total_tax.toFixed(2));
						min_qty = $('#min_qty'+j).val();
						if(min_qty>0){
							$('#sell_price'+j).val('P '+total_tax);
						}
					}				
				}
				actual_amount = $('#total_amount'+j).val().replace("P ","");
				final_product_amount = parseFloat(final_product_amount) + parseFloat(actual_amount);	
			}
		}
		$('#final_total_amount').text('₱ '+final_product_amount);
	}
	$(document).on('blur', '.min_qty', function(){
		final_total(count);
	});
	$(document).on('change', '.barcode', function(){
		barcode_load(count);
	});
	$(document).on('click','#create_delivery',function(){

		var barcode = [];
		var product_name = [];
		var quantity = [];
		var buy_price = [];
		var unit = [];
		var tax_rate = [];
		var min_qty = [];
		var sell_price = [];
		var total_amount = [];
		var remarks = [];
		var location = [];
		var supplier = $('#supplier_search').val();
		var transaction_no = $('#order_no').val();
		var order_date = $('#order_date').val();
		$('.barcode').each(function(){
			barcode.push($(this).val());
		});
		$('.product_name').each(function(){
			product_name.push($(this).val());
		});
		$('.quantity').each(function(){
			quantity.push($(this).val());
		});
		$('.buy_price').each(function(){
			buy_price.push($(this).val());
		});
		$('.unit').each(function(){
			unit.push($(this).val());
		});
		$('.tax_rate').each(function(){
			tax_rate.push($(this).val());
		});
		$('.min_qty').each(function(){
			min_qty.push($(this).val());
		});
		$('.sell_price').each(function(){
			sell_price.push($(this).val().replace("P",""));
		});
		$('.remarks').each(function(){
			remarks.push($(this).val());
		});
		$('.location').each(function(){
			location.push($(this).val());
		});

		if($.trim($('#supplier_search').val()).length == 0){
			swal("Warning","Please Enter Reciever Name!","warning");
			return false;
		}
		if($.trim($('#order_no').val()).length == 0){
			swal("Warning","Please Enter Transaction Number !","warning");
			return false;
		}
		for(var no=1; no<=count; no++){
			if($.trim($('#barcode'+no).val()).length == 0){
				swal("Warning","Please Enter Product Barcode!","warning");
				$('#barcode'+no).focus();
				return false;
			}
			if($.trim($('#product_name'+no).val()).length == 0){
				swal("Warning","Please Enter Product Name!","warning");
				$('#product_name'+no).focus();
				return false;
			}
			if($.trim($('#quantity'+no).val()).length == 0){
				swal("Warning","Please Enter Product Quantity!","warning");
				$('#quantity'+no).focus();
				return false;
			}
			if($.trim($('#buy_price'+no).val()).length == 0){
				swal("Warning","Please Enter Product Buy Price!","warning");
				$('#buy_price'+no).focus();
				return false;
			}
			if($.trim($('#sell_price'+no).val()).length == 0){
				swal("Warning","Please Enter Product Sell Price!","warning");
				$('#product_name'+no).focus();
				return false;
			}
			if($.trim($('#unit'+no).val()).length == 0){
				swal("Warning","Please Enter Product Unit!","warning");
				$('#unit'+no).focus();
				return false;
			}
			if($.trim($('#tax_rate'+no).val()).length == 0){
				swal("Warning","Please Enter Tax Rate!","warning");
				$('#tax_rate'+no).focus();
				return false;
			}
			if($.trim($('#min_qty'+no).val()).length == 0){
				swal("Warning","Please Enter Minumum Quantity!","warning");
				$('#min_qty'+no).focus();
				return false;
			}
		}

		$.ajax({
			url: "../delivery/add.php",
			method: "POST",
			data: {remarks:remarks,location:location,barcode:barcode,product_name:product_name,quantity:quantity,buy_price:buy_price,unit:unit,tax_rate:tax_rate,min_qty:min_qty,sell_price:sell_price,supplier:supplier,transaction_no:transaction_no,order_date:order_date},
			success: function(data){
				if(data=="success"){
					window.location.href='../delivery/delivery.php?success="1"';
				}else{
					window.location.href='../delivery/add_delivery.php?failure';
				}
			}
		});
		return false;

	})
});

$(document).ready(function(){

  $('#supplier_search').typeahead({

    source: function(query, result)
    {

        $.ajax({
          url: '../delivery/loadsupplier.php',
          method: "POST",
          data:{
            query:query
          },
          dataType: "json",
          success:function(data)
          {
            result($.map(data,function(item){
              return item;
            }));
          }
        })
    }
  });
});
