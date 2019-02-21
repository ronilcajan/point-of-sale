<?php include 'server/connection.php';
if(isset($_POST['product'])){
	$user = $_POST['user'];
	$price = $_POST['price'];
	$product = $_POST['product'];
	$customer = $_POST['customer'];
	$quantity = $_POST['quantity'];
	$reciept = array();
	$query = '';

	$sql = "INSERT INTO sales(customer_id,username) VALUES($customer,'$user')";
	$result = mysqli_query($db,$sql);
	if($result == true){
		$select = "SELECT reciept_no FROM sales ORDER BY reciept_no DESC LIMIT 1";
		$res = mysqli_query($db,$select);
		$id = mysqli_fetch_array($res);
		for($i = 0;  $i < count($product); $i++){
			$reciept[] = $id[0];
		}
		for($count = 0; $count < count($product); $count++){
			$price_clean = mysqli_real_escape_string($db, $price[$count]);
			$reciept_clean = mysqli_real_escape_string($db, $reciept[$count]);
			$product_clean = mysqli_real_escape_string($db, $product[$count]);
			$quantity_clean = mysqli_real_escape_string($db, $quantity[$count]);
			if($product_clean != '' && $quantity_clean != '' && $price_clean != '' && $reciept_clean != ''){
				$query .= "
					INSERT INTO sales_product(reciept_no,product_id,price,qty) 
					VALUES($reciept_clean,$product_clean,$price_clean,$quantity_clean);
					";
			}
		} 
	}else{
		echo "error";
	}
	
	if ($query != ''){
		if(mysqli_multi_query($db,$query)){
			echo "Item Inserted";
		}else{
			echo "Error".$query;
		}
	}else{
		echo 'No Product'.print_r($reciept);
	}
}