<?php
include 'php/bdd.php';
$bdd = getBD();
$id = $_GET['id'];
$req = $bdd->prepare('SELECT * FROM film WHERE id = :id');
$req->execute(array(
 'id' => $id));
$article = $req->fetch();
?>
<!doctype html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Article</title>
    <link rel="stylesheet" href="styleindexx.css">
</head>
<body class="film">
<a href="indexx.php">Retour à l'accueil</a>
<?php
echo '<h1>' . $film['titre'] . '</h1>';
echo '<ul>';
foreach (explode(',', $film['annee']) as $annee) {
    echo '<li>' . $annee . '</li>';
}
echo '</ul>';
echo '<div class="image"><img src="/image/' . $film['affiche'] . '" alt="' . $film['titre'] . '"></div>';


?>
</body>
</html>