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
			<li><a href="recommandation.php">Recommandation </a></li>


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
		echo "<h1> Mes platformes de streaming: </h1>";
		$sql="select * from etre_inscrit where pseudo='$pseudo'";
		$rep=$bdd->query($sql);
		echo "<ul class= 'plat'>";
		while ($ligne = $rep ->fetch()) {
			$plat=$ligne['Nom_plat'];
			echo "<li><a href='plateforme.php?Nom_plat=" . $d=$ligne['Nom_plat'] . "'>" .  $ligne['Nom_plat'] . "</a></li>";
		}
		echo "</ul>";
		echo "<br>";
		echo "<p class= 'plat'> <a href='plat.php'>Ajouter ou supprimer  une platforme</a></p> ";

	}
?>

<br>
<br>
<br>
<br>
<br>
</body>
</html>