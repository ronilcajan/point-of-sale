<?php include("../server/connection.php");
	  include('../customer/update.php');
	  include '../set.php';

  	if (isset($_GET['id'])){
		$id   =   $_GET['id'];
		$sql  =   "SELECT * FROM customer WHERE customer_id = '$id'";
		$result   = mysqli_query($db, $sql);
		$row  =   mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');?>
</head>
<body>
	<div class="contain h-100">
		<div class="header bg-dark">
	<img class="img-fluid w-100 mt-2 ml-1" src="../images/logo.png" >
</div>
<div class="sidebar">
	<button><h3><i class="fas fa-tachometer-alt"></i> Dashboard</h3></button>
	<button id="sidebar_button" onclick="window.location.href='../customer/customer.php'"><i class="fas fa-list-ul"></i>  Customer List</button>
	<button id="sidebar_button" onclick="window.location.href='../customer/add_customer.php'"><i class="fas fa-user-plus"></i> Add Customer</button>
	<button id="sidebar_button" type="button" data-toggle="popover" title="Customer Management" data-content="Here you will create, update, delete and customer profiles." data-placement="bottom"><i class="fas fa-question"></i> Help</button>
	<div class="fixed-bottom">
		<button class="btn m-2 p-2" id="sidebar_button" onclick="window.location.href='../main.php'"><i class="fas fa-arrow-alt-circle-left"></i> Back</button>
	</div>
</div>
		<div class="main">
			<div class="side">
				<h1 class="ml-4">Customer Management</h1>
				<hr>
				<?php include '../customer/alert.php';?>
			</div>
			<div class="first_side ml-5 mt-5 mr-3">
				<div style="border:1px dashed black; width: 250px;height: 250px;">
					<?php echo "<img class='img-fluid p-2 h-100 w-100' src='../images/".$row['image']."'>";?>
				</div>
			<form method="post" enctype="multipart/form-data">
				<input type="hidden" name="size" value="1000000">
			</div>
			<div class="second_side">
					<p class="bg-danger w-50">
					<table class="mt-5">
						<tbody>
							<tr>
								<td valign="baseline">First Name:</td>
								<td class="pl-5 pb-1"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="text" name="fname" value="<?php echo $row['firstname'];?>" class="form-control-sm form-control" pattern="[A-Za-z]+" title="Name must not contain numbers or spaces e.g John12" required></div></td>
							</tr>
							<tr>
								<td valign="baseline">Last Name:</td>
								<td class="pl-5 pb-1"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="text" name="lname" value="<?php echo $row['lastname'];?>" class="form-control form-control-sm" pattern="[A-Za-z]+" title="Name must not contain numbers or spaces e.g John12" required></div></td>
							</tr>
							<tr>
								<td valign="baseline">Address:</td>
								<td class="pl-5 pb-1"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span></div><textarea name="address" pattern="[A-Za-z0-9]+" class="form-control form-control-sm" required cols="23"><?php echo $row['address'];?></textarea></div></td>
							</tr>
							<tr>
								<td valign="baseline">Contact Number:</td>
								<td class="pl-5 pb-1"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span></div><input type="text" name="number" pattern='[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}' title='Phone Number (Format: +99(99)9999-9999)' class="form-control-sm form-control" value="<?php echo $row['contact_number'];?>" required></div></td>
							</tr>
							<tr>
								<td>Change Photo:</td>
								<td><input class="form-control-sm pl-5" type="file" name="image"></td>
							</tr>
						</tbody>
					</table>
					<div class="text-left mt-2">
						<input type="hidden" name="id" value="<?php echo $row['customer_id'];?>">
						<button type="submit" name="update_customer" class="btn btn-secondary"><i class="fas fa-thumbs-up"></i> Update</button>
						<button type="button" class="btn btn-danger" onclick="window.location.href='../customer/customer.php'" ><i class="fas fa-ban"></i> Cancel</button>
					<?php } ?>
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