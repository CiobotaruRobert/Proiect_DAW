<?php include_once 'header.php' ?>
<section class="signup-form">
<h2>Log In</h2>
<div class="signup-form">
<form action="login.inc.php" method="post">
<input type="text" name="uid" placeholder="Username/E-mail...">
<input type="password" name="pwd" placeholder="Password...">
<div class="g-recaptcha" data-sitekey="6LcsJoAdAAAAAJRAxbVYhN36VUD-x7krnigNlUH3"></div>
<button type="submit" name="submit">Log In</button>

</form>


<?php
	if(isset($_GET["error"]))
{
	if($_GET["error"] == "emptyinput")
		{
			echo "<p>Fill in all fields!</p>";
		}
	else if ($_GET["error"] == "wronglogin")
		{
		echo "<p>Incorrect login information!</p>";
		}
	if($_GET["error"] == "wrongcaptcha")
		{
			echo "<p>Verificati reCaptcha!</p>";
		}
}
?>
</section>

<style>
<?php include 'pagini_css.css'; ?>
<?php include 'signup-form.css'; ?>
</style>
<?php include_once 'footer.php' ?>