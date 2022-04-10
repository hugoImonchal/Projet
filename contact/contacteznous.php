
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
			<li ><a href="contact.php"> Présentation projet</a></li>
			<li class= "active"><a href="contacteznous.php">Contactez-nous  </a></li>

		</ul>

		<div class="profile">
			<img src="../images/logo.jpg" alt="image de profil">
<p class="name">
    Victoire , Hugo , Lamyae 
</p>		

</div>


	</div>

</div>


    
    <p id = 'mail'> Whereto2watch@gmail.com</p>
   

    </body>
</html>