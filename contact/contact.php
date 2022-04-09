
<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head> 
        <link rel="stylesheet" href="../styles/stylecontact.css" type="text/css" media="screen" />
        <meta http-equiv="Content-Type"content="text/html; charset=UTF-8" />
        <title>Contact</title>
       
    </head>
    <body>
	
	<header class="main">	
		<nav>
			<ul class="menu">
			<li class= "list">
				<a href="../index.php">Where2Watch</a>
				</li>
				<li class= "list">
				<a href="../acceuil.php">Accueil</a>
				</li>
				<?php
				if(isset($_SESSION['utili'])){
					echo '<li class= "list"> <a href="../deconnexion.php">Deconnexion </a> </li>';
					echo '<li class= "list"><a href="../profil.php"> Profil </a> </li>';
				}
				else{
				echo '<li class= "list"> <a href="../connexion.php"> Connexion </a> </li> ';
				echo '<li class= "list"> <a href="../FormulaireInscription.php"> Inscription </a> </li>';} ?>
				
				<li class= "list">
				<a href="contact.php">Contact</a>
				</li>
				
			</ul>
		</nav>
	</header>

<section class= "fond">
	

<br>
<br>
<br>
        


        
<div class= "container">
	<div class="information-bar">

		<ul id= "pro">
			<li > Présentation projet</li>
			<li ><a href="contacteznous.php">Contactez-nous  </a></li>

		</ul>

		<div class="profile">
			<img src="../images/logo.jpg" alt="image de profil">
<p class="name">
    Victoire , Hugo , Lamyae 
</p>		

</div>


	</div>

</div>


    <p>Lors d’un dimanche pluvieux, lorsqu’on est réuni en famille, ou entre amis... Il existe 1 001 raisons de regarder un film, 
		et ceci est le quotidien d’une grande majorité de Français.</p>
    
		<p>C'est pourquoi nous avons décider, Victoire, Hugo et Lamyae, trois étudiants en troisième année de licence MIASHS, de créer ce site dans le cadre de notre projet annuel.</p>
    
    <p>
        Notre site a pour objectif de vous aider à trouver le film ainsi que la plateforme de streaming sur lequel 
        il se trouve se rapprochant le plus de vos goûts.
    </p>
    
   

    </body>
</html>