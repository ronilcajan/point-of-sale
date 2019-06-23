<?php
	include('server/connection.php');

		$name = mysqli_real_escape_string($db,$_POST['products']);
		$show 	= "SELECT * FROM products WHERE product_name LIKE '$name%' ";
		$query 	= mysqli_query($db,$show);

	$row = json_encode(mysqli_fetch_assoc($query));
	echo $row;
