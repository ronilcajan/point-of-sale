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
				$user = $row['username'];
				$insert	= "INSERT INTO logs (username,purpose,logs_time) VALUES('$user','User $user login',CURRENT_TIMESTAMP)";
 				$logs = mysqli_query($db,$insert);
				header('location: main.php?username='.$user.'');
			}elseif ($row['position'] != $position) {
				$_SESSION['username'];
				$user = $row['username'];
				$insert	= "INSERT INTO logs (username,purpose,logs_time) VALUES('$user','User $user login',CURRENT_TIMESTAMP)";
 				$logs = mysqli_query($db,$insert);
				header('location: home1.php?username='.$user.'');
			}else{
				array_push($error, "No user found!");
			}
		}
		echo "not found";
	}else{
		array_push($error, "Wrong Username or Password!");	
	}
}