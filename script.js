function loadproducts(){
	var name = $("#search").val();
	if(name){
		$.ajax({
			type: 'post',
			cache: false,
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
   		var target = $(this);
    	var product = target.attr('data-product');
    	var price = target.attr('data-price');
    	var barcode = target.attr('data-barcode');
    	var unit = target.attr('data-unt');   	
    	swal("Enter number of item to buy:", {
  			content: "input",
		})
		.then((value) => {
			if (value == "") {
				swal("Error","Entered none!","error");
			}else{
				var qtynum = parseInt(value);
				if (isNaN(qtynum)){
    				swal("Error","Please input a valid number!","error");
    			}else{
    				var total = value * price;
  					$('#tableData').append("<tr><td>"+barcode+"</td><td>"+product+"</td><td>"+accounting.formatMoney(price,{symbol:"₱",format: "%s %v"})+"</td><td>"+unit+"</td><td>"+value+"</td><td class='totalPrice'>"+accounting.formatMoney(total,{symbol:"₱",format: "%s %v"})+"</td><td><button class='btn btn-danger' type='button' id='delete-row' style='padding:;'>&times</button><tr>");			
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
  		title: "Are you sure?",
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
  		}
	});
});
/*$(document).ready(function(){
    var TotalValue = 0;
    $("#tableData tr").each(function(){
          TotalValue += parseFloat($(this).find('.totalPrice').text().replace(/,/g, "₱"));
    });
    alert(TotalValue);
});*/