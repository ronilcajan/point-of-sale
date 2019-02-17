<?php include 'server/connection.php';
if(isset($_POST['product'])){
	$user = $_POST['user'];
	$product = $_POST['product'];
	$customer = $_POST['customer'];
	$quantity = $_POST['quantity'];
	$query = '';
	for($count = 0; $count < count($product); $count++){
		$user_clean = mysqli_real_escape_string($db, $user[$count]);
		$product_clean = mysqli_real_escape_string($db, $product[$count]);
		$customer_clean = mysqli_real_escape_string($db, $customer[$count]);
		$quantity_clean = mysqli_real_escape_string($db, $quantity[$count]);
		if($user_clean != '' && $product_clean != '' && $customer_clean != '' && $quantity_clean != ''){
			$query .= "
					INSERT INTO sales(username,product_id,customer_id,quantity) 
					VALUES('$user_clean',$product_clean,$customer_clean,$quantity_clean);
					";
			$query .= "
					INSERT INTO product_sale(sales_id,)
			";
		} 
	}
	if ($query != ''){
		if(mysqli_multi_query($db,$query)){
			echo "Item Inserted";
		}else{
			echo "Error";
		}
	}else{
		echo 'No Product'.print_r($product).'"&nbsp"'.print_r($user);
	}
}