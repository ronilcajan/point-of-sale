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
			success: function (response){
				$('#products').html(response);
			}
		});
	}
}


function add_products(){
  	$('input:checked[name=tab1]').each(function() {
  		var barcode = $(this).attr('data-barcode');
    	var product = $(this).attr('data-product');
    	var price = $(this).attr('data-price');
    	var unit = $(this).attr('data-unit');
    	var qty = $(this).attr('data-qty');
    	var total = $(this).attr('data-total');
  		$('#tableData').append("<tr><td>"+barcode+"</td><td>"+product+"</td><td>"+price+"</td><td>"+unit+"</td><td>"+qty+"</td><td>"+total+"</td><tr>");
  	});
}
/*function tab1_to_tab2(){
	var table1 = document.getElementById("table1"),
		table2 = document.getElementById("table2"),
		checkboxes = document.getElementsByName("tab1");
	console.log("Val1 = " + checkboxes.length);
	for(var i = 0; i < checkboxes.length; i++)
	if (checkboxes[i].checked) {
		var newRow 	= table2.insertRow(table2.length),
			cell1 	= newRow.insertCell(0),
			cell2 	= newRow.insertCell(1),
			cell3 = newRow.insertCell(2),
			cell4 = newRow.insertCell(3);

			cell1.innerHTML = table1.rows[i+1].cells[0].innerHTML;
			cell2.innerHTML = table1.rows[i+1].cells[1].innerHTML;
			cell3.innerHTML = table1.rows[i+1].cells[2].innerHTML;
			cell4.innerHTML = table1.rows[i+1].cells[3].innerHTML;

			console.log(checkboxes.length);
		}
}*/

$("tbody.products").click(function() {
    var tableData = $(this).children("td").map(function() {
        return $(this).text();
    }).get();

    alert("Your data is: " + $.trim(tableData[0]) + " , " + $.trim(tableData[1]) + " , " + $.trim(tableData[2]));
});


        var table = document.getElementsByTagName("table")[0];
        var tbody = table.getElementsByTagName("tbody")[0];
        tbody.onclick = function (e) {
            e = e || window.event;
            var data = [];
            var target = e.srcElement || e.target;
            while (target && target.nodeName !== "TR") {
                target = target.parentNode;
            }
            if (target) {
                var cells = target.getElementsByTagName("td");
                for (var i = 0; i < cells.length; i++) {
                    data.push(cells[i].innerHTML);
                }
            }
            var trnode = document.createElement("tr");
          
            for(var i = 0; i < data.length; i++){
                var tdnode = document.createElement("td");
                var textnode = document.createTextNode(data[i]);
                tdnode.appendChild(textnode);
                trnode.appendChild(tdnode);
            }
          
            document.getElementById("tableData").appendChild(trnode);
            alert(data);
    };


    $("tr.table").click(function() {
    var tableData = $(this).children("td").map(function() {
        return $(this).text();
    }).get();

    alert("Your data is: " + $.trim(tableData[0]) + " , " + $.trim(tableData[1]) + " , " + $.trim(tableData[2]));
});