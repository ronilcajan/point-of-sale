<?php include('server/connection.php'); ?>
<?php include('login.php');?>
<!DOCTYPE html>
<html>
<head>
	<?php include('templates/head.php'); ?>
</head>
<body class="bg-dark">
	<div class="text-center border border-dark">
		<div class="main">
			<img class="img-fluid" src="images/logo.png"/>
  			<center><?php include('error.php');?></center>
		</div>
		<div class="fixed-bottom mb-2">
			<div class="d-inline">
				<button type="button" id="admin" class="btn-lg btn-secondary" data-toggle="modal" data-target=".bd-example-modal-sm">Administrator</button>
			</div>
			<div class="d-inline">
				<button type="button" id="user" class="btn-lg btn-secondary" data-toggle="modal" data-target="#modal-user">Log In</button>
			</div>
		</div>
	</div>
	<script src="bootstrap4/jquery/jquery.js"></script>
	<script src="bootstrap4/js/bootstrap.bundle.min.js"></script>
	<?php include('modals/admin_login_modal.php');?>
	<?php include('modals/employee_login_modal.php');?>
</body>
</html>
