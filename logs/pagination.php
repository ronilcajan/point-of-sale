<?php
	include('../server/connection.php');

	$record = 5;
	$page = '';
	$output = '';

	if(isset($_POST['page'])){
		$page = $_POST['page'];
	}
	else{
		$page = 1;
	}

	$start = ($page-1)*$record;

	$sql = "SELECT * FROM logs LIMIT $start,$record";
	$result	= mysqli_query($db, $sql);

	$output .="
	<table class='table table-striped w-100 border'>
		<thead class='bg-info'>
					<tr>
						<th scope='row'><h4>Logs</h4></th>
						<th scope='row'></th>
						<th scope='row'></th>
					</tr>
					<tr>
						<th scope='col' class='column-text'>Username</th>
						<th scope='col' class='column-text'>Activity</th>
						<th scope='col' class='column-text'>Date</th>
					</tr>
				</thead>";

			if (mysqli_num_rows($result) > 0){
				while($row = mysqli_fetch_assoc($result)){

	$output .="
				<tbody>
					<tr class='table-active'>
						<td>".$row['username']."</td>
						<td>".$row['purpose']."</td>
						<td>".$row['logs_time']."</td>";
				} 
			}else{ 
	$output.= "<tr><td></td><td><p style='color:red;'>No data available!</p></td>
				<td></td>
				</tr>
				</tbody>
			</table><br>";
}
$output .="<div align='center' class='mt-2 d-flex justify-content-center'><p ml-1><small>Page:&nbsp</small></p>";
$page_query = "SELECT * FROM logs";
$page_result = mysqli_query($db,$page_query);
$total_records = mysqli_num_rows($page_result);
$total_pages = ceil($total_records/$record);
for($i=1;$i<=$total_pages;$i++)
{
	$output .= "<small><span class='pagination_link inline' style='cursor:pointer; padding:6px;border:1px solid #ccc;' id='".$i."'>".$i."</span></small>";
}

echo $output;