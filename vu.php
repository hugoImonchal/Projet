<!-- Cette page permet d'ajouter ou retirer un film à sa liste de film vu  -->
<!DOCTYPE html>
<?php include("php/bdd.php");?>
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
//Cette fonction permet d'ajouter un film dans la table vu
//Prend en parametre un identifiant de film et un pseudo
    function visionne($id,$pseudo){
        $bdd=getBD();
        $sql="INSERT INTO vu (id_film, pseudo) VALUES (?,?)";
       $bdd->prepare($sql)->execute([$id,$pseudo]);

    }

//Cette fonction prend en parametre un identifiant de film et un pseudo d'utiliateur et retourne 
//l'identifiant id_vu de la ligne dans la table vu ou apparaissent le pseudo et l'identifiant
function getIdvu($id_film,$pseudo){
	$bdd = getBD();
	$rep = $bdd->query("select id_vu from vu where id_film=$id_film and pseudo='$pseudo'");
	$vu=0;
	while ($mat =$rep->fetch()) 
	{
		$vu=$mat['id_vu'];
	}
	return $vu;
}

//Cette fonction permet de supprimer un film dans la table vu
//Prend en parametre un identifiant de film et un pseudo
	function delVu($id_film,$pseudo){
		$id_vu= getIdvu($id_film,$pseudo);
		$bdd=getBD();
		$sql="DELETE from vu WHERE vu.id_vu=".$id_vu;
		$bdd->prepare($sql)->execute();
	}
	
//Cette fonction prend en parametre un identifiant de film et un pseudo d'utiliateur et retourne la nombre
// de ligne dans la table vu ou apparaissent le pseudo et l'identifiant
//en pratique cette fonction et utilisée pour savoir quel film a vu l'utilisateur (en théorie retourne 0 ou 1)
//(utilisation de cette fonction pour correction d'un bug qui ecrivais une nouvelle ligne dans la table vu lorsque l'utilisateur modifiais la note)
	function getvu($id_film,$pseudo){
		$bdd = getBD();
		$rep = $bdd->query("select id_vu from vu where id_film=$id_film and pseudo='$pseudo'");
		(int)$vu=0;
		while ($mat =$rep->fetch()) 
		{
			$vu+=1;
		}
		return (int)$vu;
	}
	if(isset($_SESSION['utili']))
	{ 
		 $pseudo= $_SESSION['pseudo'];
         $id=$_GET['id'];
		 $vu=getvu($id,$pseudo);
		 $request=$_GET['request'];
		 if($vu==0){
			visionne($id,$pseudo);
		}
        else{
			delVu($id,$pseudo);
			//On supprime egalement la note
			$bdd=getBD();
        	$sql="delete from noter WHERE noter.IdFilm =".$id." AND noter.pseudo ='".$pseudo."'";
        	$bdd->prepare($sql)->execute();
         }
         echo  '<meta http-equiv="Refresh" content="0; url=./film.php?IdFilm='.$id.'" />';
    
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