<?php 

	include("../server/connection.php");

	$column = array('reciept_no','username','firstname','lastname','discount','TotalPrice','date');

	$query = "SELECT sales_product.reciept_no,sales.discount , sales.total as TotalPrice,username,date,customer.firstname,customer.lastname FROM sales_product JOIN sales ON sales_product.reciept_no=sales.reciept_no JOIN customer ON sales.customer_id = customer.customer_id ";

	if($_POST['is_date_search'] == "yes"){
		$query .= 'WHERE sales.date BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'"'; 
	}

	if (isset($_POST["search"]["value"]) && !empty($_POST["search"]["value"])) {
		$query .= '
			WHERE sales.reciept_no LIKE "%' .$_POST["search"]["value"].'%"
			OR username LIKE "%' .$_POST["search"]["value"].'%"
			OR firstname LIKE "%' .$_POST["search"]["value"].'%"
			OR lastname LIKE "%' .$_POST["search"]["value"]. '%"
		';
	}else{
		$query .= '';
	}

	$query .= "GROUP BY reciept_no ";

	if(isset($_POST['order'])){
		$query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
	}else{
		$query .= 'ORDER BY reciept_no DESC ';
	}

	$query1 = '';

	$_POST["length"] = 4;

	if($_POST['length'] != -1){
		$query1 = 'LIMIT ' .$_POST["start"].','.$_POST["length"];
	}



	$data = array();

	$result = mysqli_query($db, $query . $query1);

	$number_filter_row = mysqli_num_rows(mysqli_query($db, $query));


	while($row = mysqli_fetch_array($result)){
			$sub_array = array();
			$sub_array[] = '<a href="../sales/reciept_details.php?reciept_id='.$row["reciept_no"].'">'.$row["reciept_no"].'</a>';
			$sub_array[] = $row["username"];
			$sub_array[] = $row["firstname"].'&nbsp'.$row['lastname'];
			$sub_array[] = $row["discount"];
			$sub_array[] = number_format($row["TotalPrice"],2);
			$sub_array[] = date('d M Y, g:i A', strtotime($row["date"]));	
			$data[] = $sub_array; 
		}

	function get_all_data($db){
		$query = "SELECT sales_product.reciept_no,sales.discount, sales.total AS TotalPrice,username,date,customer.firstname,customer.lastname FROM sales_product JOIN sales ON sales_product.reciept_no=sales.reciept_no JOIN customer ON sales.customer_id = customer.customer_id GROUP BY reciept_no";
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