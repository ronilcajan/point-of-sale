<?php 
	include('../server/connection.php');
	include('../delivery/upload.php');
	include '../set.php';
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
						In importing CSV file, please make sure the required(<span class="text-danger">*</span>) is filled up in your file in order. Image is not required so you can edit the products anytime.
					</p>
				</div>
			<form method="post" enctype="multipart/form-data">
				<label>Upload CSV:</label>
				<input class="form-control-sm" type="file" name="file">
				<p class="bg-danger mt-3"><?php echo $msg;?></p>
			</div>
			<div class="second_side">
					<table class="table-responsive mt-5">
						<p><?php 
								include('../error.php');
								include('../delivery/alert.php');?></p>
						<tbody>
							<tr>
								<td valign="baseline">Supplier Name:</td>
								<td class="pl-5 pb-2">
									<select name="supplier" style='cursor:pointer'>
									<?php 
									if (mysqli_num_rows($result)>0) {
										while ($row = mysqli_fetch_arrows($result)) {
									?>
									<option value="<?php echo $row['supplier_id']; ?>"><?php echo $row['company_name'];?></option>
								<?php
								}}?>
									</select>
								</td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline">Product Name:</td>
								<td class="pl-5 pb-2"><input type="text" name="product_name" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline">Buy Price:</td>
								<td class="pl-5 pb-2"><input type="number" step="0.01" name="buy_price" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline">Sell Price:</td>
								<td class="pl-5 pb-2"><input type="number" step="0.01" name="price" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline">Quantity:</td>
								<td class="pl-5 pb-2"><input type="number" name="qty" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline">Unit:</td>
								<td class="pl-5 pb-2"><input type="text" name="unit" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline">Minimum stocks:</td>
								<td class="pl-5 pb-2"><input type="number" name="min_stocks" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
						</tbody>
					</table>
					<div class="text-left mt-2 pt-2">
						<button type="submit" name="upload" class="btn btn-secondary">Import CSV</button>
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