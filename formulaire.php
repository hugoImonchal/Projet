<html>
    <head>
        <title>Formulaire</title>
</head>
<body>
    <?php
if($_GET['n']!="" && $_GET['p']!="" && ($_GET['pseudo']!="" && $_GET['mail']!=""&& $_GET['mdp']!="" ) {
    echo $_GET['n'];
    echo '<BR>';
    echo $_GET['p'];
    echo $_GET['pseudo'];
    echo '<BR>';
    echo $_GET['mail'];
    echo '<BR>';
    echo $_GET['mdp'];
    }
    else{
    echo "Au moins un champ n’a pas été saisi";
    }
echo $_GET['age'];
echo '<BR>';

?>
</body>
</html>