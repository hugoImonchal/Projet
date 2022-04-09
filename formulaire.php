<!-- Cette page est connécté à la BD et recupere toutes les informations
de l'utilisateur lors de son inscription pour les enregistrer dans la table utilisateur-->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<?php
include('php/bdd.php');
//fonction permettant d'enregistrer dans la bd sql le information du client
//prend en parametre un nom, prenom, pseudo,age, adresse mail et un mot de passe
function enregistrer($nom,$prenom,$pseudo,$email,$age,$mdp)
{
	$bdd= getBD();
	$sql="INSERT INTO utilisateur (nom, prenom, age, pseudo, Est_moderateur, Email, Description, Mdp) VALUES (?,?,?,?,?,?,?,?)";
	$bdd->prepare($sql)->execute([$nom,$prenom,$age,$pseudo,0,$email,"Decrivez vous",$mdp]);
	
}
//recuperation des information du formulaire
if(isset($_POST['n'])){
$nom=$_POST['n'];}
else{$nom="";}
if(isset($_POST['p'])){
$prenom=$_POST['p'];}
else{$prenom="";}
if(isset($_POST['pseudo'])){
$pseudo=$_POST['pseudo'];}
else{$pseudo="";}
if(isset($_POST['mail'])){
$email=$_POST['mail'];}
else{$email="";}
if(isset($_POST['age'])){
$age=$_POST['age'];}
else{$age="";}
if ($_POST['mdp']!=$_POST['confmdp']){
$ismdp=0; $mdp="";}
else{$ismdp=1; $mdp=$_POST['mdp'];}
?>

<head>
<link rel="stylesheet" href="styles/style.css" type="text/css" media="screen" />
  <meta charset="UTF-8">
  <title>Formulaire</title>

  <?php
$ispseudo=1;
  if($nom!="" && $prenom!="" && $pseudo!="" && $email!="" && $mdp!="" && $ismdp==1) {
	$bdd=getBD();
	$rep = $bdd->prepare("select * from utilisateur where pseudo='".$pseudo."'");
	$rep->execute();
	if($rep->rowCount()>0){
		$ispseudo=0;
		$rep ->closeCursor();
		echo  '<meta http-equiv="Refresh" content="0; url=../projet/FormulaireInscription.php?nom='
		.$nom.'&prenom='.$prenom.'&ispseudo='.$ispseudo.'&pseudo='.$pseudo.'&email='.$email.'&ismdp='.$ismdp.'"/>';  

	}else{
		$rep ->closeCursor();
		enregistrer($nom,$prenom,$pseudo,$email,$age,$mdp);
		echo  '<meta http-equiv="Refresh" content="0; url=../Projet/index.php" />';

		
	}
  }else{
	  echo  '<meta http-equiv="Refresh" content="0; url=../projet/FormulaireInscription.php?nom='
	.$nom.'&prenom='.$prenom.'&ispseudo='.$ispseudo.'&pseudo='.$pseudo.'&email='.$email.'&ismdp='.$ismdp.'"/>';  

  }
  
  ?>
  
</head>
<body>
    <?php

//affichage
// echo '<p>';
if($nom!="" && $prenom!="" && $pseudo!="" && $email!="" && $mdp!="" && $ismdp) {
	
    echo '<BR>';
    echo $nom;
    echo '<BR>';
	echo $prenom;
    echo '<BR>';
    echo $pseudo;
    echo '<BR>';
    echo $email;
    echo '<BR>';
    echo $_POST['mdp1'];
    echo '<BR>';	
	echo $_POST['mdp2'];
    echo '<BR>';	
	echo $_POST['age'];
}
else{
    echo "Au moins un champ n’a pas été saisi";
	echo "<BR>";
	echo '<p><a href="FormulaireInscription.php?n='.$nom.'&p='.$prenom.'&pseudo='.$pseudo.'&age='.$_POST['age'].'&email='.$email.'&ismdp='.$ismdp.'" >Retour au formulaire</a></p>';
    }

// echo '</p>';
?>
</body>
</html>