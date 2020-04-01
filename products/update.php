<?php

	include("../server/connection.php");
	$msg 		= '';
  	if(isset($_POST['update'])){
		$target   	= "../images/".basename($_FILES['images']['name']);
	  	$image    	= $_FILES['images']['name'];
	  	$id       	= $_POST['id'];
	  	$pro_name 	= mysqli_real_escape_string($db, $_POST['product_name']);	
	  	$price 	 	= mysqli_real_escape_string($db, $_POST['price']);
	  	$qty 		= mysqli_real_escape_string($db, $_POST['qty']);
	  	$unit   	= mysqli_real_escape_string($db, $_POST['unit']);
	  	$min_stocks = mysqli_real_escape_string($db, $_POST['min_stocks']);
	  	$remarks 	= mysqli_real_escape_string($db, $_POST['remarks']);
	  	$location 	= mysqli_real_escape_string($db, $_POST['location']);
	  	$username	= $_SESSION['username'];

		if (!empty($image)){
		  	$sql  = "UPDATE products SET product_name='$pro_name',sell_price=$price,quantity=$qty,unit='$unit',min_stocks=$min_stocks,remarks='$remarks', location='$location', images='$image' WHERE product_no = '$id'";
		  	mysqli_query($db, $sql);
		  	if(move_uploaded_file($_FILES['images']['tmp_name'], $target)){
		  		$sql 	= "INSERT INTO logs (username,purpose) VALUES('$username','Product $pro_name updated')";
 				$insert = mysqli_query($db,$sql);
 				header('location: ../products/products.php?updated');
 			}
		}else{
		  	$sql  = "UPDATE products SET product_name='$pro_name',sell_price=$price,quantity=$qty,unit='$unit',min_stocks=$min_stocks,remarks='$remarks', location='$location' WHERE product_no = '$id'";
		  	$result = mysqli_query($db, $sql);
 			if($result == true){
 				$query 	= "INSERT INTO logs (username,purpose) VALUES('$username','Product $pro_name updated')";
 				mysqli_query($db,$query);
 				echo $sql;
 	 			header('location: ../products/products.php?updated');
 			}
 		}
 	}