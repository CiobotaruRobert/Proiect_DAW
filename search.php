<?php include "header.php"?>
<?php include "dbh.inc.php";?>


<h1>Rezultatele cautarii</h1>
<div class="article-container">
<?php
	if(isset($_POST['submit-search'])){
		$search = mysqli_real_escape_string($conn, $_POST['search']);
		$sql = "SELECT * FROM film WHERE denumire LIKE '%$search%' OR categorie LIKE '%search%'";
	$result = mysqli_query($conn, $sql);
	$queryResult = mysqli_num_rows($result);
	if($queryResult > 0)
{

	while($row = mysqli_fetch_assoc($result)){
echo "<div class='article-box'>
				<h3>".$row['denumire']."</h3>
				<p>".$row['categorie']."</p>
				<p>".$row['descriere']."</p>
				</div>";
}}
else{
echo "Nu sunt rezultate care corespund cautarii!";
}}
?>
</div>

<?php include "footer.php"?>