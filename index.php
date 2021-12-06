<?php include("header.php"); ?>

<section class="index-intro">

<?php
					if(isset($_SESSION["useruid"]))
					{
					echo "<p>Bine ai venit,  " . $_SESSION["useruid"] . "</p>";
					
					}
					
?>
		<h1>Casa de productie filme	</h1>
		<hr>
		<article1>Etapa 2. Functionalitati adaugate:<br></article1><br>
				<ul class="zxc" type="disc">
				<li>Site-ul prezinta un sistem de autentificare.</br>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -informatiile despre contul utilizatorului precum numele si prenumele, adresa de e-mail, username-ul si parola sunt stocate in baza de date. </br>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -parola este stocata in baza de date in mod hash-uit</br>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -atunci cand un user se inregistreaza, se verifica daca a ramas vreun camp gol, daca userul exista deja in baza de date, daca mail-ul este valid, daca username-ul este valid si daca datele introduse in campurile "password" si "confirm password" coincid. </br>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -de asemenea, verificari legate de datele introduse se fac si atunci cand un user se autentifica.</br>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -atunci cand un user se autentifica cu succes, un mesaj corespunzator va fi afisat, iar pagina se modifica, in locul optiunilor "Sign Up" si "Log In" ne sunt afisate optiunile "Profile" si "Log out"</br>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -toate campurile care permit input din partea userului sunt protejate impotriva SQL injection, datele introduse sunt mai intai verificate, apoi introduse in baza de date.</br>
</li>
				<li>In optiunea de contact a site-ului, userul poate trimite un e-mail pentru contact.</br>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp - validitatea e-mail-ului introdus este verificata</br>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp - se verifica sa fie toate campurile completate</br>
				</li>
				<li>Site-ul prezinta si o optiune numita "Cauta film" care permite cautarea unui film in baza de date dupa titlul acestuia (ex: Shutter Island), sau o bucata din el, sau dupa categorie(ex: actiune), prin query-urile aferente.</br>
				</li>
				<li>Codul HTML a fost reutilizat prin repartizarea sa in fisierele php denumite header.php si footer.php.</br>
				</li></br>

</section>
<style>
<?php include 'pagini_css.css'; ?>
</style>


<?php include ("footer.php"); ?>