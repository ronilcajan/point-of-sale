<?php include('../server/connection.php');
	$msg 	= '';
	$error  = array();
	if(isset($_POST['add_customer'],$_GET['username'])){
		$user 		= $_GET['username'];
		$fname 		= mysqli_real_escape_string($db, $_POST['fname']);
		$lname 		= mysqli_real_escape_string($db, $_POST['lname']);
		$address	= mysqli_real_escape_string($db, $_POST['address']);
		$number		= mysqli_real_escape_string($db, $_POST['number']);
	  	$image   	= $_FILES['image']['name'];
		$target   	= "../images/".basename($_FILES['image']['name']);
		
		$sql  = "INSERT INTO customer (firstname,lastname,address,contact_number,image) VALUES ('$fname','$lname','$address','$number','$image')";
	  	$result = mysqli_query($db, $sql);
 		if(move_uploaded_file($_FILES['image']['tmp_name'], $target) && $result == true){
			$msg = "Image successfully uploaded!";
			header('location: ../customer/customer.php?username='.$_GET['username'].'&added');
	  	}else{
			$msg = "There was a problem uploading the image!";
	  	}
	}
