<?php
session_start();
include 'php/bdd.php';
$bd = getBD();
$sql = "SELECT * FROM `film`";
$result = $bd->query($sql);
$filmes = $result->fetchAll(PDO::FETCH_ASSOC);


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
</head>
    <body>

    <table>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Anne</th>
                <th>Note</th>
            </tr>
            <?php
            foreach ($filmes as $film) {
                echo "<tr>";
                echo "<td><a href='film.php?IdFilm=" . $film['IdFilm'] . "'>" . $film['Titre'] . "</a></td>";
                echo '<td>' . $film['IdFilm'] . '</td>';
                echo '<td>' . $film['Annee'] . '</td>';
                echo '<td>' . $film['Note_IMBD'] . '</td>';
                echo "</tr>";
            }
            ?>
        </table>