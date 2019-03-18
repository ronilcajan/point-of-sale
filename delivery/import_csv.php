<?php 
	include('../server/connection.php');
	include '../set.php';

	$error = array();
	$alert = array();

	$sql = "SELECT supplier_id,company_name FROM supplier";
	$result = mysqli_query($db,$sql);
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');?>
	<style type="text/css">
		input[name='file']{
			width: 150px;
		}
	</style>
</head>
<body>
	<div class="contain h-100">
		<?php include('../delivery/base.php');?>
		<div class="main">
			<div class="side">
				<h1 class="ml-4">Product Management</h1>
				<hr>
			</div>
			<div class="first_side ml-5 mt-4 mr-3">
				<div class="shadow-lg p-3 mb-5 bg-white rounded" style="width: 260px;padding-right:20px;height: 250px;">
					<h4 class="text-danger">Important Reminder!</h4>
					<p>
						In importing CSV file, please make sure the required(<span class="text-danger">*</span>) is filled up in your excel file or spreadsheet.Please make it in order.<br/><small>Image is not required so you can edit the products anytime.</small>
					</p>
				</div>
			<form method="POST" enctype="multipart/form-data" action="../delivery/upload.php">
				
				<label><small>Upload CSV:</small></label>
				<input class="form-control-sm" type="file" name="file" required />
				<p class="bg-danger mt-3"><?php echo $msg;?></p>
			</div>
			<div class="second_side">
					<table class="table-responsive mt-4">
						<p><?php 
								include('../error.php');
								include('../delivery/alert.php');?></p>
						<tbody>
							<tr>
								<td valign="baseline"><small>Transaction No.</small></td>
								<td class="pl-5 pb-1"><input type="text" name="transaction_no" placeholder="Enter Transaction No" class="form-control-sm form-control" required /></td>
							</tr>
							<tr>
								<td valign="baseline"><small>Supplier Name:</small></td>
								<td class="pl-5 pb-1">
									<select name="supplier" style='cursor:pointer' class='form-control-sm form-control' required>
									<?php 
									if (mysqli_num_rows($result)>0) {
										while ($row = mysqli_fetch_assoc($result)) {
									?>
									<option value="<?php echo $row['supplier_id']; ?>"><?php echo $row['company_name'];?></option>
								<?php
								}}?>
									</select>
								</td>

							</tr>
							<tr>
								<td valign="baseline"><small>Product Barcode:</small></td>
								<td class="pl-5 pb-1"><input type="text" name="product_name" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline"><small>Product Name:</small></td>
								<td class="pl-5 pb-1"><input type="text" name="product_name" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline"><small>Buy Price:</small></td>
								<td class="pl-5 pb-1"><input type="number" step="0.01" name="buy_price" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline"><small>Tax Rate:</small></td>
								<td class="pl-5 pb-1"><input type="number" step="0.01" name="price" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline"><small>Quantity:</small></td>
								<td class="pl-5 pb-1"><input type="number" name="qty" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline"><small>Unit:</small></td>
								<td class="pl-5 pb-1"><input type="text" name="unit" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline"><small>Minimum stocks:</small></td>
								<td class="pl-5 pb-1"><input type="number" name="min_stocks" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
						</tbody>
					</table>
					<div class="text-left mt-2 pt-1">
						<input type="submit" name="upload" class="btn btn-secondary" value="Done"/>
						<button class="btn btn-danger" onclick="window.location.href='../delivery/delivery.php">Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="../bootstrap4/jquery/jquery.min.js"></script>
	<script src="../bootstrap4/js/bootstrap.bundle.min.js"></script>
	<script>
		$(function () {
  			$('[data-toggle="popover"]').popover()
	})
	</script>
</body>
</html> 