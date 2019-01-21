<?php include("../server/connection.php");?>
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
					<img class="img-fluid p-2 h-100 w-100" src="../images/contact.png">
				</div>
				<input class="form-control-sm" type="file" name="image">
			</div>
			<dir class="second_side">
				<form class="mt-5 ml-5 w-75" method="post">
					<table>
						<tbody>
							<tr>
								<td  valign="baseline">Username:</td>
								<td class="pl-5 pb-4"><input type="text" name="username" value="" required></td>
							</tr>
							<tr>
								<td  valign="baseline">Firstname:</td>
								<td class="pl-5 pb-4"><input type="text" name="firstname" value="" required></td>
							</tr>
							<tr>
								<td  valign="baseline">Lastname:</td>
								<td class="pl-5 pb-4"><input type="text" name="lastname" value="" required></td>
							</tr>
							<tr>
								<td  valign="baseline">Contact number:</td>
								<td class="pl-5 pb-4"><input type="text" name="number" value="" required></td>
							</tr>
							<tr>
								<td  valign="baseline">Position:</td>
								<td class="pl-5 pb-4"><select name="position" class="form-control-sm" required>
									<option value="admin">admin</option>
									<option value="employee">employee</option></td>
							</tr>
						</tbody>
					</table>
					<div class="text-left mt-5">
						<button type="submit" class="btn btn-secondary">Submit</button>
						<button class="btn btn-danger" onclick="window.location.href='../user/user.php?username='" >Cancel</button>
					</div>
				</form>
			</dir>
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