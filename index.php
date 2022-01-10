<?php include("header.php"); 
require('dbh.inc.php');
$query="INSERT INTO vizite(total_views) VALUES (1)";
$result=mysqli_query($conn,$query);
?>


<style>
<?php include "pagini_css.css"; ?>
</style>

<section class="index-intro">

<?php
					if(isset($_SESSION["useruid"]))
					{
					echo "<p>Bine ai venit,  " . $_SESSION["useruid"] . "</p>";
					
					}
					
?>
		<h1>Casa de productie filme	</h1>
		<hr>
		<article1>Etapa 4.<br></article1><br>
				<ul class="zxc" type="disc">
				<li>In pagina "Contact" se poate trimite un mail</br>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp .

							
<br></li>
				<li>Se poate face exportul datelor.</br><br>
				    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -un user normal poate descarca sub forma de export doc lista cu filmele casei (lista contine denumirea filmului, categoria sa, si o scurta descriere).</br><br>
				    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -un user admin poate descarca sub forma de export doc lista cu userii inregistrati pe site(lista cu userii contine numele si prenumele acestora, adresa de e-mail, username-ul si tipul de user), dar si lista cu angajatii casei de filme (contine ID-ul acestora, ID-ul contractului, numele, prenumele si CNP-ul).</br></li></br>
				    <li>Utilizatorii de tip admin au acces si la o pagina ce contine statistici despre site (cum ar fi numarul de vizitatori unici ai paginii si numarul total de vizite)</br></li><br>
				    <li>Site-ul a fost testat si functioneaza corespunzator pe mai multe browsere.</li>
				</ul>

</section>



<?php include ("footer.php"); ?>
