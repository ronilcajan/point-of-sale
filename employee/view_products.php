<?php include('../server/connection.php');

	if(isset($_POST["id"])){  
		$output = '';
		$id = $_POST['id'];  
	  	$query = "SELECT * FROM products WHERE product_no = '$id'";  
	  	$result = mysqli_query($db, $query);  

	  	while($row = mysqli_fetch_array($result)){
	  		echo "<h1 class='d-flex'>".$row['product_name']."</h1>";
			echo "<div class='d-inline-flex  mt-2'>";
			echo "<img width='140' height='140' style='border:1px; border-radius:2px' src='../images/".$row['images']."'>";
			echo "</div>";
			$output .= '  
	  			<div class="table-responsive">  
		   		<table class="w-75">';
		   	$output .= '
				<tr>  
					 <td width="50%"><label>Price :</label></td>  
					 <td width="50%"><strong>'.$row["sell_price"].'</strong></td>  
				</tr>
				<tr>
					<td width="50%"><label>Stocks :</label></td>  
					<td width="50%"><strong>'.$row["quantity"].'</strong></td> 
				</tr>
				<tr>  
					 <td width="50%"><label>Unit :</label></td>  
					 <td width="50%"><strong>'.$row["unit"].'</strong></td>  
				</tr>
				<tr>  
					 <td width="50%"><label>Minimum Stocks:</label></td>  
					 <td width="50%"><strong>'.$row["min_stocks"].'</strong></td>  
				</tr>';  
	  }  
	  $output .= '  
		   </table>  
	  		</div>  
	  ';
	  echo $output;  
 	}  
?>
 