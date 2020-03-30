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
		$remarks 	= $_POST['remarks'];
		$location 	= $_POST['location'];
		$supplier 	= mysqli_real_escape_string($db,$_POST['supplier']);
		$transaction_no = mysqli_real_escape_string($db,$_POST['transaction_no']);
		$user 		= mysqli_real_escape_string($db,$_SESSION['username']);
		$transaction = array();
		$insert = '';

		$search = "SELECT supplier_id FROM supplier WHERE company_name = '$supplier'";
		$show = mysqli_query($db,$search);
		

		if(mysqli_num_rows($show) == 0 || $show == false){
			echo "failure";

		}else{

			$row = mysqli_fetch_array($show);
			$supplier_1 = $row['supplier_id'];
			$sql = "INSERT INTO delivery(transaction_no,supplier_id,username) VALUES('$transaction_no',$supplier_1,'$user')";
			$result = mysqli_query($db, $sql);

			$insert1 = "INSERT INTO logs (username,purpose) VALUES('$user','Delivery Added')";
			$res = mysqli_query($db, $insert1);
			if($res == true){
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
					$remarks_1 		= mysqli_real_escape_string($db, $remarks[$num]);
					$location_1 	= mysqli_real_escape_string($db, $location[$num]);

					$query = "SELECT product_no,quantity FROM products WHERE product_no='$barcode_1'";
					$result1 = mysqli_query($db, $query);
					if(mysqli_num_rows($result1)>0){
						while($row = mysqli_fetch_array($result1)){
							$newqty = $row['quantity'] + $qty_1;
							$query1 = "UPDATE products SET product_name='$product_1',sell_price = $sell_price_1,quantity = $newqty,unit = '$unit_1',min_stocks=$min_qty_1, remark='$remarks_1', location='$location_1' WHERE product_no = '$barcode_1'";
							mysqli_query($db, $query1);
						}
						$insert .= "
						INSERT INTO product_delivered(transaction_no,product_id,total_qty,buy_price,tax_rate)
						VALUES('$transaction1','$barcode_1',$qty_1,$buy_price_1,$tax_1);
						";
					}else{
						$insert .= "
						INSERT INTO products(product_no,product_name,sell_price,quantity,unit,min_stocks,remarks,location) 
						VALUES('$barcode_1','$product_1',$sell_price_1,$qty_1,'$unit_1',$min_qty_1,'$remarks_1','$location_1');
							";

						$insert .= "
						INSERT INTO product_delivered(transaction_no,product_id,total_qty,buy_price,tax_rate)
						VALUES('$transaction1','$barcode_1',$qty_1,$buy_price_1,$tax_1);
						";
					}
				}
			}
			if($insert != ''){
				if (mysqli_multi_query($db, $insert)) {
	    			do {
			       		if ($insert = mysqli_store_result($db)) {
			            	mysqli_free_result($insert);

			            }
		        		if (mysqli_more_results($db)) {
		        		}
		    		}while (mysqli_more_results($db) && mysqli_next_result($db));
		    		echo "success";
				}else{
					echo "failure";
				}
			}else{
				echo "failure";
			}		
		}
	}
