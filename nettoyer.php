<!-- Ce fichier permet de supprimer la table plateforme de la bd en supprimant une plateforme si aucun 
film n'est dispo dessus -->
<!DOCTYPE html>
<html lang="fr">
<?php
include('php/bdd.php');
//fonction qui prend en parametre un nom de plateforme et qui l'efface de la bd
function del_plat($nom){
    $bdd=getBD();
    $rep = $bdd->prepare("DELETE FROM plateforme WHERE plateforme.Nom_plat = '$nom'");
    $rep->execute();
    $rep ->closeCursor();
}
// //fonction qui prend en parametre un nom de plateforme et qui l'efface de la bd si aucun film ne s'y trouve
function delit_plat_if($nom){
    $bdd=getBD();
	$rep = $bdd->prepare("SELECT Nom_plat FROM etre_disponible WHERE Nom_plat=$nom");
	$rep->execute();
	if($rep->rowCount()==0){
        del_plat($nom);
    }
    $rep ->closeCursor();
}

// $bdd=getBD();
// $rep = $bdd->prepare("SELECT  Nom_plat FROM plateforme");
// $rep->execute();
//  while ($mat =$rep->fetch()) 
//  	{
//  		$nom=$mat['Nom_plat'];
//          delit_plat_if($nom);
//     }
// $rep ->closeCursor();

?>
</html>