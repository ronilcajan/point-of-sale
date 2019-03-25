<?php
	include('../server/connection.php');

	
	$query 	= mysqli_real_escape_string($db, $_POST['query']);	
	$show 	= "SELECT company_name FROM supplier WHERE company_name LIKE '%{$query}%'";
	$result	= mysqli_query($db,$show);
	$array  = array();

		while($row = mysqli_fetch_assoc($result)){
			$array[] = $row['company_name'];				
		}
		print json_encode($array);

