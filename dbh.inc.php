<?php
$dBName = "...";
$serverName = "...";
$dBUsername = "...";
$dBPassword= "...";


$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}
