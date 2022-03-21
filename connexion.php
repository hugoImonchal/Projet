<!DOCTYPE html>
<html lang="fr">
<head>
<link rel="stylesheet" href="styles/stylearticles.css" type="text/css" media="screen" />

<meta http-equiv="Content-Type"
content="text/html; charset=UTF-8" />
<title>Connexion</title>
</head>


<body>
<?php include("php/bdd.php"); ?>

<center>
<form action="connecter.php" method="post" autocomplete="off">

<p>
Pseudo:
<input type="text" name="pseudo" value=""/>
</p>

<p>
Mot de passe :
<input type="password" name="mdp" value=""/>
</p>

<p>
<input type="submit" value="Se connecter">
</p>

</center>


<h2><a href="FormulaireInscription.php" target="_blank">S'inscrire </a></h2>

</body>
</html>