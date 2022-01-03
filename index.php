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
		<article1>Etapa 3.<br></article1><br>
				<ul class="zxc" type="disc">
				<li>Am implementat userul administrator.</br>
				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp -atunci cand un cont administrator este conectat, apare in meniul de navigare o pagina denumita "Gestionarea bazei de date".In cadrul acesteia putem insera sau sterge filme din baza de date si de asemenea putem sterge conturi de utilizatori (un user administrator poate sa stearga doar contul unui user normal). </br>

							
<br></li>
				<li>Campurile formularelor sunt securizate.</br>
				<br></li>
				<li>Atunci cand un user se autentifica sau inregistreaza, acesta trebuie sa completeze un camp Captcha.</br>
				<br></li>
				</br>

</section>
<style>
<?php include 'pagini_css.css'; ?>
</style>


<?php include ("footer.php"); ?>