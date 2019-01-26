<?php include('../server/connection.php');
	$msg 	= '';
	$error  = array();
	if(isset($_POST['add'],$_GET['username'])){
		$company 	= mysqli_real_escape_string($db, $_POST['com_name']);
		$firstname 	= mysqli_real_escape_string($db, $_POST['firstname']);
		$lastname 	= mysqli_real_escape_string($db, $_POST['lastname']);
		$address 	= mysqli_real_escape_string($db, $_POST['address']);
		$number 	= mysqli_real_escape_string($db, $_POST['number']);
	  	$image    	= $_FILES['image']['name'];
		$target   	= "../images/".basename($_FILES['image']['name']);

		$sql  = "INSERT INTO supplier (company_name,firstname,lastname,address,contact_number,image) VALUES ('$company','$firstname','$lastname','$address','$number','$image')";
	  	$result = mysqli_query($db, $sql);
	  	if(move_uploaded_file($_FILES['image']['tmp_name'], $target) && $result == true){
			$msg = "Image successfully uploaded!";
			header('location: ../supplier/supplier.php?username='.$_GET['username'].'&added');
	  	}else{
			$msg = "There was a problem uploading the image!";
		}
	}
