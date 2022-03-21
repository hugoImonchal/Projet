<?php
include 'php/bdd.php';
$bd = getBD();
$sql = "SELECT * FROM `film`";
$result = $bd->query($sql);
$filmes = $result->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Acceuil</title>
    </head>
    <body>

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
        </table>