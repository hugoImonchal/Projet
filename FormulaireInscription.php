<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" href="styles/styleinscription.css" type="text/css" media="screen" />

<?php
//recuperation des information si formulaire mal rempli
if(isset($_GET['nom'])){
$nom=$_GET['nom'];}
else{$nom="";}
if(isset($_GET['prenom'])){
$prenom=$_GET['prenom'];}
else{$prenom="";}
if(isset($_GET['pseudo'])){
$pseudo=$_GET['pseudo'];}
else{$pseudo="";}
if(isset($_GET['email'])){
$email=$_GET['email'];}
else{$email="";}
if(isset($_GET['pseudo'])){
$pseudo=$_GET['pseudo'];}
else{$pseudo="";}
if(isset($_GET['ismdp'])){
$ismdp=$_GET['ismdp'];}
else{$ismdp=1;}
if(isset($_GET['ispseudo'])){
$ispseudo=$_GET['ispseudo'];}
else{$ispseudo=1;}
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription</title>
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
<body>
<br>
<br>
<br>
<br>
<form action="formulaire.php" method="POST" autocomplete="off">

    <p>
<?php 
echo '
<h1> INSCRIPTION </h1>

<div class="input">	
    <input type="text" placeholder="Nom" name="n" value="'.$nom.'"/>
    
  
    <input type="text" placeholder="Prénom" name="p" value="'.$prenom.'"/>
   
    <input type="text" placeholder="Entrer votre pseudo" name="pseudo" value="'.$pseudo.'"/>
    </div>';
	
	if ($ispseudo=1){
		echo '<p> Le pseudo '.$pseudo.' est deja pris. Veuillez changer. </p>';
	}
	echo '
    <p> Séléctionnez votre âge </p>
    <SELECT name="age"> placeholder="Age"
        <OPTION
        VALUE="-10ans">-10ans</OPTION>
    <OPTION VALUE="-12ans">-12ans</OPTION>
    <OPTION VALUE="-16ans">-16ans</OPTION>
    <OPTION VALUE="-18ans">-18ans</OPTION>
    <OPTION VALUE="+18ans">+18ans</OPTION>
    </SELECT>
    <div class="input">	
    <input type="text" placeholder="Email" name="mail" value="'.$email.'"/>
    
    <input type="password" placeholder="Mot de passe" name="mdp" value=""/>
   
    <input type="password" placeholder="Confirmer le mot de passe" name="confmdp" value=""/>
    </div>';
	if ($ismdp=1){
		echo '<p> Les deux mots de passe doivent etre identique. </p>';
	}
	echo '
    <div class="input">	

    <input type="submit" value="Envoyer">
  </div>';
	

?>    
    </form>

</body>
</html>