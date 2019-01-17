<?php include('server/connection.php');?>
<!DOCTYPE html>
<html>
<head>
	<?php include('templates/head.php'); ?>
</head>
<body>
	<div class="h-100 bg-dark" id="container">
		<div id="header">
			<div>
				<img class="img-fluid m-2 w-100" src="images/logo1.jpg"/>
			</div>
			<div>
				<ul class="ml-5 text-white mt-3">
					<li>User Logged on : </li>
					<li>Date : </li>
					<li>Customer name : <select class="form-control-sm">
						<option>Costumer</option>
					</select> </li>
				</ul>
			</div>
			<div class="header_price border p-0">
				<h5>Sale Total</h5>
				<p class="pb-0 mr-2" style="float: right; font-size: 40px;">P 1000.00</p>
			</div>
		</div>
		<div id="content" class="mr-2">
			<div id="price_column" class="m-2 table-responsive-sm">
				<table class="table-striped table-bordered w-100">
					<thead>
						<tr>
							<th>&nbsp&nbsp</th>
							<th>Description</th>
							<th>Price</th>
							<th>Qty</th>
							<th>Unit</th>
							<th>Sub.Total</th>
						</tr>
					</thead>
					<tbody>
						<tr></tr>
					</tbody>
				</table>
			</div>
			<div id="table_buttons">
				<button id="buttons" type="button" class="btn btn-secondary border ml-2">Clear Selected</button>
				<button id="buttons" type="button" class="btn btn-secondary border">Quantity</button>
				<div>
					<ul class="text-white d-flex justify-content-center mt-3">
						<li>Total : P 1000.00</li>
					</ul>
				</div>
			</div>
		</div>
		<div id="sidebar">
			<div id="search">
  				<form class="form-inline form-group">
   					 <input class="form-control w-75" type="search" placeholder="Search" aria-label="Search">
    				<button class="btn btn-secondary my-2 my-sm-0 border ml-2" type="submit">Search</button>
  				</form>
			</div>
			<div class="mt-0" id="product_area">
				<p>Products here!</p>
			</div>
		</div>
		<div id="footer" class="w-100">
			<button id="buttons" type="button" class="btn btn-secondary border mr-2 ml-2">User</button>
			<button id="buttons" type="button" class="btn btn-secondary border mr-2">Product</button>
			<button id="buttons" type="button" class="btn btn-secondary border mr-2">Supplier</button>
			<button id="buttons" type="button" class="btn btn-secondary border mr-2">Costumer</button>
			<button id="buttons" type="button" class="btn btn-secondary border mr-2">Logs</button>
			<button id="buttons" type="button" class="btn btn-secondary border mr-2">Cash-Flow</button>
			<button id="buttons" type="button" class="btn btn-secondary border mr-2">Sales</button>
			<button id="buttons" type="button" class="btn btn-secondary border mr-2">Inventory</button>
			<button id="buttons" type="button" class="btn btn-danger border mr-2">Logout</button>
		</div>

	</div>
</body>
</html>