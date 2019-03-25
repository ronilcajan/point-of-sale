<?php 
	include('../server/connection.php');
	if(isset($_POST['submit'])){
		$com 		= mysqli_real_escape_string($db, $_POST['com_name']);
		$fname 		= mysqli_real_escape_string($db, $_POST['fname']);
		$lname 		= mysqli_real_escape_string($db, $_POST['lname']);
		$address	= mysqli_real_escape_string($db, $_POST['address']);
		$number		= mysqli_real_escape_string($db, $_POST['number']);
	  	$image   	= $_FILES['image']['name'];
		$target   	= "../images/".basename($_FILES['image']['name']);
		$user 		= $_SESSION['username'];
		
		$sql  = "INSERT INTO supplier (company_name,firstname,lastname,address,contact_number,image) VALUES ('$com','$fname','$lname','$address','$number','$image')";
	  	$result = mysqli_query($db, $sql);
 		if(move_uploaded_file($_FILES['image']['tmp_name'], $target) && $result == true){
 			$query 	= "INSERT INTO logs (username,purpose) VALUES('$user','Customer $fname Added')";
 			$insert 	= mysqli_query($db,$query);
			header('location: ../delivery/add_delivery.php?success="1"');
	  	}else{
			$msg = "Something went wrong!";
	  	}
	}
