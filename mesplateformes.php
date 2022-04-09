<!-- Cette page montre la liste des plateformes de l'utilisateur -->
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type"
content="text/html; charset=UTF-8" />

<link rel="stylesheet" href="styles/styleprofil.css" type="text/css" media="screen" />

<title>Mes Plateformes</title>

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
			<li class= "list">
				<a href="index.php">Where2Watch</a>
				</li>
				<li class= "list">
				<a href="acceuil.php">Accueil</a>
				</li>
				<?php
				if(isset($_SESSION['utili'])){
					echo '<li class= "list"> <a href="deconnexion.php">Deconnexion </a> </li>';
					echo '<li class= "list"><a href="profil.php"> Profil </a> </li>';
				}
				else{
				echo '<li class= "list"> <a href="connexion.php"> Connexion </a> </li> ';
				echo '<li class= "list"> <a href="FormulaireInscription.php"> Inscription </a> </li>';} ?>
				
				<li class= "list">
				<a href="contact/contact.php">Contact</a>
				</li>
				
			</ul>
		</nav>
	</header>

<section class= "fond">
	

	


<div class= "container">
	<div class="information-bar">

		<ul id= "pro">
			<li ><a href="profil.php"> Mon Profil</a></li>
			<li ><a href="mesfilms.php">Mes films  </a> </li>
			<li class= "active"><a href="mesplateformes.php">Mes plateformes de streaming  </a></li>

		</ul>

		<div class="profile">
			<img src="images/chiot.jpg" alt="image de profil">
<p class="name">
<?php echo $_SESSION['nom'];
	echo "   ";
	echo $_SESSION['prenom'];
 ?> </p>

		</div>


	</div>

</div>

    
    <?php
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
		echo "<p> <a href='plat.php'>Ajouter ou supprimer </a> une platforme</p> ";

	}
?>


</body>
</html>