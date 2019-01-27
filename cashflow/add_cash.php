<?php include('../cashflow/abs(number)dd.php');?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');?>
</head>
<body>
	<div class="contain h-100">
		<?php include('../cashflow/base.php');?>
		<div class="main">
			<div class="side">
				<h1 class="ml-4">Customer Management</h1>
				<hr>
			</div>
			<div class="first_side ml-5 mt-5 mr-3">
				<div style="border:1px dashed black; width: 250px;height: 250px;">
					<img class="img-fluid p-2 h-100 w-100" src="../images/cashflow.png">
				</div>
			<form method="post">
				<p class="bg-danger mt-3"><?php echo $msg;?></p>
			</div>
			<dir class="second_side">
					<table class="table-responsive mt-5">
						<p><?php include('../error.php');?></p>
						<tbody>
							<tr>
								<td  valign="baseline">Purpose:</td>
								<td class="pl-5 pb-2"><textarea name="purpose" required cols="23" rows="8">Cash-in</textarea></td>
							</tr>
							<tr>
								<td  valign="baseline">Amount:</td>
								<td class="pl-5 pb-2"><input type="text" name="amount"></td>
							</tr>
						</tbody>
					</table>
					<div class="text-left mt-5" style="margin-top: 50px;">
						<input type="hidden" name="username" value="<?php echo $_GET['username'];?>"/>
						<button type="submit" name="add_customer" class="btn btn-secondary">Submit</button>
						<button class="btn btn-danger" onclick="window.location.href='../cashflow/cashflow.php?username=<?php echo $_GET['username'	];?>'" >Cancel</button>
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