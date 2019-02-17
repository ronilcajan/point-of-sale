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

function GrandTotal(){
  var TotalValue = 0;
  var TotalPriceArr = $('#tableData tr .totalPrice').get()
  $(TotalPriceArr).each(function(){
    TotalValue +=parseFloat($(this).text().replace(/,/g, "").replace("₱",""));
  });
    $("#totalValue").text(accounting.formatMoney(TotalValue,{symbol:"₱",format: "%s %v"}));
    $("#totalValue1").text(accounting.formatMoney(TotalValue,{symbol:"₱",format: "%s %v"}));
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
	          GrandTotal();
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
    			  GrandTotal();
  		}
	});
});
$(document).on('click','.Enter',function(){
  var TotalPriceArr = $('#tableData tr .totalPrice').get();
  if (TotalPriceArr == 0){
    return 0;
  }else{
  var product = [];
  var quantity = [];
  var user = [];
  var customer = [];
  swal("ENTER CASH:", {
    content: "input",
  })
  .then((value) => {
    if (value == "") {
      swal("Error","Entered None!","error");
    }else{
      var qtynum = value;
      if (isNaN(qtynum)){
          swal("Error","Please enter a valid number!","error");
        }else if(qtynum == null){
          swal("Error","Please enter a number!","error");
        }else{
          $('.barcode').each(function(){
            product.push($(this).text());
            customer.push($('#custom_id').val());
            user.push($('#uname').val());
          });
          $('.qty').each(function(){
            quantity.push($(this).text());
          });
          var change = 0;
          var TotalValue = 0;
          var TotalPriceArr = $('#tableData tr .totalPrice').get()
          $(TotalPriceArr).each(function(){
            TotalValue += parseFloat($(this).text().replace(/,/g, "").replace("₱",""));
          });
          if(TotalValue > qtynum){
            swal("Error","Can't process a smaller number","error");
          }else{
            change = parseInt(value,10) - parseFloat(TotalValue);
            swal({
              title: "Change is " + accounting.formatMoney(change,{symbol:"₱",format: "%s %v"}),
              icon: "success",
              buttons: "Okay",
            })
            .then((success) => {
              $.ajax({
                url:"insert_sales.php",
                method:"POST",
                data:{product:product, user:user, customer:customer, quantity:quantity},
                success: function(data){
                  location.reload();
                },
              });
            })
          }
        }
      }
  });
}
});

$(document).on('click','.cancel',function(e){
  var TotalPriceArr = $('#tableData tr .totalPrice').get();
  if (TotalPriceArr == 0){
    return 0;
  }else{
    swal({
      title: "Cancel the order?",
      text: "By doing this,orders will remove!",
      icon: "warning",
      buttons: ["No","Yes"],
      dangerMode: true,
    })
    .then((reload) => {
      if (reload) {
        location.reload();
      }
    });
  }
});