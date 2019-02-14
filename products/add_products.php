<?php include('../products/add.php');?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');?>
</head>
<body>
	<div class="contain h-100">
		<?php include('../products/base.php');?>
		<div class="main">
			<div class="side">
				<h1 class="ml-4">Product Management</h1>
				<hr>
			</div>
			<div class="first_side ml-5 mt-5 mr-3">
				<div style="border:1px dashed black; width: 250px;height: 250px;">
					<img class="img-fluid p-2 h-100 w-100" src="../images/product.png">
				</div>
			<form method="post" enctype="multipart/form-data">
				<input type="hidden" name="size" class="form-control-sm" value="1000000">
				<input class="form-control-sm" type="file" name="image" required>
				<p class="bg-danger mt-3"><?php echo $msg;?></p>
			</div>
			<dir class="second_side">
					<table class="table-responsive mt-5">
						<p><?php include('../error.php');?></p>
						<tbody>
							<tr>
								<td  valign="baseline">Name:</td>
								<td class="pl-5 pb-2"><input type="text" name="product_name" required></td>
							</tr>
							<tr>
								<td  valign="baseline">Sell Price:</td>
								<td class="pl-5 pb-2"><input type="number" name="price" required></td>
							</tr>
							<tr>
								<td  valign="baseline">Quantity:</td>
								<td class="pl-5 pb-2"><input type="number" name="qty" required></td>
							</tr>
							<tr>
								<td  valign="baseline">Unit:</td>
								<td class="pl-5 pb-2"><input type="text" name="unit" required></td>
							</tr>
							<tr>
								<td  valign="baseline">Minimum stocks:</td>
								<td class="pl-5 pb-2"><input type="number" name="min_stocks" required></td>
							</tr>
						</tbody>
					</table>
					<div class="text-left mt-4">
						<button type="submit" name="addproducts" class="btn btn-secondary">Submit</button>
						<button class="btn btn-danger" onclick="window.location.href='../products/products.php?username=<?php echo $_GET['username'	];?>'" >Cancel</button>
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