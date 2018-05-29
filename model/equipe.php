<?php 

require_once('model/tournoi.php');

function getEquipesTournoi($idTournoi){
	$db = dbConnect();
    $req = $db->prepare("SELECT * FROM Equipe WHERE idTournoi= ?");
    $req->execute(array($idTournoi));
    return $req;
}

function ajoutEquipeTournoiM($idTournoi, $nomEquipe){
	$db = dbConnect();
	$tournoi = $db->prepare('INSERT INTO Equipe(nomEquipe, idTournoi) VALUES(?, ?)');
    $affectedLines = $tournoi->execute(array($nomEquipe, $idTournoi));
    return $affectedLines;
}

function supprimerEquipeTournoiM($idTournoi, $idEquipe){
	$db = dbConnect();
	$tournoi = $db->prepare("DELETE FROM Equipe WHERE idEquipe= ? AND idTournoi= ?");
	$affectedLines = $tournoi->execute(array($idEquipe, $idTournoi));
    return $affectedLines;
}

function rechercheEquipeTournoiM($nomEquipe, $idTournoi){
	$db = dbConnect();
	echo 'coucou Model ';
	$equipes = $db->prepare("SELECT * FROM Equipe WHERE nomEquipe LIKE ? AND idTournoi = ?");
	$equipes->execute(array('%' . $nomEquipe . '%', $idTournoi));
	return $equipes;
}

function modifEquipeTournoiM($idTournoi, $idEquipe, $nomEquipe){
	$db = dbConnect();
	$req = $db->prepare("UPDATE Equipe SET nomEquipe = :nom WHERE idTournoi = '$idTournoi' AND idEquipe = '$idEquipe'");
    $affectedLines = $req->execute(array('nom' => $nomEquipe));
    return $affectedLines;
}

function getNomEquipeById($idEquipe){
	$db = dbConnect();
	$req = $db->prepare('SELECT nomEquipe FROM Equipe WHERE idEquipe = ?');
	$req->execute(array($idEquipe));
	$equipe = $req->fetch();
	return $equipe['nomEquipe'];
}

function setEquipeDisqualif($idEquipe){
	$db = dbConnect();
	$req = $db->prepare("UPDATE Equipe SET qualifEquipe = 0 WHERE idEquipe = ?");
	$req-> execute(array($idEquipe));
	return $req;
}

function setEquipeQualif($idEquipe){
	$db = dbConnect();
	$req = $db->prepare("UPDATE Equipe SET qualifEquipe = 1 WHERE idEquipe = ?");
	$req-> execute(array($idEquipe));
	return $req;
}

function getNbMatchEquipe($idEquipe){
	$db = dbConnect();
	$req = $db->prepare('SELECT * FROM Equipe WHERE idEquipe = ?');
	$req->execute(array($idEquipe));
	$equipe = $req->fetch();
	return $equipe['nbMatchJoue'];
}

function augmentMatchJoueEquipe($idEquipe){
	$db = dbConnect();
	$req = $db->prepare("UPDATE Equipe SET nbMatchJoue = nbMatchJoue + 1 WHERE idEquipe = ?");
	$req-> execute(array($idEquipe));
	return $req;
}

function diminMatchJoueEquipe($idEquipe){
	$db = dbConnect();
	$req = $db->prepare("UPDATE Equipe SET nbMatchJoue = nbMatchJoue - 1 WHERE idEquipe = ?");
	$req-> execute(array($idEquipe));
	return $req;
}