<html lang="fr">

<head>
	<title>api</title>

<?php
// Code d'appelle aux api inspiré du code snippet disponible sur https://imdb-api.com/API
session_start();
include('php/bdd.php');

//fonction permettant de remplir la table genre
function fillGenre(){
	$curl = curl_init();
 
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.themoviedb.org/3/genre/movie/list?api_key=afe11092f8476b76ad23859a7747a304&language=fr-FR',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYPEER => false
));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	curl_close($curl);
	
	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		$r=json_decode($response,true);
		//print_r($r["genres"]);

		foreach (range(0,count($r["genres"])-1) as $i) {
			$id=$r["genres"][$i]["id"];
			$genre=$r["genres"][$i]["name"];
			//echo "<p>{$id} : {$genre} </p>";
			$bdd= getBD();
			$sql="INSERT INTO genre (Nom_genre, id_genre) VALUES (?,?)";
			$bdd->prepare($sql)->execute([$genre,$id]);
			
		}
	}
}
//fillGenre();

//Fonction permettant de remplir la table plateforme
function fillPlat(){
	$curl = curl_init();
 
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.themoviedb.org/3/watch/providers/movie?api_key=afe11092f8476b76ad23859a7747a304&language=fr-FR',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYPEER => false
));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	curl_close($curl);
	
	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		$r=json_decode($response,true);
		//print_r($r["results"]);
		foreach (range(0,count($r["results"])-1) as $i) {
			$id=$r["results"][$i]["provider_id"];
			$nom=$r["results"][$i]["provider_name"];
			$logo="https://image.tmdb.org/t/p/w185".$r['results'][$i]["logo_path"];
			//echo "<p>{$id} : {$nom} </p>";
			$bdd= getBD();
			$sql="INSERT INTO plateforme (Nom_plat, id_plat,logo) VALUES (?,?,?)";
			$bdd->prepare($sql)->execute([$nom,$id,$logo]);
			
		}
	}

}
//fillPlat();



function disponible($id){
	$curl = curl_init();
 
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.themoviedb.org/3/movie/'.$id.'/watch/providers?api_key=afe11092f8476b76ad23859a7747a304',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYPEER => false
));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	curl_close($curl);
	
	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		$r=json_decode($response,true);
		//print_r($r);
		$ID=$r['id'];
		//insertion dans la table etre_disponible qui relie film et genre
		foreach (range(0,count($r["results"]["FR"]["flatrate"])-1) as $i) {
			$nom=$r["results"]["FR"]["flatrate"][$i]["provider_name"];
			//echo $nom.$ID;
			$bdd= getBD();
			$sql="INSERT INTO etre_disponible (IdFilm, Nom_plat) VALUES (?,?)";
			$bdd->prepare($sql)->execute([$ID,$nom]);	
		}

	}

}
//disponible(508);


//fonction qui permet d'enregistrer toutes les informations d'un film
function enregistrement_film($id){

	$curl = curl_init();
 
curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.themoviedb.org/3/movie/'.$id.'?api_key=afe11092f8476b76ad23859a7747a304&language=fr-FR',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYPEER => false
));
	
	$response = curl_exec($curl);
	$err = curl_error($curl);
	
	curl_close($curl);
	
	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		$r=json_decode($response,true);
		// print_r($r);
		$titre=$r['original_title'];
		$date=$r['release_date'];
		$descr=$r['overview'];
		$note=$r['vote_average'];
		$ID=$r['id'];
		$img="https://image.tmdb.org/t/p/w185/".$r['backdrop_path'];
		//echo "<p>".$titre."</p>";
		$bdd= getBD();
		$sql="INSERT INTO film (IdFilm,Titre,annee,Note_TMDB,description,Affiche) VALUES (?,?,?,?,?,?)";
		$bdd->prepare($sql)->execute([$ID,$titre,$date,$note,$descr,$img]);
		//insertion dans la table etre qui relie film et genre
		foreach (range(0,count($r["genres"])-1) as $i) {
			$genre=$r["genres"][$i]["name"];
			$bdd= getBD();
			$sql="INSERT INTO etre (idFilm, Nom_genre) VALUES (?,?)";
			$bdd->prepare($sql)->execute([$ID,$genre]);	
		}
		disponible($ID);

	}

}
//enregistrement_film(509);


// Definition de $_SESSION['data'] qui contient la liste des id_TMDB des films
/*
if(!isset($_SESSION['data'])){
	//Recuperation des id_TMDB dans le csv
	$filename = '../data/TMDB_10000_Popular_Movies.csv';
	$data = [];
	
	// open the file
	$f = fopen($filename, 'r');
	
	if ($f === false) {
		die('Cannot open the file ' . $filename);
	}
	
	// read each line in CSV file at a time
	while (($row = fgetcsv($f)) !== false) {
		$data[] = $row[0];	
	}
	// close the file
	fclose($f);
	$_SESSION['data']=$data;
}else{$data=$_SESSION['data'];}

if(!isset($_SESSION['var'])){
	$_SESSION['var']=1;
}	
*/

//parcourir la liste des id et recolter les informations sur chaque film.
/*
$var=$_SESSION['var'];
$var2=$var+20;
for ($i = $var; $i <= $var2; $i++) {
    $id_film=$data[$i];
	enregistrement_film($id_film);
	//echo "<p> Enregistrement effectue:{$id_film}</p>";
	sleep(0.2);
}
sleep(1);
$_SESSION['var']=$var2+1;
//header("refresh: 5"); //refresh la page toutes les 5sec 
*/
?>
</head>

<body>
	<p>Fuyez, pauvre fou ... </p>
	<?php
	//echo "<p> Ids actuels: ".$var." a ".$var2."</p>";
	?>
</body>

</html>
