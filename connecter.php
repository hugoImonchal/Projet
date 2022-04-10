<!DOCTYPE html>
<!-- Cette page va chercher dans la base de données les informations
entrer par l'utilisateur pour se connecter.
Si l'utilisateur entre de mauvais identifier il ne pourras pas se connecter -->
<html lang="fr">
<head>
<meta http-equiv="Content-Type"
content="text/html; charset=UTF-8" />

<link rel="stylesheet" href="styles/style.css" type="text/css" media="screen" />

<title>Connecter</title>
<?php 
include('php/bdd.php');
session_start();

$bdd = getBD();

$pseudo=$_POST['pseudo'];
$mdp=$_POST['mdp'];
if($pseudo=='' || $mdp=='')
{
   echo '<meta http-equiv="refresh" content="2;url=connexion.php"/>'; 
   //echo 'veuillez remplir tous les champs';
}
if( $ligne['pseudo']!=$pseudo || $ligne['Mdp']!=$mdp )
{
 //echo 'Mauvais identifiant ou mauvais mot de passe';
 echo '<meta http-equiv="refresh" content="2;url=connexion.php"/>'; 

}
$rep = $bdd->query('select * from utilisateur where pseudo="'.$pseudo.'"');
while ($ligne =$rep ->fetch()) 
{
//  echo $ligne['nom']."<br/>";
//  echo $ligne['prenom'];
//  echo $ligne['pseudo'];


if( $ligne['pseudo']!=$pseudo || $ligne['Mdp']!=$mdp )
{
 echo 'Mauvais identifiant ou mauvais mot de passe';
}

else
{
    $_SESSION['utili']=array(
       $ligne['pseudo'],
       $ligne['nom'],
       $ligne['prenom'],
       $ligne['age'],
       $ligne['Est_moderateur'],
       $ligne['Email'],
       $ligne['Description'],
       $ligne['Mdp']
      
      );
	   
    $_SESSION['nom']= $ligne['nom'];
    $_SESSION['prenom']= $ligne['prenom'];
    $_SESSION['pseudo']=  $ligne['pseudo'];
   echo '<meta http-equiv="refresh" content="0;url=index.php"/>';
}


}

?>

</head>
</html>
