<?php
session_start();



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
					echo '<li> <a href"profil.php"> Profil </a> </li>';
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
    <br>
    <br>
    <br>
    <br>
    <br>
</head>
    <body>
    <?php include('data.php');?>
	<form method='post'>
		<input type='text' placeholder='recherche' name="recherche_valeur"/>
		<input type='submit' value="Rechercher"/>
	</form>
	<table>
		<thead>
			<tr><th>Titre</th><th> Disponibilité sur platefomrme</th></tr>
		</thead>
		<tbody>
			<?php
				$sql='select * from film, etre_disponible';
				$params=[];
				if(isset($_POST['recherche_valeur'])){
					$sql.=' where Titre like :Titre';
					$params[':Titre']="%".addcslashes($_POST['recherche_valeur'],'_')."%";
				}
                
				$resultats=$connect->prepare($sql);
				$resultats->execute($params);
				if($resultats->rowCount()>0){
					while($d=$resultats->fetch(PDO::FETCH_ASSOC)){
				
                        echo "<td><a href='film.php?IdFilm=" . $d['IdFilm'] . "'>" . $d['Titre'] . "</a></td>";
                        echo '<td>' . $d['Nom_plat'] . '</td>';
                        echo "</tr>";

<<<<<<< HEAD

                    
					}
					$resultats->closeCursor();
				}
				else echo '<tr><td colspan=4>aucun résultat trouvé</td></tr>'.
				$connect=null;
			?>
            </tbody>
            
=======
    <table>
            <tr>
                <th>Titre</th>
                <th>Id Film</th>
                <th>Anne</th>
                <th>Note</th>
            </tr>
            <?php
            foreach ($filmes as $film) {
                echo "<tr>";
                echo "<td><a href='film.php?IdFilm=" . $film['IdFilm'] . "'>" . $film['Titre'] . "</a></td>";
                echo '<td>' . $film['IdFilm'] . '</td>';
                echo '<td>' . $film['annee'] . '</td>';
                echo '<td>' . $film['Note_TMDB'] . '</td>';
                echo "</tr>";
            }
            ?>
>>>>>>> 1f732f3e54864d46515ac94c5734bc6931658660
        </table>