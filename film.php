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

function getvu($id_film,$pseudo){
	$bdd = getBD();
	$rep = $bdd->query("select id_vu from vu where id_film=$id_film and pseudo='$pseudo'");
	while ($mat =$rep->fetch()) 
	$vu=0;
	{
		$vu=$vu+1;
	}
	return $vu;
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
				echo   "<img class='image' src= ".$mat['Affiche']. " alt= 'image' " ."/>";

				$repa = $bdd->query("select * from etre_disponible where IdFilm=$id ");
			
				while ($mata =$repa->fetch()) 
			{	
				$plat=$mata['Nom_plat'];
				echo "<li>Film accessible sur : ";
				echo "<a href='plateforme.php?Nom_plat=" . $mata['Nom_plat'] . "'>" . $mata['Nom_plat'] . "</a></li>";
				

			echo '<br>';}
			$repas = $bdd->query("select * from etre where IdFilm=$id ");
			
			echo "<li>Genre : ";
			while ($matas =$repas->fetch()) 
			{	$genre=$matas['Nom_genre'];
				echo "<a href='genre.php?Nom_genre=" . $genre . "'>" . $genre. "<br></a></li>";}
				
					
				echo "<li>Date sortie du film : ".$mat['annee']."</li><br/>";
				echo "<li>Note TMDB : ".$mat['Note_TMDB']."</li><br/>";
				echo "<li>Synopsis : ".$mat['description']."</li><br/>"; 
				if(isset($_SESSION['pseudo'])){
					$pseudo=$_SESSION['pseudo'];
					echo "Votre note : ".getnote($id,$pseudo)."<br/>";
					echo '<a href="note.php?id='.$id.'"> Notez </a> le film ';
					echo '<br>';
					$vu=getvu($id,$pseudo);
					if($vu==0){
						echo "Vous n'avez pas vu ce film  :";
					}
					else{echo "Vous avez vu ce film  :";}
					echo '<a href="vu.php?id='.$id.'"> modifier </a>';
				}
			
			}

			// if (isset($_SESSION['utili'])) {
			// 	$idd = $_SESSION['IdFilm'];
			// 	$pseudoo = $_SESSION['pseudo'];
			
			if(isset($_POST['poster'])){
				if(isset($_POST['commentaire']) AND !empty($_POST['commentaire']))
				{
					$commentaire= ($_POST['commentaire']);
					$ins="INSERT INTO commenter (pseudo,IdFilm,  Commentaire) VALUES (?,?,?)";
	        		$bdd->prepare($ins)->execute([$pseudo,$id,$commentaire]);

					


					$msg= "votre commentaire a bien été posté";

				}else{
					$msg= "Erreur: Le champ ne doit pas être vide";



				}


			}
				
					
				?>


				<br><br>

			<?php	if(isset($_SESSION['utili'])){
			 echo "<h2>Commentaires:</h2>";
			 echo '
<form method= "POST" >
<textarea name="commentaire" placeholder="Votre commentaire..." ></textarea>
<input type="submit" name="poster" value="poster mon commentaire" />
</form>';
			

}

	 ?>

</body>
</html>