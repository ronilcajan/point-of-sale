<?php 
	include('../server/connection.php');

	if(isset($_POST['barcode'])){
		$barcode 	= $_POST['barcode'];
		$product 	= $_POST['product_name'];
		$qty 		= $_POST['quantity'];
		$buy_price 	= $_POST['buy_price'];
		$unit 		= $_POST['unit'];
		$tax		= $_POST['tax_rate'];
		$min_qty 	= $_POST['min_qty'];
		$sell_price = $_POST['sell_price'];
		$supplier 	= $_POST['supplier'];
		$transaction_no = $_POST['transaction_no'];
		$user 		= $_SESSION['username'];
		$transaction = array();
		$insert = '';

		$sql = "INSERT INTO delivery(transaction_no,supplier_id,username) VALUES('$transaction_no',$supplier,'$user')";
		$result = mysqli_query($db, $sql);
		$insert1 = "INSERT INTO logs (username,purpose) VALUES('$user','Delivery Added')";
		mysqli_query($db, $insert1);
		if($result == true){
			for($count = 0; $count<count($_POST['barcode']); $count++){
						$transaction[] = $transaction_no;
			}
			for($num= 0; $num < count($_POST['barcode']); $num++){
				$transaction1 	= mysqli_real_escape_string($db, $transaction[$num]);
				$barcode_1		= mysqli_real_escape_string($db, $barcode[$num]);
				$product_1		= mysqli_real_escape_string($db, $product[$num]);
				$qty_1 			= mysqli_real_escape_string($db, $qty[$num]);
				$buy_price_1	= mysqli_real_escape_string($db, $buy_price[$num]);
				$unit_1			= mysqli_real_escape_string($db, $unit[$num]);
				$tax_1			= mysqli_real_escape_string($db, $tax[$num]);
				$min_qty_1 		= mysqli_real_escape_string($db, $min_qty[$num]);
				$sell_price_1 	= mysqli_real_escape_string($db, $sell_price[$num]);

				$query = "SELECT product_no,quantity FROM products WHERE product_no='$barcode_1'";
				$result1 = mysqli_query($db, $query);
				if(mysqli_num_rows($result1)>0){
					while($row = mysqli_fetch_array($result1)){
						$newqty = $row['quantity'] + $qty_1;
						$query1 = "UPDATE products SET quantity = $newqty WHERE product_no = '$barcode_1'";
						mysqli_query($db, $query1);
					}
				}else{
					$insert .= "
					INSERT INTO products(product_no,product_name,sell_price,quantity,unit,min_stocks) 
					VALUES('$barcode_1','$product_1',$sell_price_1,$qty_1,'$unit_1',$min_qty_1);
						";

					$insert .= "
					INSERT INTO product_delivered(transaction_no,product_id,total_qty,buy_price,tax_rate)
					VALUES('$transaction1','$barcode_1',$qty_1,$buy_price_1,$tax_1);
					";
 
				}
			}
		}else{
			echo "error";
		}
		if($insert != ''){
			if (mysqli_multi_query($db, $insert)) {
    			do {
		       		if ($result = mysqli_store_result($db)) {
		            	echo "Inserted";
		            	mysqli_free_result($result);

		            }
	        		if (mysqli_more_results($db)) {
	            		echo "inserted";
	        		}
	    		}while (mysqli_more_results($db) && mysqli_next_result($db));
			}
		}
		echo $insert;			
	}else{
		echo 'No Product';
}	
