<?php
if (isset($_POST["submit"]) && isset($_POST['g-recaptcha-response'])) 
{
	$name = $_POST["name"];
	$email = $_POST["email"];
	$username = $_POST["uid"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdrepeat"];
	
	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false){
		header("location: signup.php?error=emptyinput");
		exit();
		}
	if (invalidUid($username) !== false){
		header("location: signup.php?error=invaliduid");
		exit();
		}
	if (invalidEmail($email) !== false){
		header("location: signup.php?error=invalidemail");
		exit();
		}
	if (pwdMatch($pwd,$pwdRepeat) !== false){
		header("location: signup.php?error=passwordsdontmatch");
		exit();
		}
	if (uidExists($conn,$username,$email) !== false){
		header("location: signup.php?error=usernametaken");
		exit();
		}
	$recaptcha=$_POST['g-recaptcha-response'];
if(!$recaptcha) 
{
header("location: signup.php?error=wrongcaptcha");
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

createUser($conn, $name, $email, $username, $pwd);
}

}
}
else
{  header("location: signup.php");}