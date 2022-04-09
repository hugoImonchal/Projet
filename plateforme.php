<!-- Cette page est connécté à la BD et resence tous les films disponible 
selon la plateforme choisi-->
<?php session_start(); 
ini_set('display_errors', 'on');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="styles/style.css" type="text/css" media="screen" />

<meta http-equiv="Content-Type"
content="text/html; charset=UTF-8" />
<title>Plateforme</title>
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
<?php
	include('php/bdd.php');
				$bdd = getBD();
				$id= $_GET['Nom_plat'];

			$rep = $bdd->query("SELECT * FROM `plateforme` where Nom_plat='".$id."' ");
			
			while ($mat =$rep->fetch()) 
			{   
				echo "<h1>". $mat['Nom_plat']."</h1>"."<br/>" ;
				echo   "<img src= ".$mat['logo']. " alt= 'image' " ."/>";}

			     $repa = $bdd->query("select * from etre_disponible where Nom_plat='".$id."' ");
			
			  	while ($mata =$repa->fetch()) 
                 { //echo '<br>';
                    //echo "<a class='film' href='film.php?IdFilm=" . $mata['IdFilm'] . "'>" . $mata['IdFilm'] . "</a>";
                 
                $repas = $bdd->query("select * from film where IdFilm='".$mata['IdFilm']."' ");
                    while ($matas =$repas->fetch())
                    {echo '<br>';
                    echo "<li><a class='film' href='film.php?IdFilm=" . $matas['IdFilm'] . "'>" . $matas['Titre'] . "</a></li>";
                }
                 }
               
			
				
					
				?>


</body>
</html>		
	

        
        