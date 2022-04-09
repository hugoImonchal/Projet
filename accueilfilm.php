<!-- source du code : https://www.developpez.net/forums/d1930668/php/php-base-donnees/script-php-formulaire-recherche-simple-bdd/ 
Cette page est connécté à la BD et resence 50 films disponible, pour acceder a la totaliter des films
en bas de la page en accedant à touslesfilms.php
L'utilisateur peut faire des recherches par titre de film-->
<?php
session_start();
ini_set('display_errors', 'on');


?>

<!DOCTYPE html>

<html>
<head>
<link rel="stylesheet" href="styles/style.css" type="text/css" media="screen" />
        <meta http-equiv="Content-Type"content="text/html; charset=UTF-8" />
        <title>Accueil</title>
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
				echo '<li> <a href="FormulaireInscription.php"> Inscription </a> </li>';} 
				
				?>
				
				<li>
				<a href="contact/contact.php">Contact</a>
				</li>
				
			</ul>
		</nav>
	</header>
    </head>
    <br>
    <br>
    <br>
    <br>
    <br>
</head>
    <body>
	<a href="acceuil.php"> Recheche par plateformes</a><br>
<a href="accueilgenre.php"> Recherche par genre</a> <br>

	<?php include('data.php');
	?>
	<form method='post'>
		<input type='text' placeholder='recherche par titre' name="recherche_valeur"/>
		<input type='submit' value="Rechercher"/>
	</form>
	<br>

		<body>
			

			<?php
				$sql='select * from film LIMIT 50';

				$params=[];
				if(isset($_POST['recherche_valeur'])){
					$sql.=' where Titre like :Titre';
	
					$params[':Titre']="%".addcslashes($_POST['recherche_valeur'],'_')."%";
				}
                
				$resultats=$connect->prepare($sql);
				$resultats->execute($params);
				echo '<br>';
				if($resultats->rowCount()>0){
					while($d=$resultats->fetch(PDO::FETCH_ASSOC)){
				
                        echo "<a class='film' href='film.php?IdFilm=" . $d['IdFilm'] . "'>" . $d['Titre'] . "</a>";
						echo '<br>';
						echo   "<a href='film.php?IdFilm=".$d['IdFilm']."'> <img src= ".$d['Affiche']. " alt= 'image' >" ."<a/>";
						//echo '<br>';
  
					}
					$resultats->closeCursor();
				}
				else {echo '<tr><td colspan=4>aucun résultat trouvé</td></tr>'.
				$connect=null;}
?>
<p>
<a href="touslesfilms.php"> Voir tous les films </a></p>
			
            </tbody>
			</table>
			</html>