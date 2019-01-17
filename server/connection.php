<?php

$database	= 'PointOfSale';
$username	= 'root';
$host		= 'localhost';
$password	= '';

$db 	= mysqli_connect($host,$username,$password,$database);

if(!$db){
	die("Connection Failed: ".mysql_connect_error());
}
