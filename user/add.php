<?php include('../server/connection.php');
	$msg 	= '';
	$error  = array();
	if(isset($_POST['add'])){
		$user 	= $_SESSSION['username'];
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
		$number = mysqli_real_escape_string($db, $_POST['number']);
		$position = mysqli_real_escape_string($db, $_POST['position']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$password1 = mysqli_real_escape_string($db, $_POST['password1']);
	  	$image    = $_FILES['image']['name'];
		$target   = "../images/".basename($_FILES['image']['name']);

		$query = "SELECT username FROM users WHERE username='$username'";
		$result = mysqli_query($db, $query);
		if (mysqli_num_rows($result) == 1){
		  array_push($error, "Username already taken");
		}
		if ($password != $password1){
		  array_push($error, "The Password did not match"); 
		}

		if (count($error) == 0){
			$password = md5($password1);
			$sql  = "INSERT INTO users (username,firstname,lastname,position,contact_number,password,image) VALUES ('$username','$firstname','$lastname','$position','$number','$password','$image')";
	  		$result = mysqli_query($db, $sql);
	  		if(move_uploaded_file($_FILES['image']['tmp_name'], $target) && $result == true){
				$msg = "Image successfully uploaded!";
				$insert	= "INSERT INTO logs (username,purpose) VALUES('$user','User $firstname added')";
 				$logs = mysqli_query($db,$insert);
				header('location: ../user/user.php?added');
	  		}else{
				$msg = "There was a problem uploading the image!";
	  		}
		}
	}
