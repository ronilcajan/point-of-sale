<?php include('../server/connection.php');
	$msg 	= '';
	$error  = array();
	if(isset($_POST['addproducts'],$_GET['username'])){
		$user 			= $_GET['username'];
		$supplier 		= mysqli_real_escape_string($db, $_POST['supplier']);
		$product_name 	= mysqli_real_escape_string($db, $_POST['product_name']);
		$price 			= mysqli_real_escape_string($db, $_POST['price']);
		$qty 			= mysqli_real_escape_string($db, $_POST['qty']);
		$unit			= mysqli_real_escape_string($db, $_POST['unit']);
		$min_stocks		= mysqli_real_escape_string($db, $_POST['min_stocks']);
	  	$image    		= $_FILES['image']['name'];
		$target   		= "../images/".basename($_FILES['image']['name']);
		
		$sql  = "INSERT INTO products (supplier_id,product_name,sell_price,quantity,unit,min_stocks,images) VALUES ($supplier,'$product_name','$price',$qty,'$unit',$min_stocks,'$image')";
	  	$result = mysqli_query($db, $sql);
 		if(move_uploaded_file($_FILES['image']['tmp_name'], $target) && $result == true){
 			$query 	= "INSERT INTO logs (username,purpose,logs_time) VALUES('$user','Product $product_name Added',CURRENT_TIMESTAMP)";
 			$insert 	= mysqli_query($db,$query);
			$msg = "Image successfully uploaded!";
			header('location: ../products/products.php?username='.$user.'&added');
	  	}else{
			$msg = "There was a problem uploading the image!".$price;
	  	}
	}
