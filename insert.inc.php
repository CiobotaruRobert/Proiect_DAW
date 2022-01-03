<?php
if (isset($_POST["submit"])) 
{
	$denumire = $_POST["denumire"];
	$categorie = $_POST["categorie"];
	$descriere = $_POST["descriere"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	$denumire = mysqli_real_escape_string($conn,$denumire);
	$categorie = mysqli_real_escape_string($conn,$categorie);
	$descriere = mysqli_real_escape_string($conn,$descriere);

	if (emptyInsert($denumire, $categorie, $descriere) !== false){
		header("location: gestionarebd.php?error=emptyinput");
		exit();
		}

else 
{
insertFilm($conn, $denumire, $categorie, $descriere);
}

}

else
{  header("location: gestionarebd.php");}