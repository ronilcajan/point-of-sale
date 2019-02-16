<?php include('server/connection.php');?>
<?php 
	$query 	= "SELECT * FROM `customer`";
	$show	= mysqli_query($db,$query);
	if(isset($_GET['username'])){
		$user = $_GET['username'];
		$sql = "SELECT position FROM users WHERE username='$user'";
		$result	= mysqli_query($db, $sql);
		if (mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
?>
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
			<div class="text-white mt-0 ml-5">
				<table class="table-responsive-sm">
					<tbody>
						<tr>
							<td valign="baseline"><small>User Logged on:<small></td>
							<td valign="baseline"><small><p class="pt-3 ml-5"><?php echo $row['position'];}}}?></p><small></td>
						</tr>
						<tr>
							<td valign="baseline"><small class="pb-1">Date:<small></td>
							<td valign="baseline"><small><p class="p-0 ml-5"><span id='time'></p><small></td>
						</tr>
						<tr>
							<td valign="baseline"><input type="hidden" id="uname" value="<?php echo $user; ?>" class="user" /><small>Customer Name:<small></td>
							<td valign="baseline"><small><p class="p-0 ml-5">
								<select id='custom_id' name="customer" style='cursor:pointer'>
								<?php 
									if (mysqli_num_rows($show)>0){
										while ($row = mysqli_fetch_array($show)) {	?>
								<option value="<?php echo $row['customer_id']; ?>"><?php echo $row['firstname'];?></option>
								<?php }}?>
								</p></small></select>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="header_price border p-0">
				<h5>Grand Total</h5>
				<p class="pb-0 mr-2" style="float: right; font-size: 40px;" id="totalValue">₱ 0.00</p>
			</div>
		</div>
		<div id="content" class="mr-2">
			<div id="price_column" class="m-2 table-responsive-sm">
				<form method="POST" action="">
				<table class="table-striped w-100 font-weight-bold" style="cursor: pointer;" id="table2">
					<thead>
						<tr class='text-center'>
							<th>Barcode</th>
							<th>Description</th>
							<th>Price</th>
							<th>Unit</th>
							<th>Qty</th>
							<th>Sub.Total</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="tableData">
					</tbody>
				</table>
				</form>
			</div>
			<div id="table_buttons">
				<button id="buttons" type="button" name='enter' class="Enter btn btn-secondary border ml-2">Finish</button>
				<div>
					<ul class="text-white d-flex justify-content-center mt-3">
						<p>Total:&nbsp&nbsp<li id="totalValue1">₱ 0.00</li></p>
					</ul>
				</div>
			</div>
		</div>
		<div id="sidebar">
			<div>
   				<input class="form-control w-100" type="text" placeholder="Product Search" aria-label="Search" id="search" name="search" onkeyup="loadproducts();">
   			</div>
			<div class="mt-0" id="product_area" class="table-responsive-sm" >
				<table class="w-100 table-striped font-weight-bold" style="cursor: pointer;" id="table1">
					<thead>
						<tr claclass='text-center'><b>
							<td>Barcode</td>
							<td>Product Name</td>
							<td>Price</td>
							<td>Unit</td>
							<td>Stocks</td>
						</tr></b>
						<tbody id="products">
							
						</tbody>
					</thead>
				</table>
			</div>
			<div class="w-100 mt-2" id="enter_area">
				<button id="buttons" type="button" class="cancel btn btn-secondary border">Cancel Sale</button>
			</div>
		</div>
		<div id="footer" class="w-100">
			<button id="buttons" onclick="window.location.href='user/user.php?username=<?php echo $_GET['username'];?>'" class="btn btn-secondary border mr-2 ml-2">User</button>
			<button id="buttons" onclick="window.location.href='products/products.php?username=<?php echo $_GET['username'];?>'" class="btn btn-secondary border mr-2">Product</button>
			<button id="buttons" onclick="window.location.href='supplier/supplier.php?username=<?php echo $_GET['username'];?>'" class="btn btn-secondary border mr-2">Supplier</button>
			<button id="buttons" onclick="window.location.href='customer/customer.php?username=<?php echo $_GET['username'];?>'" class="btn btn-secondary border mr-2">Customer</button>
			<button id="buttons" onclick="window.location.href='logs/logs.php?username=<?php echo $_GET['username'];?>'" class="btn btn-secondary border mr-2">Logs</button>
			<button id="buttons" onclick="window.location.href='cashflow/cashflow.php?username=<?php echo $_GET['username'];?>'" class="btn btn-secondary border mr-2">Cash-Flow</button>
			<button id="buttons" onclick="window.location.href='sales/sales.php?username=<?php echo $_GET['username'];?>'" class="btn btn-secondary border mr-2">Sales</button>
			<button id="buttons" onclick="window.location.href='inventory/inventory.php?username=<?php echo $_GET['username'];?>'" class="btn btn-secondary border mr-2">Inventory</button>
			<a id="buttons" onclick=" return confirm('Are you sure you want to logout?')" href="index.php?username=<?php echo $_GET['username'];?>&logout='1'" class="btn btn-danger border mr-2" style="padding-top: 12px;">Logout</a>
		</div>
	</div>

	<?php include('templates/js_popper.php');?>
	<script type="text/javascript" src="script.js"></script>
	<script src="bootstrap4/js/time.js"></script>

</body>
</html> 