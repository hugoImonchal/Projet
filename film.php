<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="../styles/stylearticles.css" type="text/css" media="screen" />

<meta http-equiv="Content-Type"
content="text/html; charset=UTF-8" />
<title>Film</title>
</head>

<body>

<h1>Film</h1>

<br />
<p>
<?php
	include('php/bdd.php');
				$bdd = getBD();
				$id= $_GET['IdFilm'];

			$rep = $bdd->query("select * from film where IdFilm=$id ");

			while ($mat =$rep->fetch()) 
			{
				echo   "<img src= ".$mat['Affiche']. " alt= 'image' " ."/>";
				echo $mat['Titre']."<br/>" ;
				echo $mat['Realisateur']."<br/>"; 
				
			  
			}
			$rep ->closeCursor();
					
				
					
				?>

<h2><a href="indexx.html" target="_blank"> Accueil </a></h2>

</body>
</html>