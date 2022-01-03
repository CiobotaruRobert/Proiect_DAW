<?php
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$serverName = "eu-cdbr-west-01.cleardb.com";
$dBUsername = "be43173608710b";
$dBPassword= "ddcb2bd2";
$dBName = substr($cleardb_url["path"],1);

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn){
	die("Connection failed: " . mysqli_connect_error());
}