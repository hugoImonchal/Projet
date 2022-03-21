
<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head> 
        <link rel="stylesheet" href="../styles/style.css" type="text/css" media="screen" />
        <meta http-equiv="Content-Type"content="text/html; charset=UTF-8" />
        <title>Contact</title>
        <header class="main">	
            <nav>
                <ul class="menu">
                <li>
				<a href="../index.php"> Where2Watch</a>
				</li>
                    <li>
                    <a href="../acceuil.php">Accueil</a>
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
        

        <h1 id="titre">Présentation</h1>
    
    <p>Nous avons décidé de créer un site web, qui conseil à l’utilisateur la plateforme de
        vidéo à la demande la plus adaptée à celui-ci, ainsi qu’une sélection de films/séries, en
        adéquation avec ses goûts. </p>
    <br>
    <p>
        En effet, depuis les années 2000, le streaming commence à voir le jour.
        Mais qu'est-ce que le streaming ? Les sites de vidéos à la demande permettent simplement
        de regarder des vidéos ou d'écouter de la musique sur Internet, sans avoir à télécharger de
        fichier.</p>
    <br>
    <p>
        Cependant, plus récemment, surtout avec la crise sanitaire dans laquelle nous vivons,
        beaucoup de nouvelles plateformes ont vu le jour et connu un grand essor, comme Netflix,
        Amazone vidéo, ou même Disney +. </p>
    <br>
    <p>
        Effectivement, la fermeture des cinémas et les confinements ont habitué la population à
        utiliser de plus en plus les plateformes de streaming. </p>
    <br>
    <p>
        Mais avec l'essor de toutes ces plateformes, laquelle est la plus adaptée à vous ?
        Car en effet, les sites de vidéos à la demande, malgré le fait qu’ils ont tous un très grand
        panel de choix de films et séries, il y en aura forcément un qui vous accompagnera mieux
        dans vos soirées pop cornes ! </p>
    <br>
    <p>
        Notre site a donc pour objectif de trouver à l'utilisateur la plateforme de streaming qui lui
        correspond le plus et qui répondrait à la majorité de ses critères.
    </p>
    <h1>Qui sommes-nous ?  </h1>
    
    <p> 4 étudiants de l'université Paul Valery Montpellier 3 :</p>
    
    <img src="../images/logo.jpg"/>
    <br>
    <ul>
        <li> <a href="victoire.php"> Victoire Lescroart </a></li>
        <li><a href="Hugo.php"> Hugo Monchal </a></li>
        <li><a href="Lamyae.php"> Lamyae Akhatar </a></li>
        <li><a href="walozz.php"> Walid Zeroual </a></li>
    </ul>
</body>

    </body>
</html>