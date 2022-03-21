
<!DOCTYPE html>
<html lang="fr">
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
<link rel="stylesheet" href="styles/styleindexx.css" type="text/css" media="screen" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire d'inscription</title>
</head>
<body>
<form action="formulaire.php" method="POST" autocomplete="off">

    <p>
<?php 
echo '
    Nom :
    <input type="text" placeholder="Entrer votre nom" name="n" value="'.$nom.'"/>
    </p>
    <p>
    Prénom :
    <input type="text" placeholder="Entrer votre prénom" name="p" value="'.$prenom.'"/>
    </p>
    <p>
    Pseudo :
    <input type="text" placeholder="Entrer votre pseudo" name="pseudo" value="'.$pseudo.'"/>
    </p>';
	
	if ($ispseudo=1){
		echo '<p> Le pseudo '.$pseudo.' est deja pris. Veuillez changer. </p>';
	}
	echo '
    <p>
    Age :
    <SELECT name="age"> placeholder="sélectionner votre age"
        <OPTION
        VALUE="-10ans">-10ans</OPTION>
    <OPTION VALUE="-12ans">-12ans</OPTION>
    <OPTION VALUE="-16ans">-16ans</OPTION>
    <OPTION VALUE="-18ans">-18ans</OPTION>
    <OPTION VALUE="+18ans">+18ans</OPTION>
    </SELECT>
    </p>
    Mail :
    <input type="text" placeholder="Entrer votre mail" name="mail" value="'.$email.'"/>
    </p>
    <p>
    Mot de passe :
    <input type="password" placeholder="Entrer votre mot de passe" name="mdp" value=""/>
    </p>
    <p>
    Confirmer mot de passe :
    <input type="password" placeholder="Confirmer votre mot de passe" name="confmdp" value=""/>
    </p>';
	if ($ismdp=1){
		echo '<p> Les deux mots de passe doivent etre identique. </p>';
	}
	echo '
    <p>
    <input type="submit" value="Envoyer">
    </p>';
	

?>    
    </form>

</body>
</html>