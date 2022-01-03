<?php

if (isset($_POST["submit"]) && isset($_POST['g-recaptcha-response']))
{
	$recaptcha=$_POST['g-recaptcha-response'];
	$username = $_POST["uid"];
	$pwd = $_POST["pwd"];
	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	$username = mysqli_real_escape_string($conn,$username);
	$pwd = mysqli_real_escape_string($conn,$pwd);

if (emptyInputLogin($username, $pwd) !== false)
{
		header("location: login.php?error=emptyinput");
		exit();
}

if(!$recaptcha) 
{
header("location: login.php?error=wrongcaptcha");
exit();
}

else 
{
$secret="6LcsJoAdAAAAAJtJcg26-PMcXBjB-6MCbUjwn8Rw";
$url='https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$recaptcha;
$response=file_get_contents($url);
$responseKeys=json_decode($response,true);
if($responseKeys['success'])

{
loginUser($conn, $username, $pwd);
}

}

}
else
{
	header("location: /login.php");
	exit();	
}