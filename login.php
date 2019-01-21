<?php 

$error		= array();

if (isset($_POST['login'])){
	$username 	= mysqli_real_escape_string($db, $_POST['username']);
	$password	= md5(mysqli_real_escape_string($db, $_POST['password']));
	$position	= mysqli_real_escape_string($db, $_POST['position']); 
	$query 		= "SELECT * FROM users WHERE username = '$username' OR position = '$position' AND password = '$password'";
	$result 	= mysqli_query($db, $query);

	if(mysqli_num_rows($result) == 1){
		while ($row = mysqli_fetch_assoc($result)) {
			if ($row['position'] == $position){
				$_SESSION['username'];
				header('location: main.php?username='.$row['username'].'');
			}elseif ($row['position'] != $position) {
				$_SESSION['username'];
				header('location: home1.php?username='.$row['username'].'');
			}else{
				array_push($error, "No user found!");
			}
		}
		echo "not found";
	}else{
		array_push($error, "Wrong Username or Password!");	
	}
}