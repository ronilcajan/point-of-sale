<?php include('../server/connection.php');
	if(isset($_GET['id'])){ 
		$id	= $_GET['id'];
		$sql 	= "SELECT username FROM users WHERE position = 'admin'";
		$result = mysqli_query($db, $sql);

    	if(mysqli_num_rows($result)==1){
			while ($row = mysqli_fetch_assoc($result)){
				$user = $row['username'];
				$query = "DELETE FROM supplier WHERE supplier_id='$id'"; 
    			$delete = mysqli_query($db, $query);
    			$logs 	= "INSERT INTO logs (username,purpose,logs_time) VALUES('$user','Supplier Deleted',CURRENT_TIMESTAMP)";
 				$insert = mysqli_query($db,$logs);
				header("location: supplier.php?username=".$user."&deleted");
			}
    	}else{
    		echo "something went wrong";
    	}
    }	