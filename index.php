<?php include('server/connection.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Point of Sale</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/style.css" />
</head>
<body class="bg-dark">
	<div class="text-center">
		<div class="main h-100">
			<img class="img-fluid" src="images/logo.png"/>
		</div>
		<div class="fixed-bottom mb-2">
			<button type="button" id="admin" name="admin" class="btn-lg btn-secondary" data-toggle="modal" data-target=".bd-example-modal-sm">Administrator</button>
			<button type="button" id="user" class="btn-lg btn-secondary" data-toggle="modal" data-target="#modal-user">Log In</button>
			</div>
		</div>
	<script src="bootstrap4/jquery/jquery.js"></script>
	<script src="bootstrap4/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php include('modals/modals.php');?>