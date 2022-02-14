<!DOCTYPE html>
<html lang="fr">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Film</title>
</head>
<body>

<?php
$g='"';
$id= $_GET['id'];
$PDO = new PDO('mysql:host=localhost;dbname=projetstreaming;charset=utf8','root', 'root');

$rep=$PDO->query('select * from film where id='.$id);
while($ligne = $rep ->fetch(PDO::FETCH_ASSOC)){	
echo "<h1>".$ligne['titre']."</h1>";
echo "<img class='im_art' src='".$ligne['url_photo']."' alt= '{$ligne['id']}' />";
}
$rep->closeCursor();

echo "<h2>Disponibilite</h2>";
$rep=$PDO->query('select * from etre_disponible where id='.$id);
while($ligne = $rep ->fetch(PDO::FETCH_ASSOC)){	
echo "<p>Disponible sur ".$ligne[Nom_plat]." du ".$ligne[DateD]." au ".$ligne[DateF]." </p>";
}
$rep->closeCursor();

echo "<h2>Genre</h2>";
echo "<ul>";
$rep=$PDO->query('select * from etre where id='.$id);
while($ligne = $rep ->fetch(PDO::FETCH_ASSOC)){	
echo "<li>".$ligne['nom_genre']."</li>";
}
echo "</ul>";
$rep->closeCursor();

?>
<p><a href="../index.php" >Retour a l'accueil</a></p>
</body>
</html>
