<?php
$database	= 'PointOfSale';
$username	= 'root';
$host		= 'localhost';
$password	= '';

$db 	= mysqli_connect($host,$username,$password,$database);

if($db == false){
	die("Connection Failed: ".mysql_connect_error());
}

if (isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['username']);
	header('location: index.php');
}

if (!isset($_SESSION)){
	session_start();	
}