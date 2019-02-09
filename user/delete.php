<?php include('../server/connection.php');
	if(isset($_GET['id'])){ 
		$id	= $_GET['id'];
		$sql 	= "SELECT username FROM users WHERE position = 'admin'";
		$result = mysqli_query($db, $sql);

    	if(mysqli_num_rows($result)==1){
			while ($row = mysqli_fetch_assoc($result)){
				$query = "DELETE FROM users WHERE id = '$id'"; 
    			$result1 = mysqli_query($db, $query);
    			$insert 	= "INSERT INTO logs (username,purpose,logs_time) VALUES('$user','User Deleted',CURRENT_TIMESTAMP)";
 				$logs 	= mysqli_query($db,$insert);
				header("location: user.php?username=".$row['username']."&deleted");
			}
    	}else{
    		echo "something went wrong";
    	}
    }	