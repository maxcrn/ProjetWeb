<?php 

require_once('model/tournoi.php');

function samePseudo($pseudo){
	$db=dbConnect();
	$req = $db->prepare('SELECT pseudoMembre FROM Membre WHERE pseudo LIKE ?');
	$req->execute(array($pseudo));
	return $req;
}

function signinMembre($pseudo,$pass, $mail){
	$db = dbConnect();
    $membre = $db->prepare('INSERT INTO Membre(pseudoMembre, passMembre, mailMembre) VALUES(?, ?, ?)');
    $affectedLines = $membre->execute(array($pseudo, $pass, $mail));
    return $affectedLines;
}

function loginM($pseudo,$pass){
	$db = dbConnect();
	$req = $db->prepare('SELECT idMembre, passMembre FROM Membre WHERE pseudoMembre = ?');
	$req->execute(array($pseudo));
	return $req;
}

function isConnected($pseudo, $pass, $idMembre){
	$db = dbConnect();
	$req = $db->prepare('SELECT * FROM Membre WHERE pseudoMembre = ? AND idMembre = ? AND passMembre = ?');
	$req->execute(array($pseudo, $idMembre, $pass));
	if($req->rowCount() > 0){
		return true;
	}
	else{
		return false;
	}
}

function isAdminM($pseudoMembre, $passMembre, $idMembre){
	$db = dbConnect();
	if (isConnected($pseudoMembre, $passMembre, $idMembre)){
		$req = $db->prepare('SELECT * FROM Admin WHERE idMembre = ?');
		$req->execute(array($idMembre));
		if($req->rowCount() > 0){
			return true;
		}
		else{
			return false;
		}
	}
}

function getListeMembres(){
	$db = dbConnect();
	$req = $db->prepare('SELECT * FROM Membre');
	$req->execute();
	return $req;
}

function getListeAdmins(){
	$db = dbConnect();
	$req = $db->prepare('SELECT * FROM Admin');
	$req->execute();
	return $req;
}

function setAdminM($idMembre){
	$db = dbConnect();
    $membre = $db->prepare('INSERT INTO Admin(idMembre) VALUES(?)');
    $affectedLines = $membre->execute(array($idMembre));
    return $affectedLines;
}

function deleteMembreM($idMembre){
	$db = dbConnect();
	$membre = $db->prepare("DELETE FROM Membre WHERE idMembre= ?");
	$affectedLines = $membre->execute(array($idMembre));
    return $affectedLines;
}

function rechercheMembreM($nomRechercheMembre){
	$db = dbConnect();
	$req = $db->prepare('SELECT * FROM Membre WHERE pseudoMembre LIKE ?');
	$req->execute(array('%' . $nomRechercheMembre . '%'));
	return $req;
}