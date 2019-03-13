<?php
$database	= 'PointOfSale';
$username	= 'root';
$host		= 'localhost';
$password	= '';
$msg 		= '';
$db 	= mysqli_connect($host,$username,$password,$database);

if($db == false){
	die("Connection Failed: ".mysql_connect_error());
}

if(!isset($_SESSION)){
	session_start();	
}

if (isset($_POST['logout'])){
	$user = $_SESSION['username'];
	$insert	= "INSERT INTO logs (username,purpose) VALUES('$user','User $user logout')";
 	$logs = mysqli_query($db,$insert);
	session_destroy();
	unset($_SESSION['username']);
	header('location: ../index.php');
}


