<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type"
content="text/html; charset=UTF-8" />

<link rel="stylesheet" href="styles/styleindexx.css" type="text/css" media="screen" />

<title>Where2Watch</title>

</head>

<body>

<?php include("php/bdd.php"); ?>

<?php session_start(); ?>

	<?php
	if(isset($_SESSION['utili']))
	{ 
		echo 'Bonjour' .' ';
		 echo $_SESSION['nom'] .' ';
		 echo $_SESSION['prenom'] .'<br/>';
         echo ' ' .'vous êtes connécté(e)';
		 echo "<h2><a href="."deconnexion.php".">Se déconnecter</a></h2>"."<br/>";
	}
	else 
	{  
		echo 'Vous nêtes pas connecté(e)'.'<br/>';	
		echo "<h2><a href="."FormulaireInscription.php".">S'inscrire</a></h2>"."<br/>";
		echo "<h2><a href="."connexion.php".">Se connecter</a></h2>"."<br/>";
		
	}
	?> 

	<header class="main">	
		<nav>
			<h1 id="logo" >Where2Watch </h1>
			<ul class="menu">
				<li>
				<a href="acceuil.php">Accueil</a>
				</li>
				<li>
				<a href="connexion.php">Connexion</a>
				</li>
				<li>
				<a href="FormulaireInscription.php">Inscription</a>
				</li>
				<li>
				<a href="contact.html">Contact</a>
				</li>
			</ul>
		</nav>
	</header>

<section class= "fond">
	<h2> WHERE 2 WATCH </h2>
	<h3> Qu'allez vous regarder aujourd'hui ? </h3>
	
	<button> Commencer </button>




</body>
</html>