<?php 
	include('../user/add.php');
	include '../set.php';
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');?>
	<style type="text/css">
		.field-icon {
  float: right;
  margin-left: -20px;
  margin-top: 8px;
  margin-right: 4px;
  position: relative;
  z-index: 2;
}
	</style>
</head>
<body>
	<div class="contain h-100">
		<?php include('../user/base.php');?>
		<div class="main">
			<div class="side">
				<h1 class="ml-4 pt-2"><i class="fas fa-users"></i> User Management</h1>
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
			<div class="second_side ml-4">
					<table class="table-responsive mt-5">
						<p><?php include('../error.php');?></p>
						<tbody>
							<tr>
								<td  valign="baseline">Username:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-user-circle"></i></span></div><input type="text" name="username" pattern="[a-z0-9]{1,15}" title="Username should contain lowercase or letters. e.g. john12" class="form-control form-control-sm" placeholder="Enter Username" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Firstname:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="text" name="firstname" title="Name must not contain numbers or spaces. e.g John12" class="form-control form-control-sm" placeholder="Enter Firstname" pattern="[A-Za-z]+" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Lastname:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="text" name="lastname" pattern="[A-Za-z]+" title="Name must not contain numbers or spaces e.g John12" class="form-control form-control-sm" placeholder="Enter Lastname" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Contact number:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span></div><input type="tel" name="number" pattern='[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}' title='Phone Number (Format: +99(99)9999-9999)' class="form-control form-control-sm" placeholder="Enter Contact number" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Password:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span></div><input type="password" name="password" class="form-control form-control-sm" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" id="password-field" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter Password" minlength="8" required> <span toggle="#password-field" class="fa fa-sm fa-eye field-icon toggle-password"></span></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Confirm Password:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span></div><input type="password" name="password1" minlength="8" id="password-field1" class="form-control form-control-sm" placeholder="Confirm Password" required><span toggle="#password-field1" class="fa fa-sm fa-eye field-icon toggle-password"></span></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Position:</td>

								<td class="pl-5 pb-2">
									<div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">
									<i class="fas fa-user-tag"></i></span></div>
									<select name="position" class="form-control-sm form-control" required>
										<option value="Admin">Admin</option>
										<option value="Employee">Employee</option>
									</select>
								</div>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="text-left mt-4">
						<button type="submit" name="add" class="btn btn-secondary"><i class="fas fa-check-circle"></i> Submit</button>
						<button class="btn btn-danger" onclick="window.location.href='../user/user.php'" ><i class="fas fa-ban"></i> Cancel</button>
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
	});
	$(".toggle-password").click(function() {
  		$(this).toggleClass("fa-eye fa-eye-slash");
  		var input = $($(this).attr("toggle"));
  		if (input.attr("type") == "password") {
    		input.attr("type", "text");
  		} else {
    		input.attr("type", "password");
  		}
	});
	</script>
</body>
</html>