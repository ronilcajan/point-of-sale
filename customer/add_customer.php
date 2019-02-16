<?php include('../customer/add.php');?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');?>
</head>
<body>
	<div class="contain h-100">
		<?php 
			include('../customer/base.php');
			include '../alert/alert.php';
		?>
		<div class="main">
			<div class="side">
				<h1 class="ml-4">Customer Management</h1>
				<hr>
			</div>
			<div class="first_side ml-5 mt-5 mr-3">
				<div style="border:1px dashed black; width: 250px;height: 250px;">
					<img class="img-fluid p-2 h-100 w-100" src="../images/customer.png">
				</div>
			<form method="post" enctype="multipart/form-data">
				<input type="hidden" name="size" class="form-control-sm" value="1000000">
				<input class="form-control-sm" type="file" name="image" required>
				<p class="bg-danger mt-3">
			</div>
			<dir class="second_side">
					<table class="table-responsive mt-5">
						<tbody>
							<tr>
								<td  valign="baseline">First Name:</td>
								<td class="pl-5 pb-2"><input type="text" name="fname" required></td>
							</tr>
							<tr>
								<td  valign="baseline">Last Name:</td>
								<td class="pl-5 pb-2"><input type="text" name="lname" required></td>
							</tr>
							<tr>
								<td  valign="baseline">Address:</td>
								<td class="pl-5 pb-2"><textarea name="address" required cols="23"></textarea></td>
							</tr>
							<tr>
								<td  valign="baseline">Contact Number:</td>
								<td class="pl-5 pb-2"><input type="text" name="number" required></td>
							</tr>
						</tbody>
					</table>
					<div class="text-left mt-4">
						<button type="submit" name="add_customer" class="btn btn-secondary">Submit</button>
						<button class="btn btn-danger" onclick="window.location.href='../customer/customer.php?username=<?php echo $_GET['username'	];?>'" >Cancel</button>
					</div>
				</form>
			</dir>
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