<!DOCTYPE html>
<?php
include('php/bdd.php');
//fonction permettant d'enregistrer dans la bd sql le information du client
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
<html lang="fr">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire</title>
  
  <?php
$ispseudo=0;
  if($nom!="" && $prenom!="" && $pseudo!="" && $email!="" && $mdp!="" && $ismdp) {
	$bdd=getBD();
	$rep = $bdd->prepare("select * from utilisateur where pseudo='".$pseudo."'");
	$rep->execute();
	if($rep->rowCount()>0){
		$ispseudo=1;
		$rep ->closeCursor();
		echo  '<meta http-equiv="Refresh" content="0; url=../projet/FormulaireInscritpion.php?nom='.$nom.'&prenom='.$prenom.'&ispseudo='.$ispseudo.'&pseudo='.$pseudo.'&email='.$email.'&ismdp='.$ismdp.'"/>';  

	}else{
		$rep ->closeCursor();
		enregistrer($nom,$prenom,$pseudo,$email,$age,$mdp);
		echo  '<meta http-equiv="Refresh" content="0; url=../Projet/index.php" />';

		
	}
  }else{echo  '<meta http-equiv="Refresh" content="0; url=../projet/FormulaireInscritpion.php?nom='.$nom.'&prenom='.$prenom.'&ispseudo='.$ispseudo.'&pseudo='.$pseudo.'&email='.$email.'&ismdp='.$ismdp.'"/>';  
  }
  
  
  ?>
  
</head>
<body>
    <?php

//affichage
echo '<p>';
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
	echo '<p><a href="./FormulaireInscritpion.php?n='.$nom.'&p='.$prenom.'&pseudo='.$pseudo.'&age='.$_POST['age'].'&email='.$email.'&ismdp='.$ismdp.'" >Retour au formulaire</a></p>';
    }

echo '</p>';
?>
</body>
</html>