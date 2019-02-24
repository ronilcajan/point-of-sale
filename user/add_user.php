<?php 
	include('../user/add.php');
	include '../set.php';
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');?>
</head>
<body>
	<div class="contain h-100">
		<?php include('../user/base.php');?>
		<div class="main">
			<div class="side">
				<h1 class="ml-4">User Management</h1>
				<hr>
			</div>
			<div class="first_side ml-5 mt-5 mr-3">
				<div style="border:1px dashed black; width: 250px;height: 250px;">
					<img class="img-fluid p-2 h-100 w-100" src="../images/user.png">
				</div>
			<form method="post" enctype="multipart/form-data">
				<input type="hidden" name="size" class="form-control-sm" value="1000000">
				<input class="form-control-sm" type="file" name="image" required>
			</div>
			<div class="second_side">
					<table class="table-responsive mt-5">
						<p><?php include('../error.php');?></p>
						<tbody>
							<tr>
								<td  valign="baseline">Username:</td>
								<td class="pl-5 pb-2"><input type="text" name="username" required></td>
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
								<td  valign="baseline">Contact number:</td>
								<td class="pl-5 pb-2"><input type="text" name="number" required></td>
							</tr>
							<tr>
								<td  valign="baseline">Password:</td>
								<td class="pl-5 pb-2"><input type="password" name="password" required></td>
							</tr>
							<tr>
								<td  valign="baseline">Confirm Password:</td>
								<td class="pl-5 pb-2"><input type="password" name="password1" required></td>
							</tr>
							<tr>
								<td  valign="baseline">Position:</td>
								<td class="pl-5 pb-2">
									<select name="position">
										<option value="Admin">Admin</option>
										<option value="Employee">Employee</option>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="text-left mt-4">
						<button type="submit" name="add" class="btn btn-secondary">Submit</button>
						<button class="btn btn-danger" onclick="window.location.href='../user/user.php'" >Cancel</button>
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