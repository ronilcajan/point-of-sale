<?php
	$msg 		= '';
  	if(isset($_POST['update_customer'])){
		$target   	= "../images/".basename($_FILES['image']['name']);
	  	$image    	= $_FILES['image']['name'];
	  	$id       	= $_POST['id'];
	  	$fname 		= mysqli_real_escape_string($db, $_POST['fname']);	
	  	$lname 	 	= mysqli_real_escape_string($db, $_POST['lname']);
	  	$address	= mysqli_real_escape_string($db, $_POST['address']);
	  	$number   	= mysqli_real_escape_string($db, $_POST['contact_number']);

	  	$query  = "SELECT username FROM users WHERE position = 'admin'";
	  	$result = mysqli_query($db, $query);
	  	if (mysqli_num_rows($result)>0){
			while ($row = mysqli_fetch_assoc($result)){
		  			if (!empty($image)){
		  				$sql  = "UPDATE customer SET firstname='$fname',lastname='$lname',address='$address',contact_number='$number',image='$image' WHERE customer_id = '$id'";
		  				mysqli_query($db, $sql);
					}else{
		  				$sql  = "UPDATE customer SET firstname='$fname',lastname='$lname',address='$address',contact_number='$number' WHERE customer_id = '$id'";
		  				mysqli_query($db, $sql);
					}
		  			if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
		  				$msg = "Image successfully uploaded!";
		  			}else{
		  				$msg = "There was a problem uploading the image!";
		  			}
		  			header('location: ../customer/customer.php?username='.$row['username'].'&updated');
		  		}
	  		}
	  	}	