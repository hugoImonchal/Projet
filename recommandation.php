<!DOCTYPE html>
<?php session_start(); ?>
<html lang="fr">
<head>
<meta http-equiv="Content-Type"
content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="styles/style.css" type="text/css" media="screen" />
<title>Profil</title>
</head>

<body>

<?php include("./php/bdd.php"); ?>
<?php 
function getfilm($id){
	$bdd = getBD();
	$rep = $bdd->query("select * from film where IdFilm=$id ");
	while ($mat =$rep->fetch()) 
	{
		$titre=$mat['Titre'];
    }
	$rep ->closeCursor();
    return $titre;
}

function getAllPseudo(){
	$bdd = getBD();
	$rep = $bdd->query("select pseudo from utilisateur");
	$array= [];
	while ($mat =$rep->fetch()) 
	{
		$array[]=$mat['pseudo'];
    }
	$rep ->closeCursor();
    return $array;

}
function getAllFilm(){
	$bdd = getBD();
	$rep = $bdd->query("select IdFilm from film");
	$array= [];
	while ($mat =$rep->fetch()) 
	{
		$array[]=$mat['IdFilm'];
    }
	$rep ->closeCursor();
    return $array;
}
function seen($id_film,$pseudo){
    $bdd = getBD();
	$rep = $bdd->query("select ifnull((select id_vu from vu where id_film=$id_film and pseudo='$pseudo'), '0') As id_vu");
	while ($mat =$rep->fetch()) 
	{
		$vu=(int)$mat['id_vu'];
    }
	$rep ->closeCursor();

	return (int)$vu;
}
function user_film_vector($pseudo){
	$bdd = getBD();
	$rep = $bdd->query("select IdFilm from film");
	$array= [];
	while ($mat =$rep->fetch()) 
	{
		$id=$mat['IdFilm'];
		$array[$id]=0;
    }
	$rep ->closeCursor();
	$rep = $bdd->query("select * from noter where pseudo='$pseudo'");
	while ($mat =$rep->fetch()) 
	{
		$id=$mat['IdFilm'];
		$note=(int)$mat['Note'];
		$array[$id]=$note;
    }
	$rep ->closeCursor();

    return $array;

}


function centre_reduit ($tableau){
	//use Phpml\Math\Statistic\Mean;
	$tab=[];
	foreach($tableau as $key => $value ){
		$ligne=$value;

	
	//calcul de la moyenne de la ligne
	$tmp=0;
	$i=0;
	foreach($ligne as $k=>$v){
		$i+=1;
		$tmp+=$v;	
	}
	$mean=$tmp/$i;

	//calcul de la sd de la ligne
	// $tmp=0;
	// foreach($ligne as $k=>$v){
	// 	$tmp+=($v-$mean)*($v-$mean);	
	// }
	// $sd=sqrt($tmp/$i);
	$sd=1;
	//centrer et reduire les valeurs de la lignes
	foreach($ligne as $k=>$v){
			$ligne[$k]=($v-$mean)/$sd;	
		}
		//ajouter la ligne au tableau retourné
		$tab[$key]=$ligne;
	}
	return $tab;
}
function similarite($tab){
	$mat=[];
	foreach($tab as $k1 => $v1 ){
		$som1=0;
		foreach($v1 as $id=>$note){
			$som1+=$note*$note;
		}

		foreach($tab as $k2 => $v2){
			$som2=0;
			$som1x2=0;
			foreach($v2 as $id=>$note){
				$som2+=$note*$note;
				$som1x2+=$v1[$id]*$note;
			}
			$mat[$k1][$k2]=$som1x2/(sqrt($som1)*sqrt($som2));

		}
		
	}
	return $mat;

}
?>

	
    <?php
	if(isset($_SESSION['utili']))
	{ 
		$pseudo=$_SESSION['pseudo'];
		$list_uti=getAllPseudo();
		var_dump($list_uti);
		// $list_film=getAllFilm();
		// var_dump($list_film);
		$u_f_vect=user_film_vector($pseudo);
		// var_dump($u_f_vect);

		//tableau pseudo X IdFilm contenant pour chaque pseudo la note du film associé.
		$tableau=[];
		foreach($list_uti as $key => $value){
			$tableau[$value]=user_film_vector($value);
		}
		//var_dump($tableau);

		//tableau simplifié avec 2 utilisateurs.
		$tab_simplifie=[];
		$tab_simplifie[$pseudo]=user_film_vector($pseudo);
		$tab_simplifie['jean']=user_film_vector('jean');
		$tableau_centre_reduit=centre_reduit ($tab_simplifie);
		//var_dump($tableau_centre_reduit);
		$simil=similarite($tableau_centre_reduit);
		var_dump($simil);

		//Determination des utilisateurs les plus proches
		$vect_user=$simil[$pseudo];
		$max=0;
		$similar_user="";
		foreach($vect_user as $key=>$value){
			if ($key!=$pseudo && $value>$max){
				$max=$value;
				$similar_user=$key;
			}
		}
		echo '<p>'.$pseudo.'</p>';
		echo '<p>Utilisateur qui vous ressemble le plus: '.$similar_user.' coef: '.$max.'</p>';
		$recom=[];
		//var_dump($tab_simplifie[$similar_user]);

		//maintenant on recommande les films que cet utilisateur a aimé.
		foreach($tab_simplifie[$similar_user] as $id=>$note){
			if($note>=4){
				if((int)seen($id,$pesudo)==0){
					$recom[$id]=$note;
				}
			}	
		}
		uasort($recom, 'compare');
		foreach($recom as $id=>$note){
			$titre=getfilm($id);
			echo $titre;
			echo "<a href='film.php?IdFilm=".$id."'>".$titre." </a>";
		}

	}
	else{echo "<p>Vous n'etes pas connecgte</p>";}
?>

</body>
</html>