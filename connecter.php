<?php session_start();
?>
<html>
    <head>
        <link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Connecter</title>

        <?php

       if(isset($_GET['n'])){
           $n=$_GET['n'];}
       if(isset($_GET['p'])){
           $p=$_GET['p'];}
       if(isset($_GET['pseudo'])){
           $pseudo=$_GET['pseudo'];}
       if(isset($_GET['age'])){
           $age=$_GET['age'];}
       if(isset($_GET['mail'])){
           $mail=$_GET['mail'];}
           if ($_POST['mdp']!=$_POST['confmdp']){
            $ismdp=0; $mdp="";}
            else{$ismdp=1; $mdp=$_POST['mdp'];}
       include 'bd.php';
       $bdd = getBD();
       $mail = $_GET['mail'];
       $req = $bdd->prepare('SELECT * FROM clients WHERE mail = :mail');
       $req->execute(array(
        'mail' => $mail));
       $clients = $req->fetch();

       if($clients['nom']==""||$clients['prenom']==""||$clients['pseudo']==""||$clients['age']==""||$clients['mail']==""||$clients['mdp']=="") {
        ?>
        <meta http-equiv="Refresh" content="0; url=http://localhost/VictoireL/connexion.php" > 
        <?php
	}else{
	    
        
        $_SESSION['clients']=array($clients['nom'],$clients['prenom'],$clients['pseudo'],$clients['age'],$clients['mail'],$clients['mdp']);
            ?>
		    <meta http-equiv="Refresh" content="0; url=http://localhost/VictoireL/index.php" >
            <?php

        }
  ?>
    </head>
    <body>