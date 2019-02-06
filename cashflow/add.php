<?php include('../server/connection.php');
	$msg 	= '';
	$error  = array();
	if(isset($_POST['add_customer'],$_GET['username'])){
		$user 		= $_GET['username'];
		$purpose 	= mysqli_real_escape_string($db, $_POST['purpose']);
		$amount 	= mysqli_real_escape_string($db, $_POST['amount']);
		
		$sql  = "INSERT INTO cashflow (description,amount,username,transaction_date) VALUES ('$purpose','$amount','$user',NOW())";
	  	$result = mysqli_query($db, $sql);
 		if($result == true){
			header('location: ../cashflow/cashflow.php?username='.$_GET['username'].'&added');
	  	}else{
			$msg = "There was a problem in the system!".$user.$purpose.$amount;
	  	}
	}
