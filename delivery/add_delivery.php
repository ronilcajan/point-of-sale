<?php 
	include('../server/connection.php');	
	include '../set.php';
	$sql = "SELECT supplier_id,company_name FROM supplier";
	$result = mysqli_query($db,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');?>
	<style type="text/css">
		#invoice-item-table tr th{
			font-size: 12px;
		}
	</style>
</head>
<body>
	<div class="contain h-100">
		<?php include('../delivery/base.php');?>
		<div>
			<form method="post" id="invoice_id">
				<div class="table-responsive mt-4 pl-5 pr-5">
					<table class="table table-striped table-bordered table-sm">
						<tr>
							<td>
								<div class="row mb-1">
									<div class="col-md-4">
										<b>SUPPLIER(From)</b><br/>
										<select name="order_reciever_name" id="order_reciever_name" class="form-control"	>
										<?php
										while($row = mysqli_fetch_assoc($result)){
										?>
											<option value="<?php echo $row['supplier_id'];?>"><?php echo $row['company_name'];?></option>
										<?php
										} 
										?>
										</select>
									</div>
									<div class="col-md-4">
										Transaction No.
										<input type="text" name="order_no" id="order_no" class="form-control input-sm" placeholder="Enter Transaction no."/>
									</div>
								</div>
								<table id="invoice-item-table" class="table table-bordered table-sm">
									<tr>
										<th>No</th>
										<th>Barcode</th>
										<th>Product Name</th>
										<th>Quantity</th>
										<th>Buy Price</th>
										<th>Unit</th>	
										<th>Tax Rate(%)</th>
										<th>Minimum Qty</th>
										<th>Sell Price</th>
										<th>Total Amount</th>
										<th><button type="button" name="add_row" id="add_row" class="btn btn-success btn-sm btn-xs">+</button></th>
									</tr>
									<tr>
										<td><span id="sr_no">1</span></td>
										<td><input type="text" name="barcode" id="barcode1" class="form-control form-control-sm input-sm barcode" placeholder="Barcode"/></td>
										<td><input type="text" name="product_name" id="product_name1" class="form-control form-control-sm  input-sm product_name" placeholder="Title"/></td>
										<td><input type="number" min="1" name="quantity" id="quantity1" data-srno="1" class="form-control form-control-sm input-sm quantity" placeholder="Qty" /></td>
										<td><input type="text" step="0.01" name="buy_price" id="buy_price1" data-srno="1" class="form-control form-control-sm input-sm buy_price" placeholder="Price" /></td>
										<td><input type="text" min="1.00" name="unit" id="unit1" data-srno="1" class="form-control form-control-sm  input-sm unit" placeholder="Kilograms"></td>
										<td><input type="number" name="tax_rate" id="tax_rate1" data-srno="1" class="form-control form-control-sm  input-sm tax_rate" placeholder="%"/></td>
										<td><input type="number" min="1" name="min_qty" id="min_qty1" data-srno="1" class="form-control form-control-sm  input-sm min_qty" placeholder="Qty" /></td>
										<td><input type="text" name="sell_price" readonly id="sell_price1" data-srno="1" class="form-control form-control-sm input-sm sell_price" placeholder="Price+Tax"></td>
										<td><input type="text" name="total_amount" readonly id="total_amount1" data-srno="1" class="form-control input-sm form-control-sm total_amount" placeholder="Sum"></td>
									</tr>								
								</table>
							</td>
						</tr>
						<tr>
							<td align="right">
								<input type="submit" name="create_delivery" value="Okay" id="create_delivery" class="btn btn-sm btn-info mr-5"/>
								<b>Grand Total:&nbsp<h4 id="final_total_amount">₱ 0.00</h4></b>
							</td>
						</tr>
					</table>
				</div>
				</form>
		</div>
	</div>

	<script src="../bootstrap4/jquery/jquery.min.js"></script>
	<script src="../bootstrap4/jquery/datepicker.js"></script>
	<script src="../bootstrap4/js/bootstrap.bundle.min.js"></script>
	<script src="../delivery/javascript.js"></script>
</body>
</html>