function loadproducts(){
	var name = $("#search").val();
	if(name){
		$.ajax({
			type: 'post',
			data: {
				products:name,
			},
			url: 'loadproducts.php',
			success: function (Response){
				$('#products').html(Response);
			}
		});
	}
};
$('body').on('click','.js-add',function(){
			var totalPrice = 0;
   		var target = $(this);
    	var product = target.attr('data-product');
    	var price = target.attr('data-price');
    	var barcode = target.attr('data-barcode');
    	var unit = target.attr('data-unt');   	
    	swal("Enter number of item:", {
  			content: "input",
		  })
		  .then((value) => {
			  if (value == "") {
				  swal("Error","Entered none!","error");
			  }else{
				  var qtynum = value;
				  if (isNaN(qtynum)){
    				swal("Error","Please enter a valid number!","error");
          }else if(qtynum == null){
            swal("Error","Please enter a number!","error");
    		  }else{
    				var total = parseInt(value,10) * parseFloat(price);
    				$('#tableData').append("<tr class='prd'><td class='barcode text-center'>"+barcode+"</td><td class='text-center'>"+product+"</td><td class='text-center'>"+accounting.formatMoney(price,{symbol:"₱",format: "%s %v"})+"</td><td class='text-center'>"+unit+"</td><td class='qty text-center'>"+value+"</td><td class='totalPrice text-right'>"+accounting.formatMoney(total,{symbol:"₱",format: "%s %v"})+"</td><td class='text-center p-1'><button class='btn btn-danger' type='button' id='delete-row' style='padding:;'>&times</button><tr>");
	          	
	          var TotalValue = 0;
    				var TotalPriceArr = $('#tableData tr .totalPrice').get()
    				$(TotalPriceArr).each(function(){
          			TotalValue +=parseFloat($(this).text().replace(/,/g, "").replace("₱",""));
    				});
    				$("#totalValue").text(accounting.formatMoney(TotalValue,{symbol:"₱",format: "%s %v"}));
    				$("#totalValue1").text(accounting.formatMoney(TotalValue,{symbol:"₱",format: "%s %v"}));
        }
			}
  });
});

$(document).ready(function(){
  	document.getElementById("search").focus();
 });

$("body").on('click','#delete-row', function(){
   	var target = $(this);
   	swal({
  		title: "Remove this item?",
  		icon: "warning",
  		buttons: true,
  		dangerMode: true,
		})
		.then((willDelete) => {
  		if (willDelete) {
  			$(this).parents("tr").remove();
    		swal("Removed Successfully!", {
      			icon: "success",
    		});
    			  var TotalValue = 0;
    				var TotalPriceArr = $('#tableData tr .totalPrice').get()
    				$(TotalPriceArr).each(function(){
          			TotalValue +=parseFloat($(this).text().replace(/,/g, "").replace("₱",""))
    				});
    				$("#totalValue").text(accounting.formatMoney(TotalValue,{symbol:"₱",format: "%s %v"}));
    				$("#totalValue1").text(accounting.formatMoney(TotalValue,{symbol:"₱",format: "%s %v"}));
  		}
	});
});

$(document).on('click','.Enter',function(){
  var product = [];
  var quantity = [];
  var user = [];
  var customer = [];

  $('.barcode').each(function(){
      product.push($(this).text());
      customer.push($('#custom_id').val());
      user.push($('#uname').val());
  });
  $('.qty').each(function(){
      quantity.push($(this).text());
  });
  $.ajax({
    url:"insert_sales.php",
    method:"POST",
    data:{product:product, user:user, customer:customer, quantity:quantity},
    success: function(data){
      alert(data);

    },
  })
});

$(document).on('click','.cancel',function(e){
    swal({
      title: "Cancel the order?",
      text: "By doing this,the page will reload!",
      icon: "warning",
      buttons: ["No","Yes"],
      dangerMode: true,
    })
    .then((reload) => {
      if (reload) {
        location.reload();
      }
    });
  });