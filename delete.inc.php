<?php
if (isset($_POST["submit"])) 
{
	$denumire = $_POST["denumire"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	$denumire = mysqli_real_escape_string($conn,$denumire);

	if (emptyDelete($denumire) !== false){
		header("location: gestionarebd.php?error=emptyinput");
		exit();
		}

else 
{
deleteFilm($conn, $denumire);
}

}

else
{  header("location: gestionarebd.php");}