<?php include('../server/connection.php');
	if(isset($_GET['id'])){ 
		$id	= $_GET['id'];
		$user = $_SESSION['username'];
		$query = "DELETE FROM supplier WHERE supplier_id='$id'"; 
    	$delete = mysqli_query($db, $query);
    	if($delete == true){
    		$logs 	= "INSERT INTO logs (username,purpose) VALUES('$user','Supplier Deleted')";
 			$insert = mysqli_query($db,$logs);
			header("location: supplier.php?deleted");
    	}else{
    		header("location: supplier.php?undelete");
    	}
    }	