<?php
//source du code : https://www.developpez.net/forums/d1930668/php/php-base-donnees/script-php-formulaire-recherche-simple-bdd/ 
//connection_database.php
 
$connect = new PDO('mysql:host=localhost;dbname=projet', 'root', 'root',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
  ]);