<?php include "header.php"?>
<?php include "dbh.inc.php";?>
<style>
<?php include 'pagina_cautare_style.css'; ?>
</style>
<form action="search.php" method="POST">
	<input type="text" name="search" placeholder="Search...">
	<button type="submit" name="submit-search">Cauta</button>
</form>
<h1>Filme</h1>
<h2>Toate articolele:</h2>

<div class="article-container">
<?php

	$sql = "SELECT * FROM film";
	$result = mysqli_query($conn, $sql);
	$queryResults = mysqli_num_rows($result);

	if($queryResults > 0){
		while($row = mysqli_fetch_assoc($result)) {
			echo "<div class='article-box'>
				<h3>".$row['denumire']."</h3>
				<p>".$row['categorie']."</p>
				<p>".$row['descriere']."</p>
				</div>";
}
}
?>
</div>


<?php include "footer.php"?>