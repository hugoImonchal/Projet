<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type"
content="text/html; charset=UTF-8" />

<link rel="stylesheet" href="styles/styleprofil.css" type="text/css" media="screen" />

<title>Profil</title>

</head>

<body>

<?php include("php/bdd.php"); ?>

<?php session_start(); ?>
<?php 
function getfilm($id){
	$bdd = getBD();
	$rep = $bdd->query("select * from film where IdFilm=$id ");
	while ($mat =$rep->fetch()) 
	{
		$titre=$mat['Titre'];
    }
	$rep ->closeCursor();
    return $titre;
}
function getnote($id_film,$pseudo){
    $bdd = getBD();
	$rep = $bdd->query("select ifnull((select Note from noter where IdFilm=$id_film and pseudo='$pseudo'),'Pas de note') As Note");
	while ($mat =$rep->fetch()) 
	{
		$note=$mat['Note'];
    }
	$rep ->closeCursor();
    return $note;

}
?>

	<?php
	if(isset($_SESSION['utili']))
	{ 
		echo 'Bonjour' .' ';
		 echo $_SESSION['nom'] .' ';
		 echo $_SESSION['prenom'] .'<br/>';
	}
	else 
	{  
		echo 'Vous nêtes pas connecté(e)'.'<br/>';
		
	}
	?> 

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
				echo '<li class= "list"> <a href="FormulaireInscription.php"> Inscription </a> </li>';
				} ?>
				
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
			<li class= "active"><a href="mesfilms.php">Mes films  </a> </li>
			<li ><a href="mesplateformes.php">Mes plateformes de streaming  </a></li>

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
		echo '<p>Vos films visionés</p>';
		echo '<table><tr><th>Titre</th><th>Votre note</th></tr>';
        $bdd=getBD();
        $sql="select * from vu where pseudo='$pseudo'";
		$rep=$bdd->query($sql);
		//listes des films visionés
        while ($ligne = $rep ->fetch()) {

        	$id_film=$ligne['id_film'];
			//echo $id_film;
			$titre=getfilm($id_film);
			//echo $titre;
			$note=getnote($id_film,$pseudo);
			//echo $note;				
			
		 	echo "<tr><td><a href='film.php?id='{$id_film}'>{$titre}</a></td><td>{$note}<br><a href='note.php?id={$id_film}'>modifier</a></td></tr>"; //<br><a href='note.php'>modifier</a>
		}
		$rep ->closeCursor();
		echo '</table>';
	}
?>


</body>
</html>