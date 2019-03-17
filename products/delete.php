<?php include('../server/connection.php');
	if(isset($_GET['id'])){ 
		$id	= $_GET['id'];
        $user = $_SESSION['username'];
		$query = "DELETE FROM products WHERE product_no = $id"; 
    	$result = mysqli_query($db, $query);
    	if($result==true){
    		$logs	= "INSERT INTO logs (username,purpose) VALUES('$user','Product deleted')";
    		$insert = mysqli_query($db,$logs);
    		header("location: products.php?deleted");
    	}else{
            echo $id;
			header("location: products.php?undelete");
    	}
    }	