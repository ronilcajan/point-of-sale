<?php 
	include('../cashflow/add.php');
	include '../set.php';
	?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');?>
</head>
<body>
	<div class="contain h-100">
		<?php 
			include('../cashflow/base.php');
		?>
		<div class="main">
			<div class="side">
				<h1 class="ml-4"><i class="fas fa-money-bill-alt"></i> Cash Management</h1>
				<hr>
			</div>
			<div class="first_side ml-5 mt-5 mr-3">
				<div style="border:1px dashed black; width: 250px;height: 250px;">
					<img class="img-fluid p-2 h-100 w-100" src="../images/cashflow.png">
				</div>
			<form method="post">
				<p class="bg-danger mt-3">
			</div>
			<dir class="second_side">
					<table class="table-responsive mt-5">
						<tbody>
							<tr>
								<td  valign="baseline">Purpose:</td>
								<td class="pl-5 pb-2"><textarea name="purpose" required placeholder="Enter Purpose" cols="28" rows="8" class="form-control">Cash-in</textarea></td>
							</tr>
							<tr>
								<td  valign="baseline">Amount:</td>
								<td class="pl-5 pb-2"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">₱</span></div><input type="number" name="amount" class="form-control" placeholder="Enter amount" required></div></td>
							</tr>
						</tbody>
					</table>
					<div class="text-left mt-5" style="margin-top: 50px;">
						<input type="hidden" name="username" value="<?php echo $_SESSION['username'];?>"/>
						<button type="submit" name="add_customer" class="btn btn-secondary"><i class="fas fa-check-circle"></i> Submit</button>
						<button class="btn btn-danger ml-2" onclick="window.location.href='../cashflow/cashflow.php" ><i class="fas fa-ban"></i> Cancel</button>
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