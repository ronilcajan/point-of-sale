<?php 
	include('../supplier/add.php');
	include '../set.php';
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');?>
</head>
<body>
	<div class="contain h-100">
		<?php include('../supplier/base.php');?>
		<div class="main">
			<div class="side">
				<h1 class="ml-4 mt-2"><i class="fas fa-user-tie"></i> Supplier Management</h1>
				<hr>
			</div>
			<div class="first_side ml-5 mt-5 mr-3">
				<div style="border:1px dashed black; width: 250px;height: 250px;">
					<img class="img-fluid p-2 h-100 w-100" src="../images/Worker.png">
				</div>
			<form method="post" enctype="multipart/form-data">
				<input type="hidden" name="size" class="form-control-sm" value="1000000">
				<input class="form-control-sm" type="file" name="image" required>
				<p class="bg-danger mt-3"><?php echo $msg;?></p>
			</div>
			<div class="second_side">
					<table class="table-responsive mt-5 ">
						<p><?php include('../error.php');?></p>
						<tbody>
							<tr>
								<td  valign="baseline">Company Name:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-building"></i></span></div><input type="text" name="com_name" class="form-control-sm form-control" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Firstname:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="text" name="firstname" class="form-control-sm form-control" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Lastname:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="text" name="lastname" class="form-control-sm form-control" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Address:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span></div><textarea name="address" required  class="form-control-sm form-control"cols="23"></textarea></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Contact Number:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span></div><input type="text" name="number" class="form-control-sm form-control" required></div></td>
							</tr>
						</tbody>
					</table>
					<div class="text-left mt-4">
						<button type="submit" name="add" class="btn btn-secondary"><i class="fas fa-thumbs-up"></i> Submit</button>
						<button class="btn btn-danger" onclick="window.location.href='../supplier/supplier.php'" ><i class="fas fa-ban"></i> Cancel</button>
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