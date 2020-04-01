<?php 
	include("../server/connection.php");
	include('../supplier/update.php');
	include '../set.php';

  	if (isset($_GET['id'])){
		$id   =   $_GET['id'];
		$sql  =   "SELECT * FROM supplier WHERE supplier_id = '$id'";
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
	<button id="sidebar_button" onclick="window.location.href='../supplier/supplier.php'"><i class="fas fa-list-ul"></i> Supplier List</button>
	<button id="sidebar_button" onclick="window.location.href='../supplier/supplier.php'"><i class="fas fa-user-plus"></i> Add Supplier</button>
	<button id="sidebar_button" type="button" data-toggle="popover" title="Supplier Management" data-content="Here you will create, update, delete and view supplier profiles." data-placement="bottom"><i class="fas fa-question"></i>  Help</button>
	<div class="fixed-bottom">
		<button class="btn m-2 p-2" id="sidebar_button" onclick="window.location.href='../main.php'"><i class="fas fa-arrow-alt-circle-left"></i> Back</button>
	</div>
</div>
		<div class="main">
			<div class="side">
				<h1 class="ml-4">Supplier Management</h1>
				<hr>
			</div>
			<div class="first_side ml-5 mt-5 mr-3">
				<div style="border:1px dashed black; width: 250px;height: 250px;">
					<?php echo "<img class='img-fluid p-2 h-100 w-100' src='../images/".$row['image']."'>";?>
				</div>
			<form method="post" enctype="multipart/form-data">
				<input type="hidden" name="size" value="1000000">
			</div>
			<div class="second_side table-responsive">
					<p class="bg-danger w-50"><?php echo $msg;?></p>
					<table class="mt-5">
						<tbody>
							<tr>
								<td  valign="baseline">Company Name:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-building"></i></span></div><input type="text" name="com_name" pattern="[A-Za-z0-9]+" title="Name must not contain numbers or spaces. e.g John12" class="form-control-sm form-control" value="<?php echo $row['company_name'];?>" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Firstname:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="text" name="firstname" pattern="[A-Za-z]+" title="Name must not contain numbers or spaces e.g John12" class="form-control-sm form-control" value="<?php echo $row['firstname'];?>" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Lastname:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="text" name="lastname" pattern="[A-Za-z]+" title="Name must not contain numbers or spaces e.g John12" class="form-control-sm form-control" value="<?php echo $row['lastname'];?>" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Address:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span></div><textarea name="address" pattern="[A-Za-z0-9]+" class="form-control-sm form-control" required cols="23"><?php echo $row['address'];?></textarea></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Contact Number:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span></div><input class="form-control-sm form-control" pattern='[\+]\d{2}[\(]\d{2}[\)]\d{4}[\-]\d{4}' title='Phone Number (Format: +99(99)9999-9999)' type="text" name="number" value="<?php echo $row['contact_number'];?>" required></div></td>
							</tr>
								<td><i class="fas fa-file-upload"></i> Change Photo:</td>
								<td><input class="form-control-sm pl-5" type="file" name="image"></td>
							</tr>
						</tbody>
					</table>
					<div class="text-left mt-3">
						<input type="hidden" name="id" value="<?php echo $row['supplier_id'];?>">
						<button type="submit" name="update" class="btn btn-secondary"><i class="fas fa-thumbs-up"></i> Update</button>
						<button type="button" class="btn btn-danger" onclick="window.location.href='../supplier/supplier.php'" ><i class="fas fa-ban"></i> Cancel</button>
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