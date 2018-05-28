<?php

function dbConnect(){
	$url = getenv('JAWSDB_URL');
	$dbparts = parse_url($url);

	$hostname = $dbparts['host'];
	$username = $dbparts['user'];
	$password = $dbparts['pass'];
	$database = ltrim($dbparts['path'],'/');

	$conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
	return $conn;

	//$db = new PDO('mysql:host=localhost;dbname=projetTest;charset=utf8', 'maxime', 'maxime');
	//return $db;
}

function getTournois(){
	$db = dbConnect();
	$req = $db->query('SELECT * FROM Tournoi');
	return $req;
}

function getNbEquipesTournoi($idTournoi){
	$db=dbConnect();
	$req = $db->prepare('SELECT nbEquipesTournoi FROM Tournoi WHERE idTournoi = ?');
	$req->execute(array($idTournoi));
	$tournoi = $req->fetch();
	return $tournoi['nbEquipesTournoi'];
}

function ajoutTournoiM($nbEquipes, $nom, $pays){
	$db = dbConnect();
    $tournoi = $db->prepare('INSERT INTO Tournoi(nomTournoi, lieuTournoi, nbEquipesTournoi) VALUES(?, ?, ?)');
    $affectedLines = $tournoi->execute(array($nom, $pays, $nbEquipes));
    return $affectedLines;
}

function rechercheTournoiM($nomTournoi){
	$db = dbConnect();
	$tournois = $db->prepare("SELECT * FROM Tournoi WHERE nomTournoi LIKE ?");
	$tournois->execute(array('%' . $nomTournoi . '%'));
	return $tournois;
}

function supprimerTournoiM($idTournoi){
	$db = dbConnect();
	$tournoi = $db->prepare("DELETE FROM Tournoi WHERE idTournoi= ?");
	$affectedLines = $tournoi->execute(array($idTournoi));
    return $affectedLines;
}

function modifTournoiM($idTournoi, $nbEquipesTournoi, $nomTournoi, $paysTournoi){
	$db = dbConnect();
	$equipes = getEquipesTournoi($idTournoi);
	$nbEquipesMini = 0;
	while($equipe=$equipes->fetch()){
		$nbEquipesMini = $nbEquipesMini+1;
	}
	if($nbEquipesMini>$nbEquipesTournoi){
		include("view/modifTournoiImpossible.php");
		exit;
	}
	$req = $db->prepare("UPDATE Tournoi SET nomTournoi = :nom, lieuTournoi = :lieu, nbEquipesTournoi = :nbEquipes WHERE idTournoi = '$idTournoi'");
    $affectedLines = $req->execute(array(
    	'nom' => $nomTournoi,
    	'lieu' => $paysTournoi,
    	'nbEquipes' => $nbEquipesTournoi));
    return $affectedLines;
}

