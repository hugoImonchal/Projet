<!DOCTYPE html>
<?php include("./php/bdd.php");?>
<?php session_start(); ?>
<html lang="fr">
<head>
<meta http-equiv="Content-Type"
content="text/html; charset=UTF-8" />

<link rel="stylesheet" href="styles/style.css" type="text/css" media="screen" />

<title>Vu</title>

</head>
<body>

	<?php
    function visionne($id,$pseudo){
        $bdd=getBD();
        $sql="INSERT INTO vu (id_film, pseudo) VALUES (?,?)";
       $bdd->prepare($sql)->execute([$id,$pseudo]);

    }
	if(isset($_SESSION['utili']))
	{ 
		 $pseudo= $_SESSION['pseudo'];
         $id=$_GET['id'];
         $ajout=$_POST['ajout'];
         if($ajout=1){
            visionne($id,$pseudo);
         }else{
            $bdd=getBD();
            $sql="delete from vu WHERE vu.id_film =".$id." AND vu.pseudo ='".$pseudo."'";
           $bdd->prepare($sql)->execute();
         }
         echo  '<meta http-equiv="Refresh" content="0; url=./film.php?id='.$id.'" />';
    
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


</body>
</html>