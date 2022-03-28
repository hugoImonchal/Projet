<!DOCTYPE html>
<?php include("./php/bdd.php"); ?>
<?php session_start(); ?>
<html lang="fr">
<head>
<meta http-equiv="Content-Type"
content="text/html; charset=UTF-8" />

<link rel="stylesheet" href="styles/style.css" type="text/css" media="screen" />

<title>Noter</title>

</head>
<body>

	<?php
	if(isset($_SESSION['utili']))
	{ 
		 $pseudo= $_SESSION['pseudo'];
         $id=$_POST['id'];
         $actnote=$_POST['actnote'];
         $note=$_POST['newnote'];
         if($actnote=="Pas de note"){
             $bdd=getBD();
             $sql="INSERT INTO noter (IdFilm, pseudo, Note) VALUES (?,?,?)";
	        $bdd->prepare($sql)->execute([$id,$pseudo,$note]);
         }else{
            $bdd=getBD();
            $sql="UPDATE noter SET Note =".$note." WHERE noter.IdFilm =".$id." AND noter.pseudo ='".$pseudo."'";
           $bdd->prepare($sql)->execute();
         }
         echo  '<meta http-equiv="Refresh" content="0; url=./profil.php" />';
    
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