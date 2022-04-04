<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type"
content="text/html; charset=UTF-8" />

<link rel="stylesheet" href="styles/style.css" type="text/css" media="screen" />

<title>Plateforme</title>

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
	}
	else 
	{  
		echo 'Vous nêtes pas connecté(e)'.'<br/>';
		
	}
	?> 

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

<section class= "fond">
    <?php
    echo "<br><br><br><br>";
	if(isset($_SESSION['utili']))
	{ 
		$pseudo=$_SESSION['pseudo'];
        $bdd=getBD();
        echo "<p> Vos platformes de streaming: </p>";
		$sql="select * from etre_inscrit where pseudo='$pseudo'";
		$rep=$bdd->query($sql);
		echo "<ul>";
		while ($ligne = $rep ->fetch()) {
			$plat=$ligne['Nom_plat'];
			echo "<li>{$plat} </li>";

		}
		echo "</ul>";

        echo "<p>Platerformes disponibles sur notre site: </p>";
        $sql="select Nom_plat from plateforme ";
		$rep=$bdd->query($sql);
		echo "<ul>";
		//listes des plateformes
        while ($ligne = $rep ->fetch()) {
        	$nom=$ligne['Nom_plat'];
            echo '<li>'.$nom.' <a href="addplat.php?plat='.$nom.'">Ajouter </a>  ou  <a href="delplat.php?plat='.$nom.'"> Supprimer </a> </li> ';
		}
		$rep ->closeCursor();
		echo '</ul>';

	}
?>


</body>
</html>