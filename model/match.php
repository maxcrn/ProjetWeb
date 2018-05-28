<?php
require('model/tournoi.php');

function ajoutMatchTournoiM($idTournoi, $tourMatch, $idEquipe1, $idEquipe2, $scoreEquipe1, $scoreEquipe2, $idGagnantPartie){
	$db = dbConnect();
	$match = $db->prepare('INSERT INTO Partie(idTournoi, tourPartie, idEquipe1, idEquipe2, scoreEquipe1, scoreEquipe2, idGagnantPartie) VALUES(?,?,?,?,?,?,?)');
	$affectedLines = $match->execute(array($idTournoi, $tourMatch, $idEquipe1, $idEquipe2, $scoreEquipe1, $scoreEquipe2, $idGagnantPartie));
	return $match;
}

function getMatchsTournoi($idTournoi){
	$db = dbConnect();
	$matchs = $db->prepare('SELECT * FROM Partie WHERE idTournoi = ?');
	$matchs->execute(array($idTournoi));
	return $matchs;
}

function getEquipeMatch($idPartie){
	$db = dbConnect();
	$equipes = $db->prepare('SELECT nomEquipe FROM Partie WHERE idPartie = ?');
	$matchs->execute(array($idPartie));
}

function getNbMatch($idTournoi, $tour){
	$db = dbConnect();
	$req = $db->prepare('SELECT COUNT(*) as nbMatch FROM Partie WHERE idTournoi = ? AND tourPartie = ?');
	$req->execute(array($idTournoi, $tour));
	$nbMatch = $req->fetch();
	return $nbMatch['nbMatch'];
}

function modifMatchTournoiM($tourMatch, $idEquipe1, $idEquipe2, $scoreEquipe1, $scoreEquipe2, $idGagnantPartie, $idPartie){
	$db = dbConnect();
	$match = $db->prepare('UPDATE Partie SET tourPartie = ?, idEquipe1 = ?, idEquipe2 = ?, scoreEquipe1 = ?, scoreEquipe2 = ?, idGagnantPartie = ? WHERE idPartie = ?');
	$affectedLines = $match->execute(array($tourMatch, $idEquipe1, $idEquipe2, $scoreEquipe1, $scoreEquipe2, $idGagnantPartie, $idPartie));
	return $match;
}

function getEquipeGagnante($idPartie){
	$db = dbConnect();
	$req = $db->prepare('SELECT idGagnantPartie FROM Partie WHERE idPartie = ?');
	$req->execute(array($idPartie));
	$equipe = $req->fetch();
	
	return $equipe['idGagnantPartie'];
}

function suppMatchTournoiM($idPartie){
	$db = dbConnect();
	$req = $db->prepare("DELETE FROM Partie WHERE idPartie= ?");
	$affectedLines = $req->execute(array($idPartie));
    return $affectedLines;
}

function getIdTournoiFromPartie($idPartie){
	$db = dbConnect();
	$req = $db->prepare('SELECT idTournoi FROM Partie WHERE idPartie = ?');
	$req->execute(array($idPartie));
	$equipe = $req->fetch();
	
	return $equipe['idTournoi'];
}

function rechercheMatchTournoiM($nomEquipe,$idTournoi){
	$db = dbConnect();
	$req = $db->prepare('SELECT * FROM Partie, Equipe WHERE (idEquipe1 = idEquipe OR idEquipe2 = idEquipe) AND nomEquipe LIKE ? AND Partie.idTournoi = ?');
	$req->execute(array('%' . $nomEquipe . '%', $idTournoi));
	return $req;
}