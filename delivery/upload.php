<?php 

include('../server/connection.php');
	$error = array();
	$alert = array();
	
	if(isset($_POST['upload'])){
		$target   		= $_FILES['file']['tmp_name'];
		$supplier = $_POST['supplier'];
		$transaction = $_POST['transaction_no'];
		$user = $_SESSION['username'];
		$add = '';

		$show_company = "SELECT supplier_id FROM supplier WHERE company_name = '$supplier'";
		$show_company1 = mysqli_query($db, $show_company);
		if(mysqli_num_rows($show_company1) == 0){
			header('location: ../delivery/import_csv.php?failure');
		}else{
			$row = mysqli_fetch_array($show_company1);
			$supplier_id = $row['supplier_id'];
			if($_FILES['file']['name']){
				$filename = explode(".", $_FILES['file']['name']);
				
				
				$query = "INSERT INTO delivery (transaction_no,supplier_id,username) VALUES('$transaction',$supplier_id,'$user')";
				$insert = mysqli_query($db,$query);
				if($insert == true){
					
					if($filename[1] == 'csv'){
						$handle = fopen($target, "r");
						fgets($handle);
						while ($data = fgetcsv($handle,10000,",")) {
							$barcode 		= mysqli_real_escape_string($db , $data[0]);
							$product_name 	= mysqli_real_escape_string($db , $data[1]);
							$buy_price 		= mysqli_real_escape_string($db , $data[2]);
							$tax_rate		= mysqli_real_escape_string($db , $data[3]);
							$quantity 		= mysqli_real_escape_string($db , $data[4]);
							$unit 			= mysqli_real_escape_string($db , $data[5]);
							$min_stocks 	= mysqli_real_escape_string($db , $data[6]);
							$remarks	 	= mysqli_real_escape_string($db , $data[7]);
							$location	 	= mysqli_real_escape_string($db , $data[8]);
							$sell     = $tax_rate/100;
							$sell_price = $buy_price * $sell;
							$sell_total = $sell_price + $buy_price;

							$query1 = "SELECT quantity FROM products WHERE product_no='$barcode'";
							$select = mysqli_query($db, $query1);

							if(mysqli_num_rows($select)>0){
								while($row = mysqli_fetch_array($select)){
									$newqty = $row['quantity'] + $quantity;
									$insert = "UPDATE products SET quantity=$newqty, sell_price=$sell_total WHERE product_no='$barcode'";
									mysqli_query($db, $insert);
								}
								$delivered = "INSERT INTO product_delivered(transaction_no,product_id,total_qty,buy_price,tax_rate) VALUES('$transaction','$barcode',$quantity,$buy_price,$tax_rate)";
								mysqli_query($db, $delivered);
							}else{
								$add = "INSERT INTO products(product_no,product_name,sell_price,quantity,unit,min_stocks,remarks,location) VALUES ('$barcode','$product_name',$sell_total,$quantity,'$unit',$min_stocks,'$remarks','$location')";

								mysqli_query($db, $add);

			  					$add1 = "INSERT INTO product_delivered(transaction_no,product_id,total_qty,buy_price,tax_rate) VALUES('$transaction','$barcode',$quantity,$buy_price,$tax_rate)";
			  					mysqli_query($db, $add1);
			  					
							}	
						}

					if(move_uploaded_file($_FILES['file']['tmp_name'], '../csv_files/'.basename($target)) == true ){
						array_push($alert, "Successfully Imported!");
						fclose($handle);
						$logs 	= "INSERT INTO logs (username,purpose) VALUES('$user','Delivery Added')";
	 					mysqli_query($db,$logs);
						header('location: ../delivery/delivery.php?success="1"');
					}else{
						array_push($error, "Something went wrong!");							
					}
				}else{
					array_push($error, "CSV file is required!");	
				}
			}
		}
	}
}