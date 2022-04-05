<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../styles/style.css" type="text/css" media="screen" />
        <meta http-equiv="Content-Type"content="text/html; charset=UTF-8" />
        <title>Lamyae</title>
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
                        echo '<li> <a href="../deconnexion.php">Deconnexion </a> </li>';
                        echo '<li> <a href"../profil.php"> Profil </a> </li>';
                    }
                    else{
                    echo '<li> <a href="../connexion.php"> Connexion </a> </li> ';
                    echo '<li> <a href=../"FormulaireInscription.php"> Inscription </a> </li>';} ?>
                    
                    <li>
                    <a href="contact.php">Contact</a>
                    </li>
                    
                </ul>
            </nav>
        </header>
    </head>
    <body>
    <br>
<br>
<br>
<br>
        <h1>Lamyae</h1>
        <img src="../images/Lamyae.jpg"/></p>
    <br></br>
    Comment me contactez ? 
    <ul>
        <li>Numéro de téléphone : 0635141955</li>
        <li>Mail : lamyae.akhatar@outlook.fr</li>
        <li>Adresse : 34090 Montpellier </li>
    </ul>
</body>
<a href="contact.php">
    Retour
</a>

    </body>
</html>