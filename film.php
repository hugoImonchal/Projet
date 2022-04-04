<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="styles/style.css" type="text/css" media="screen" />

<meta http-equiv="Content-Type"
content="text/html; charset=UTF-8" />
<title>Film</title>
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
</head>


<body>
<br>
<br>
<br>
<br>

<br />
<p>
<?php
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
	include('php/bdd.php');
				$bdd = getBD();
				$id= $_GET['IdFilm'];

			$rep = $bdd->query("select * from film where IdFilm=$id ");
			
			while ($mat =$rep->fetch()) 
			{
				echo "<h1>". $mat['Titre']."</h1>"."<br/>" ;
				echo   "<img src= ".$mat['Affiche']. " alt= 'image' " ."/>";

				$repa = $bdd->query("select * from etre_disponible where IdFilm=$id ");
			
				while ($mata =$repa->fetch()) 
			{	
				$plat=$mata['Nom_plat'];
				echo "Film accessible sur : ";
				echo $plat;
			echo '<br>';}
					
				// echo "Film accessible sur : ".$mat['Nom_plat']."<br/>" ;
				echo "Date sortie du film : ".$mat['annee']."<br/>";
				echo "Note TMDB : ".$mat['Note_TMDB']."<br/>";
				echo "Synopsis : ".$mat['description']."<br/>"; 
				if(isset($_SESSION['pseudo'])){
					$pseudo=$_SESSION['pseudo'];
					echo "Votre note : ".getnote($id,$pseudo)."<br/>";
					echo '<a href="note.php?id='.$id.'"> Notez </a> le film ';

				}
			  
			}
			
				
					
				?>


</body>
</html>