<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="styles/style.css" type="text/css" media="screen" />

<meta http-equiv="Content-Type"
content="text/html; charset=UTF-8" />
<title>Film</title>
<header class="main">	
		<nav>
			<ul class="menu">
			<li>
				<a href="index.php"> Where2Watch</a>
				</li>
				<li>
				<a href="acceuil.php">Accueil</a>
				</li>
				<?php
				if(isset($_SESSION['utili'])){
					echo '<li> <a href="deconnexion.php">Deconnexion </a> </li>';
					echo '<li> <a href="profil.php"> Profil </a> </li>';
				}
				else{
				echo '<li> <a href="connexion.php"> Connexion </a> </li> ';
				echo '<li> <a href="FormulaireInscription.php"> Inscription </a> </li>';} ?>
				
				<li>
				<a href="contact/contact.php">Contact</a>
				</li>
				
			</ul>
		</nav>
	</header>
</head>


<body>
<br>
<br>
<br>
<br>
<h1>Film</h1>

<br />
<p>
<?php
	include('php/bdd.php');
				$bdd = getBD();
				$id= $_GET['IdFilm'];

			$rep = $bdd->query("select * from film where IdFilm=$id ");
			
			while ($mat =$rep->fetch()) 
			{
				echo   "<img src= ".$mat['Affiche']. " alt= 'image' " ."/>";
				echo $mat['Titre']."<br/>" ;
				$repa = $bdd->query("select * from etre_disponible where IdFilm=$id ");
			
				while ($mata =$repa->fetch()) 
			{	
				$plat=$mata['Nom_plat'];
				echo $plat;}
					
				echo $mat['Nom_plat']."<br/>" ;
				echo $mat['Realisateur']."<br/>"; 
				echo $mat['annee']."<br/>";
				echo $mat['Note_TMBD']."<br/>";
				echo $mat['description']."<br/>"; 
				
			  
			}
			
				
					
				?>

<h2><a href="acceuil.php" > Retour </a></h2>

</body>
</html>