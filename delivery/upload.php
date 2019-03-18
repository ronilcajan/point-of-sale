<?php 

include('../server/connection.php');
	$error = array();
	$alert = array();
	
	if(isset($_POST['upload'])){
		$target   		= "../csv_files/".basename($_FILES['file']['name']);
		$supplier = $_POST['supplier'];
		$transaction = $_POST['transaction_no'];
		$user = $_SESSION['username'];

		if($_FILES['file']['name']){
			$filename = explode(".", $_FILES['file']['name']);

			$query = "INSERT INTO delivery (transaction_no,supplier_id,username) VALUES('$transaction',$supplier,'$user')";
			$insert = mysqli_query($db,$query);
			if($insert == true){
				
				if($filename[1] == 'csv'){
					$handle = fopen($target, "r");
					while ($data = fgetcsv($handle)) {
						$barcode 		= mysqli_real_escape_string($db , $data[0]);
						$product_name 	= mysqli_real_escape_string($db , $data[1]);
						$buy_price 		= mysqli_real_escape_string($db , $data[2]);
						$tax_rate		= mysqli_real_escape_string($db , $data[3]);
						$quantity 		= mysqli_real_escape_string($db , $data[4]);
						$unit 			= mysqli_real_escape_string($db , $data[5]);
						$min_stocks 	= mysqli_real_escape_string($db , $data[6]);
						$sell     = $tax_rate/100;
						$sell_price = $buy_price * $sell;

						
						$sql  = "INSERT INTO products(product_no,product_name,sell_price,quantity,unit,min_stocks) VALUES ('$barcode','$product_name',$sell_price,$quantity,'$unit',$min_stocks)";
		  				$result = mysqli_query($db, $sql);

		  				$query = "INSERT INTO product_delivered(transaction_no,product_id,total_qty,buy_price,tax_rate) VALUES('$transaction','$barcode',$quantity,$buy_price,$tax_rate)";
		  				$result1 = mysqli_query($db, $query);
					}
					if(move_uploaded_file($_FILES['file']['tmp_name'], $target) == true && $result == true && $result1 == true ){
						array_push($alert, "Successfully Imported!");
						fclose($handle);
						header('location: ../delivery/delivery.php?added="1"');
					}
				}
			}else{
				array_push($error, "CSV file is required!");
			}
		}
	}