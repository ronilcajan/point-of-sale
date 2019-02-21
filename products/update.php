<?php
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
	  	$supplier 	= mysqli_real_escape_string($db, $_POST['supplier']);

	  	$query  = "SELECT username FROM users WHERE position = 'admin'";
	  	$result = mysqli_query($db, $query);
	  	if (mysqli_num_rows($result)>0){
			while ($row = mysqli_fetch_assoc($result)){
				$user = $row['username'];
		  			if (!empty($image)){
		  				$sql  = "UPDATE products SET supplier_id=$supplier,product_name='$pro_name',sell_price=$price,quantity=$qty,unit='$unit',min_stocks=$min_stocks,images='$image' WHERE id = '$id'";
		  				mysqli_query($db, $sql);
		  				if(move_uploaded_file($_FILES['images']['tmp_name'], $target)){
		  					$msg = "Image successfully uploaded!";
		  					$sql 	= "INSERT INTO logs (username,purpose,logs_time) VALUES('$user','Product $pro_name updated',CURRENT_TIMESTAMP)";
 							$insert = mysqli_query($db,$sql);
 							header('location: ../products/products.php?username='.$user.'&updated');
 						}
					}else{
		  				$sql  = "UPDATE products SET supplier_id=$supplier,product_name='$pro_name',sell_price=$price,quantity=$qty,unit='$unit',min_stocks=$min_stocks WHERE id = '$id'";
		  				mysqli_query($db, $sql);
		  				$msg = "Image successfully uploaded!";
		  				$sql 	= "INSERT INTO logs (username,purpose,logs_time) VALUES('$user','Product $pro_name updated',CURRENT_TIMESTAMP)";
 						$insert = mysqli_query($db,$sql);
 						header('location: ../products/products.php?username='.$user.'&updated');
					}
		  	}
		}else{
		  	$msg = "There was a problem uploading the image!";
		}
	}