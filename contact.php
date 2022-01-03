<?php include("header.php"); ?>
<html>
	<head>
	<meta charset="utf-8">
	<title> Contact</title>
	</head>
<body>
<main>
<p>SEND E-MAIL</p>
<form class="contact-form" action="contactform.php" method="post">
	<input type="text" name="name" placeholder="Full name...">
	<input type="text" name="mail" placeholder="E-mail...">
	<input type="text" name="subject" placeholder="Subject...">
	<textarea name="message" placeholder="Message"></textarea>
	<button type="submit" name="submit">SEND</button>
<?php
use PHPMailer\PHPMailer\PHPMailer;
	if(isset($_GET["error"]))
{
	if($_GET["error"] == "emptyinput")
		{
			echo "<p>Fill in all fields!</p>";
		}
	else if ($_GET["error"] == "invalidEmail")
		{
		echo "<p>E-mail is invalid!</p>";
		}
}
if(isset($_GET["error"]))
{
	if($_GET["error"] == "mailsend")
		{
			echo "<p>Ati trimis mail-ul!</p>";
		}

}
?>
</form>
</main>
</body>
</html>
<?php include("footer.php"); ?>