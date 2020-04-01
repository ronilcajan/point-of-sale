<?php include('../server/connection.php');
	if(isset($_GET['id'])){ 
		$id	= $_GET['id'];
        $use = $_SESSION['username'];
		$query = "DELETE FROM customer WHERE customer_id = '$id'"; 
    	if(mysqli_query($db, $query)==true){
    		$logs 	= "INSERT INTO logs (username,purpose) VALUES('$user','Customer deleted')";
 			$insert = mysqli_query($db,$logs);
			header("location: customer.php?deleted");
    	}else{
    		header("location: customer.php?undelete");
    	}
    }	