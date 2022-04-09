<!-- Cette page contient un formulaire permettant à un utilisateur d'ajouter ou modifier une note pour un film -->
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type"
content="text/html; charset=UTF-8" />

<link rel="stylesheet" href="styles/stylegenre.css" type="text/css" media="screen" />

<title>Note</title>

</head>
<body>
<?php include("./php/bdd.php"); ?>
<?php session_start(); ?>
<?php 
//Cette fonction prend en parametre un identifiant de film et un pseudo d'utiliateur et retourne la note 
//que l'utilisateur a attribué à ce film (et "Pas de note" s'il n'a pas noté le film)
function getnote($id_film,$pseudo){
    $bdd = getBD();
	$rep = $bdd->query("select ifnull((select Note from noter where IdFilm=$id_film and pseudo='$pseudo'),'Pas de note') As Note");
	while ($mat =$rep->fetch()) 
	{
		$note=$mat['Note'];
    }
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
			<li>
				<a href="index.php">Where2Watch</a>
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
    <?php
	if(isset($_SESSION['utili']))
	{ 
		$pseudo=$_SESSION['pseudo'];
        $id_film=$_GET['id'];
        $note=getnote($id_film,$pseudo);
        echo '<br><br><br><br><br><p>Ancienne note:'.$note.'</p>';
		echo '<form action="noter.php" method="POST" autocomplete="off">';
        echo '
             <p>Nouvelle note :
            <input type="number" name="newnote" min="0" max="5"></p>';
        echo '<input type="hidden" name="actnote" value="'.$note.'"><input type="hidden" name="id" value="'.$id_film.'">
		<input type="submit" value="valider"></form>';
	}
?>

</body>
</html>