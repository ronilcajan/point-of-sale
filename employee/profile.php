<?php 
	include('../server/connection.php');
	include('../user/passchange.php');
	include('../set.php');

	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = mysqli_query($db ,$sql);
		$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<?php include('../templates/head1.php');?>
</head>
<body>
	<div class="contain h-100">
		<?php include('../employee/base.php');?>
		<div class="main">
			<div class="side">
				<h1 class="ml-4 pt-2"><i class="fas fa-users"></i> My Profile</h1>
				<hr>
			</div>
			<div class="first_side ml-5 mt-5 mr-3">
				<div style="width: 250px;height: 250px;">
					<?php echo "<img class='img-fluid p-2 h-100 w-100' src='../images/".$row['image']."'>";?>
				</div>
			<form method="post" enctype="multipart/form-data">
			</div>
			<div class="second_side">
					<table class="table-responsive mt-5">
						<p><?php include('../error.php');?></p>
						<tbody>
							<tr>
								<td class="pb-3"><?php echo "<h3><i class='fas fa-user-circle text-secondary'></i> ".$row['firstname']."&nbsp".$row['lastname']."</h3>"; ?></td>
							</tr>
							<tr>
								<td class="pb-3"><h4><i class="fas fa-phone"></i> <?php echo $row['contact_number'];?></h4></td>
							</tr>
							<tr>
								<td class="pb-3"><h4><i class="fas fa-user-shield"></i> <?php echo $row['position'];?></h4></td>
							</tr>
						</tbody>
					</table>
					<div class="text-left mt-4">
						<a title="Edit" href="update_user.php?id=<?php echo $row['id'];?>" class="btn btn-info"><i class="fas fa-user-edit"></i> Edit </a>
						<button type="button" id="user" title="Change Password?" class="btn btn-success" data-toggle="modal" data-target="#modal-user"><i class="fas fa-edit"></i> Change Password</button>
					</div>
				</form>
			<?php } ?>
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
	<?php include('../user/changepassword.php');
		include('../user/error.php');
	include('../user/alert.php');?>
</body>
</html>
