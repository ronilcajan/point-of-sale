<?php 
	include("../server/connection.php");
	include '../set.php';

  	if (isset($_GET['id'])){
		$id   =   $_GET['id'];
		$sql  =   "SELECT * FROM products WHERE product_no='$id'";
		$result1   = mysqli_query($db, $sql);
		$row1  =   mysqli_fetch_array($result1);
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
	<button><h3><i class="fas fa-tachometer-alt"></i>  Dashboard</h3></button>
	<button id="sidebar_button" onclick="window.location.href='../products/products.php'"><i class="fas fa-list-ul"></i> Product List</button>
	<button id="sidebar_button" onclick="window.location.href='../delivery/add_delivery.php'"><i class="fas fa-truck"></i> Delivery</button>
	<button id="sidebar_button" type="button" data-toggle="popover" title="Product Management" data-content="Here you will create, update, delete and view products." data-placement="bottom"><i class="fas fa-question"></i> Help</button>
	<div class="fixed-bottom">
		<button class="btn m-2 p-2" id="sidebar_button" onclick="window.location.href='../main.php'"><i class="fas fa-arrow-alt-circle-left"></i> Back</button>
	</div>
</div>
		<div class="main">
			<div class="side">
				<h1 class="ml-4">Product Management</h1>
				<hr>
			</div>
			<div class="first_side ml-5 mt-5 mr-3">
				<div style="border:1px dashed black; width: 250px;height: 250px;">
					<?php echo "<img class='img-fluid p-2 h-100 w-100' src='../images/".$row1['images']."'>"; ?>
				</div>
			<form method="post" enctype="multipart/form-data" action="../products/update.php">
				<input type="hidden" name="size" value="1000000">
				<input type="hidden" name="id" value="<?php echo $row1['product_no'];?>">
			</div>
			<div class="second_side table-responsive">
					<p class="bg-danger w-50"><?php echo $msg;?></p>
					<table class="mt-5">
						<tbody>
							<tr>
								<td  valign="baseline">Name:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="text" name="product_name" class="form-control-sm form-control" value="<?php echo $row1['product_name'];?>"required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Sell Price:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="number" name="price" step="0.01" value="<?php echo $row1['sell_price'];?>" class="form-control form-control-sm" required></td>
							</tr>
							<tr>
								<td  valign="baseline">Quantity:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="number" name="qty" value="<?php echo $row1['quantity'];?>" class="form-control-sm form-control" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Unit:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="text" name="unit" value="<?php echo $row1['unit'];?>" class="form-control-sm form-control" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Minimum stocks:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="number" name="min_stocks" value="<?php echo $row1['min_stocks'];?>" class="form-control-sm form-control" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Remarks:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="text" name="remarks" value="<?php echo $row1['remarks'];?>" class="form-control-sm form-control" required></div></td>
							</tr>
							<tr>
								<td  valign="baseline">Location:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fas fa-pen-alt"></i></span></div><input type="text" name="location" value="<?php echo $row1['location'];?>" class="form-control-sm form-control" required></div></td>
							</tr>
						<?php }?>
							<tr>
								<td>Change Photo:</td>
								<td><input class="form-control-sm pl-5" type="file" name="images"></td>
							</tr>
						</tbody>
					</table>
					<div class="text-left mt-3">
						<button type="submit" name="update" class="btn btn-secondary"><i class="fas fa-thumbs-up"></i> Update</button>
						<button type="button" class="btn btn-danger" onclick="window.location.href='../products/products.php'" ><i class="fas fa-ban"></i> Cancel</button>
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