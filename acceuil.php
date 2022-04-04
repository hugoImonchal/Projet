
<?php //source du code : https://www.developpez.net/forums/d1930668/php/php-base-donnees/script-php-formulaire-recherche-simple-bdd/
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
<a href="accueilfilm.php"> Recherche par film</a>
<br>
<a href="accueilgenre.php"> Recherche par genre</a>

<?php include('data.php');
	?>
	<form method='post'>
		<input type='text' placeholder='recherche par plateforme' name="recherche_plat"/>
		<input type='submit' value="Rechercher"/>
	</form>
	<br>

		<body>
			

			<?php
				$sql='select * from plateforme';

				$params=[];
				if(isset($_POST['recherche_plat'])){
					$sql.=' where Nom_plat like :Nom_plat';
	
					$params[':Nom_plat']="%".addcslashes($_POST['recherche_plat'],'_')."%";
				}
                
				$resultats=$connect->prepare($sql);
				$resultats->execute($params);
				echo '<br>';
				if($resultats->rowCount()>0){
					while($d=$resultats->fetch(PDO::FETCH_ASSOC)){
				
                        echo "<a href='plateforme.php?Nom_plat=" . $d['Nom_plat'] . "'>" .  $d['Nom_plat'] . "</a>";
						echo '<br>';
						echo   "<a href='plateforme.php?Nom_plat=".$d['Nom_plat']."'> <img class='plat' src= ".$d['logo']. " alt= 'image' >" ."<a/>";
						//echo '<br>';
  
					}
					$resultats->closeCursor();
				}
				else {echo '<tr><td colspan=4>aucun résultat trouvé</td></tr>'.
				$connect=null;}
?>
			
            </tbody>
			</table>
			</html>