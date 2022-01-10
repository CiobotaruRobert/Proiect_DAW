<?php
$dBName = "id18236500_proiectdaw";
$serverName = "localhost";
$dBUsername = "id18236500_robert123";
$dBPassword= "rH@uz2uYH|dYIc|O";


$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}