<?php 

	include("../server/connection.php");

	$column = array('transaction_no','username','company_name','TotalPrice','TotalQuantity','date');

	$query = "SELECT delivery.transaction_no,supplier.company_name,username,sum(buy_price * total_qty) AS TotalPrice,sum(total_qty) AS TotalQuantity,date FROM delivery JOIN product_delivered ON delivery.transaction_no=product_delivered.transaction_no JOIN supplier ON delivery.supplier_id = supplier.supplier_id JOIN products ON product_delivered.product_id = products.product_no ";

	if($_POST['is_date_search'] == "yes"){
		$query .= 'WHERE delivery.date BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'"'; 
	}

	if (isset($_POST["search"]["value"]) && !empty($_POST["search"]["value"])) {
		$query .= '
			WHERE delivery.transaction_no LIKE "%' .$_POST["search"]["value"].'%"
			OR username LIKE "%' .$_POST["search"]["value"].'%"
			OR company_name LIKE "%' .$_POST["search"]["value"].'%"
		';
	}else{
		$query .= '';
	}

	$query .= "GROUP BY transaction_no ";

	if(isset($_POST['order'])){
		$query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
	}else{
		$query .= ' ORDER BY delivery.transaction_no DESC ';
	}

	$query1 = '';

	$_POST["length"] = 5;

	if($_POST['length'] != -1){
		$query1 = 'LIMIT ' .$_POST["start"].','.$_POST["length"];
	}
	$data = array();

	$result = mysqli_query($db, $query . $query1);

	$number_filter_row = mysqli_num_rows(mysqli_query($db, $query));


	while($row = mysqli_fetch_array($result)){
			$sub_array = array();
			$sub_array[] = '<a href="../delivery/delivery_details.php?transaction_no='.$row["transaction_no"].'">'.$row["transaction_no"].'</a>';
			$sub_array[] = $row["username"];
			$sub_array[] = $row["company_name"];
			$sub_array[] = number_format($row['TotalPrice']);
			$sub_array[] = $row['TotalQuantity'];
			$sub_array[] = date('d M Y, g:i A', strtotime($row["date"]));	
			$data[] = $sub_array; 
		}

	function get_all_data($db){
		$query = "SELECT delivery.transaction_no,supplier.company_name,username,sum(buy_price * total_qty) AS TotalPrice,sum(total_qty) AS TotalQuantity,date FROM delivery JOIN product_delivered ON delivery.transaction_no=product_delivered.transaction_no JOIN supplier ON delivery.supplier_id = supplier.supplier_id JOIN products ON product_delivered.product_id = products.product_no GROUP BY delivery.transaction_no ORDER BY date DESC";
		$result = mysqli_query($db, $query);
		return mysqli_num_rows($result);
	}

	$output = array(
		"draw" 		=> intval($_POST["draw"]),
		"recordsTotal" 	=> get_all_data($db),
		"recordsFiltered" => $number_filter_row,
		"data" 		=> $data
	);

	print json_encode($output);