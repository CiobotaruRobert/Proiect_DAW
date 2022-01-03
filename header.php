<?php
	session_start();
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Acesta este un site pentru filme">
		<title>Proiect</title>
		<link rel="stylesheet" href="pagini_css.css">
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	</head>

	<body>

			<div class="menu-bar">
				<nav>
					<ul>
					<li><a href="index.php">Acasa</a></li>
					<li><a href="cauta_film.php">Cauta un film</a></li>
					<li><a href="#">-</a></li>
					<?php
					if(isset($_SESSION["useruid"]))
					{
					echo "<li><a href='profile.php'>Profil</a></li>";
					echo "<li><a href='logout.inc.php'>Log out</a></li>";	
					}
					else
					{
					echo "<li><a href='signup.php'>Sign up</a></li>";
					echo "<li><a href='login.php'>Login</a></li>";
					}
					
					if(isset($_SESSION["useruid"]) && $_SESSION["useruid"]=='Robert71')
					{
					echo "<li><a href='gestionarebd.php'>Gestioneaza baza de date</a></li>";
					}
						
					?>
					<li><a href="#">-</a>
					</li>
						
					<li><a href="contact.php">Contact</a>
					
					</li>
			</div>
