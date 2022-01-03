<?php
if (isset($_POST["submit"])) 
{
	$username = $_POST["username"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	$username = mysqli_real_escape_string($conn,$username);


	if (emptyDelete($username) !== false){
		header("location: gestionarebd.php?error=emptyinput");
		exit();
		}

else 
{
deleteUser($conn, $username);
}

}

else
{  header("location: gestionarebd.php");}