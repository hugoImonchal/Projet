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
				$id= $_GET['Nom_genre'];

			$rep = $bdd->query("SELECT * FROM `etre` where Nom_genre='".$id."' ");
            echo "<h1>". $id."</h1>"."<br/>" ;

			while ($mat =$rep->fetch()) 
			 {   

			    
                $repas = $bdd->query("select * from film where IdFilm='".$mat['IdFilm']."' ");
                    while ($matas =$repas->fetch())
                    {echo '<br>';
                    echo "<li><a class='film' href='film.php?IdFilm=" . $matas['IdFilm'] . "'>" . $matas['Titre'] . "</a></li>";
                }
                  }
               
			
				
					
				?>


</body>
</html>		
	

        
        