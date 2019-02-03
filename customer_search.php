<?php include('server/connection.php');

$searchTerm = $_GET['term'];

$query = $db->query("SELECT * FROM customer WHERE firstname LIKE '%".$searchTerm."%'");
$customer = array();
if($query->num_rows > 0){
    while($row = $query->fetch_assoc()){
        $data[] = $row['firstname'];
        $data[] = $row['lastname'];
        array_push($customer, $data);
    }
}
//return json data
echo json_encode($data);