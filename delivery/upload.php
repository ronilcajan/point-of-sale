<?php 

include('../server/connection.php');
	$error = array();
	$alert = array();
	
	if(isset($_POST['upload'])){
		$target   		= "../csv_files/".basename($_FILES['file']['name']);

		if($_FILES['file']['name']){
			$filename = explode(".", $_FILES['file']['name']);

			if($filename[1] == 'csv'){
				$handle = fopen($target, "r");
				while ($data = fgetcsv($handle)) {
					$item 	= mysqli_real_escape_string($db , $data[0]);
					$item1 	= mysqli_real_escape_string($db , $data[1]);
					$item2 	= mysqli_real_escape_string($db , $data[2]);
					$item3	= mysqli_real_escape_string($db , $data[3]);
					$item4 	= mysqli_real_escape_string($db , $data[4]);
					$item5 	= mysqli_real_escape_string($db , $data[5]);

					$query = "INSERT INTO delivery (";
					$sql  = "INSERT INTO products (product_name,sell_price,quantity,unit,min_stocks) VALUES ('$item',$item2,$item3,'$item4',$item5)";
	  				$result = mysqli_query($db, $sql);
				}
				if(move_uploaded_file($_FILES['file']['tmp_name'], $target) == true){
					array_push($alert, "Successfully Imported!");
					fclose($handle);
				}
			}else{

				array_push($error, "CSV file is required!");
			}
		}
	}