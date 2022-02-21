<!DOCTYPE html>
<html lang="fr">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire</title>
</head>
<body>
    <?php
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
if ($_POST['mdp1']!=$_POST['mdp2']){
$ismdp=FALSE;}
else{$ismdp=TRUE;}

//affichage
echo '<p>';
if($nom!="" && $prenom!="" && $pseudo!="" && $email!="" && $_POST['mdp1']!="" && $_POST['mdp2']!="" && $ismdp) {

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
	echo '<p><a href="./FormulaireInscritpion.php?nom='.$nom.'&prenom='.$prenom.'&pseudo='.$pseudo.'&age='.$_POST['age'].'&email='.$email.'&ismdp='.$ismdp.'" >Retour au formulaire</a></p>';
    }

echo '</p>';
?>
</body>
</html>