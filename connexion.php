<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="styles/styleconnexion.css" type="text/css" media="screen" />

<meta http-equiv="Content-Type"
content="text/html; charset=UTF-8" />
<title>Connexion</title>
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
	<section class= "fond">

</head>
<br>
<br>
<br>
<br>

<body>
<?php include("php/bdd.php"); ?>



<form action="connecter.php" method="post" autocomplete="off">
<h1>CONNEXION </h1>

<div class="input">	

<input type="text" name="pseudo" placeholder="pseudo" value=""/>


<input type="password" name="mdp" placeholder="mot de passe" value=""/>

</div>
<p>
<input type="submit" value="Se connecter">
</p>

<p>Si vous n'avez pas de <span>compte</span>  
	<span>inscrivez-vous</span>  dans le <span>menu</span>  ci-dessus</p>




</body>
</html>