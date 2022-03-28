<!DOCTYPE html>
<?php include("./php/bdd.php"); ?>
<?php session_start(); ?>
<html lang="fr">
<head>
<meta http-equiv="Content-Type"
content="text/html; charset=UTF-8" />

<link rel="stylesheet" href="styles/style.css" type="text/css" media="screen" />

<title>Del plat</title>



	<?php
	if(isset($_SESSION['utili']))
	{ 
		$pseudo= $_SESSION['pseudo'];
        $plat=$_GET['plat'];
        $bdd=getBD();
        $sql="DELETE FROM etre_inscrit WHERE etre_inscrit.pseudo='".$pseudo."' AND
        etre_inscrit.Nom_plat='".$plat."'";
	    $bdd->prepare($sql)->execute();
         echo  '<meta http-equiv="Refresh" content="0; url=./plat.php" />';
	}
	else 
	{  
		echo 'Vous nêtes pas connecté(e)'.'<br/>';
		
	}
	?> 

</head>
<body>
	<header class="main">	
		<nav>
			<ul class="menu">
			<li>
				<a href="index.php">Where2Watch</a>
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

</body>
</html>