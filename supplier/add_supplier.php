<?php include('../supplier/add.php');?>
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
				<h1 class="ml-4">supplier Management</h1>
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
								<td class="pl-5 pb-2"><input type="text" name="com_name" required></td>
							</tr>
							<tr>
								<td  valign="baseline">Firstname:</td>
								<td class="pl-5 pb-2"><input type="text" name="firstname" required></td>
							</tr>
							<tr>
								<td  valign="baseline">Lastname:</td>
								<td class="pl-5 pb-2"><input type="text" name="lastname" required></td>
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
						<button type="submit" name="add" class="btn btn-secondary">Submit</button>
						<button class="btn btn-danger" onclick="window.location.href='../supplier/supplier.php?username=<?php echo $_GET['username'	];?>'" >Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php include('../templates/js_popper.php');?>
	<script>
		$(function () {
  			$('[data-toggle="popover"]').popover()
	})
	</script>
</body>
</html>