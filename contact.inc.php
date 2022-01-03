<?php
use PHPMailer\PHPMailer\PHPMailer;
if (isset($_POST["submit"]))
{
	$mailFrom = $_POST["mail"];
	require_once 'functions.inc.php';

if (invalidEmail($mailFrom) !== false){
		header("location: login.php?error=emptyinput");
		exit();
		}

}
else
{
	header("location: login.php");
	exit();	
}