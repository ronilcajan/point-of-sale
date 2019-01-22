<?php
	$msg 		= '';
  	if(isset($_POST['update'])){
		$target   	= "../images/".basename($_FILES['image']['name']);
	  	$image    	= $_FILES['image']['name'];
	  	$id       	= $_POST['id'];
	  	$user 		= mysqli_real_escape_string($db, $_POST['username']);	
	  	$firstname  = mysqli_real_escape_string($db, $_POST['firstname']);
	  	$lastname   = mysqli_real_escape_string($db, $_POST['lastname']);
	  	$number   	= mysqli_real_escape_string($db, $_POST['number']);
	  	$position  	= mysqli_real_escape_string($db, $_POST['position']);

	  	$query  = "SELECT username FROM users WHERE position = 'admin'";
	  	$result = mysqli_query($db, $query);
	  	if (mysqli_num_rows($result)>0){
			while ($row = mysqli_fetch_assoc($result)){
		  			if (!empty($image)){
		  				$sql  = "UPDATE users SET username='$user',firstname='$firstname',lastname='$lastname',position='$position',contact_number='$number',image='$image' WHERE id = '$id'";
		  				mysqli_query($db, $sql);
					}else{
		  				$sql  = "UPDATE users SET username='$user',firstname='$firstname',lastname='$lastname',position='$position',contact_number='$number'WHERE id = '$id'";
		  				mysqli_query($db, $sql);
					}
		  			if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
		  				$msg = "Image successfully uploaded!";
		  			}else{
		  				$msg = "There was a problem uploading the image!";
		  			}
		  			header('location: ../user/user.php?username='.$row['username'].'&updated');
		  		}
	  		}
	  	}	