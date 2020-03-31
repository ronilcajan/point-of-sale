<?php 
	include('../server/connection.php');
	include '../set.php';
	$success = isset($_GET['success']);
	$failure = isset($_GET['failure']);
	$error = array();
	$alert = array();
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
		<?php include('../delivery/base.php');
			if($success){
			echo '<script>swal("Success","Successfully Added!","success");</script>';
			}
			if($failure){
			echo '<script>swal("Error","Supplier name not found!","error");</script>';
			}
		?>
		<div class="main">
			<div class="side">
				<h1 class="ml-4 pt-2" align="left"><i class="fas fa-truck"></i> Deliveries</h1>
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
				
				<label><i class="fas fa-file-upload"></i> <small>Upload CSV:</small></label>
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
								<td class="pl-5 pb-1"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">
										<i class="fas fa-hands-helping"></i></span></div><input type="text" name="transaction_no" class="form-control-sm form-control" value="<?php echo strtoupper(uniqid())?>" required readonly /></div></td>
							</tr>
							<tr>
								<td valign="baseline"><small>Supplier Name:</small></td>
								<td class="pl-5 pb-1">
									<div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">
										<i class="fas fa-user-tie"></i></span></div>
									<input type="text" class="form-control form-control-sm supplier_search" autocomplete="off" data-provide="typeahead" id="supplier_search" placeholder="Supplier Search" name="supplier"/></td>
								</td>
								<td valign="baseline"><div class="ml-3"><button class="btn-sm btn-info border" data-toggle="modal" data-target=".modal"  style="padding:1px;"><span class="badge badge-info"><i class="fas fa-user-plus"></i> New</span></button></div></td>
							</tr>
							<tr>
								<td valign="baseline"><small>Product Barcode:</small></td>
								<td class="pl-5 pb-1"><input type="text" name="product_name" class="form-control form-control-sm" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline"><small>Product Name:</small></td>
								<td class="pl-5 pb-1"><input type="text" class="form-control form-control-sm"  name="product_name" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline"><small>Buy Price:</small></td>
								<td class="pl-5 pb-1"><input type="number" class="form-control form-control-sm"  step="0.01" name="buy_price" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline"><small>Tax Rate:</small></td>
								<td class="pl-5 pb-1"><input type="number" class="form-control form-control-sm"  step="0.01" name="price" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline"><small>Quantity:</small></td>
								<td class="pl-5 pb-1"><input type="number" class="form-control form-control-sm"  name="qty" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline"><small>Unit:</small></td>
								<td class="pl-5 pb-1"><input type="text" class="form-control form-control-sm"  name="unit" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline"><small>Minimum stocks:</small></td>
								<td class="pl-5 pb-1"><input type="number" class="form-control form-control-sm"  name="min_stocks" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline"><small>Remarks:</small></td>
								<td class="pl-5 pb-1"><input type="text" class="form-control form-control-sm"  name="remarks" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
							<tr>
								<td valign="baseline"><small>Location:</small></td>
								<td class="pl-5 pb-1"><input type="text" class="form-control form-control-sm"  name="remarks" readonly></td>
								<td><p class="text-danger">*</p></td>
							</tr>
						</tbody>
					</table>
					<div class="text-left mt-2 pt-1">
						<input type="submit" name="upload" class="btn btn-secondary" value="Done"/>
						<button class="btn btn-danger" onclick="window.location.href='../delivery/delivery.php"><i class="fas fa-ban"></i> Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script src="../bootstrap4/jquery/jquery.min.js"></script>
	<script src="../bootstrap4/jquery/datepicker.js"></script>
	<script src="../bootstrap4/js/bootstrap.bundle.min.js"></script>
	<script src="../bootstrap4/js/typeahead1.js"></script>
	<script src="../delivery/javascript.js"></script>
	<?php include('../delivery/add_supplier1.php');?>
</body>
</html> 
