<?php 
	include('../server/connection.php');
	$alert  = array();
	if(isset($_POST['add_customer'],$_GET['username'])){
		$user 		= $_GET['username'];
		$purpose 	= mysqli_real_escape_string($db, $_POST['purpose']);
		$amount 	= mysqli_real_escape_string($db, $_POST['amount']);
		
		$sql  = "INSERT INTO cashflow (description,amount,username,transaction_date) VALUES ('$purpose','$amount','$user',CURRENT_TIMESTAMP)";
	  	$result = mysqli_query($db, $sql);
 		if($result == true){
 			$query 	= "INSERT INTO logs (username,purpose,logs_time) VALUES('$user','$purpose',CURRENT_TIMESTAMP)";
 			$insert = mysqli_query($db,$query);
 			header('location: ../cashflow/cashflow.php?username='.$user.'&added');
	  	}else{
			array_push($alert,"Something went wrong!");
	  	}
	}
