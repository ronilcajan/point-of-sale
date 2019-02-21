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

if (isset($_GET['logout'],$_GET['username'])){
	$user = $_GET['username'];
	$insert	= "INSERT INTO logs (username,purpose,logs_time) VALUES('$user','User $user logout',CURRENT_TIMESTAMP)";
 	$logs = mysqli_query($db,$insert);
	session_destroy();
	unset($_SESSION['username']);
	header('location: index.php');
}

if (!isset($_SESSION)){
	session_start();	
}