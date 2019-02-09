<?php
	include('server/connection.php');

	if (isset($_POST['products'])){

		$name = mysqli_real_escape_string($db,$_POST['products']);
		$num = 1;
		$show 	= "SELECT product_name,sell_price FROM products WHERE product_name LIKE '$name%' ";
		$query 	= mysqli_query($db,$show);
		if(mysqli_num_rows($query)>0){
			while($row = mysqli_fetch_array($query)){
				echo "<tr><td>$num</td><td>".$row['product_name']."</td>";
				echo "<td>".$row['sell_price']."</td></tr>";
				$num++;
			}
		}
	}