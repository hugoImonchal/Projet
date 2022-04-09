<!-- Cette page est connécté à la BD et resence toutes les information l
sur le film choisi (plateformes, genre, dates...)-->
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="styles/stylefilms.css" type="text/css" media="screen" />

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

//Cette fonction prend en parametre un identifiant de film et un pseudo d'utiliateur et retourne la nombre
// de ligne dans la table vu ou apparaissent le pseudo et l'identifiant
//en pratique cette fonction et utilisée pour savoir quel film a vu l'utilisateur (en théorie retourne 0 ou 1)
//(utilisation de cette fonction pour correction d'un bug qui ecrivais une nouvelle ligne dans la table vu lorsque l'utilisateur modifiais la note) 
function getvu($id_film,$pseudo){
	$bdd = getBD();
	$rep = $bdd->query("select id_vu from vu where id_film=$id_film and pseudo='$pseudo'");
	$vu=0;
	while ($mat =$rep->fetch()) 
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
				echo '<br>';
				echo '<br>';
				echo '<br>';
				echo "<ul class= 'bjr'>";
				echo "<li >Synopsis : ".$mat['description']."</li><br/>"; 	
				echo "<li >Date sortie du film : ".$mat['annee']."</li><br/>";
				echo "<li >Note TMDB : ".$mat['Note_TMDB']."</li><br/>";
				
				$repa = $bdd->query("select * from etre_disponible where IdFilm=$id ");
				echo '</ul>';
				echo "<ul class= 'bjr'>";
				echo "<li>Film accessible sur : </li>";

				while ($mata =$repa->fetch()) 
			{	
				$plat=$mata['Nom_plat'];
				 
				echo "<li><span><a href='plateforme.php?Nom_plat=" . $mata['Nom_plat'] . "'>" . $mata['Nom_plat'] . "</a></span></li>";
		}			

			$repas = $bdd->query("select * from etre where IdFilm=$id ");
			echo '</ul>';
			echo "<ul class = 'bjr'>";
			echo "<li> Genre : </li>";
			while ($matas =$repas->fetch()) 
			
			{	
				$genre=$matas['Nom_genre'];
				
				echo "<li><span><a href='genre.php?Nom_genre=" . $genre . "'>" . $genre. "</a></span></li>";}
				


				if(isset($_SESSION['pseudo'])){
					$pseudo=$_SESSION['pseudo'];
					echo "<li>Votre note : ".getnote($id,$pseudo)."</li>";
					echo '<li><span><a href="note.php?id='.$id.'"> Notez </span></a> le film </li>';
					echo '<br>';
					$vu=getvu($id,$pseudo);
					if($vu==0){
						echo "<li>Vous n'avez pas vu ce film  :";
					}
					else{echo "<li>Vous avez vu ce film  :";}
					echo '<span><a href="vu.php?id='.$id.'"> modifier </a></span></li>';
				}
			
			}
				echo '</ul>';
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
			 echo '
<form method= "POST" >
<textarea name="commentaire" placeholder="Votre commentaire..." ></textarea>
<input type="submit" name="poster" value="poster mon commentaire" />
</form>';
			

}

	 ?>

</body>
</html>