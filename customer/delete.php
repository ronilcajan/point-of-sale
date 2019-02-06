<?php include('../server/connection.php');
	if(isset($_GET['id'])){ 
		$id	= $_GET['id'];
		$sql 	= "SELECT username FROM users WHERE position = 'admin'";
		$result = mysqli_query($db, $sql);

    	if(mysqli_num_rows($result)==1){
			while ($row = mysqli_fetch_assoc($result)){
				$user = $row['username'];
				$query = "DELETE FROM customer WHERE customer_id = '$id'"; 
				mysqli_query($db,"CREATE TRIGGER `deleteLogs` AFTER DELETE ON `customer`
 				FOR EACH ROW INSERT INTO logs VALUES (null,'$user',Old.customer_id,'Customer Deleted',NOW())");
    			$result1 = mysqli_query($db, $query);
				header("location: customer.php?username=".$user."&deleted");
			}
    	}else{
    		echo "something went wrong";
    	}
    }	