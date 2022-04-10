<?php
function getBD(){
$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8','root', ''); //Pour MAMP, 'root', '' si vous avez bien importé la bd sous le nom 'projet'
return $bdd;
}
?>