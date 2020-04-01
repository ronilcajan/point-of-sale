<?php
	include('../server/connection.php');

	
	$code 	= mysqli_real_escape_string($db, $_POST['barcode']);	
	$show 	= "SELECT * FROM products,product_delivered WHERE products.product_no ='$code' AND product_delivered.product_id ='$code'";
	$result	= mysqli_query($db,$show);

	$row = json_encode(mysqli_fetch_assoc($result));
	echo $row;