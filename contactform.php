<?php
use PHPMailer\PHPMailer\PHPMailer;
if(isset($_POST['submit'])) {
$name = $_POST['name'];
$subject = $_POST['subject'];
$mailFrom = $_POST['mail'];
$message = $_POST['message'];

$mailTo = "robert.robert040801@yahoo.com";
$headers = "From: ".$mailFrom;
$txt = "You have received an e-mail from".$name.".\n\n".$message;
mail($mailTo, $subject, $txt, $headers);



if (isset($_POST["submit"]))
{
	$mailFrom = $_POST["mail"];
	require_once 'functions.inc.php';

if (emptyInputContact($name, $subject, $mailFrom, $message) !== false){
		header("location: contact.php?error=emptyinput");
		exit();
		}
else if(invalidEmail($mailFrom) !== false){
		header("location: contact.php?error=invalidEmail");
		exit();
		}


}

	header("location: contact.php?error=mailsend");
	exit();	

}
