<?php

require_once('model/match.php');
require_once('model/tournoi.php');
require_once('model/equipe.php');
require_once('model/membre.php');

function signin(){
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$pass = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
	$pseudoLibre = samePseudo($pseudo);
	$mail = htmlspecialchars($_POST['mail']);
	if($pseudoLibre->rowCount()!=0){
		http_response_code(404); // 404 car ressource non trouvée
		require('view/signinScreen.php');
	}
	else{
		$affectedLines = signinMembre($pseudo,$pass,$mail);
		if($affectedLines === false){
			http_response_code(404); // 404 car ressource non créée
			include('view/signinScreen.php');
			exit;
	    }
	    else{
	    	http_response_code(201); // 201 car créée
	    	require('view/signinOk.php');
	    }
	}
}

function login(){
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$pass = $_POST['pass'];
	$req = loginM($pseudo,$pass);
	$res = $req->fetch();
	$isPasswordCorrect = password_verify($pass, $res['passMembre']);
	$idMembre=$res['idMembre'];
	$passHash = $res['passMembre'];
	if($isPasswordCorrect){
		setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
		setcookie('id', $idMembre, time() + 365*24*3600, null, null, false, true);
		setcookie('pass', $passHash, time() + 365*24*3600, null, null, false, true);
		require('view/loginOk.php');
	}
	else{
		require('view/loginKo.php');
	}
}

function connecte(){
	$pseudo = htmlspecialchars($_COOKIE['pseudo']);
	$pass = $_COOKIE['pass'];
	$idMembre = $_COOKIE['id'];
	return isConnected($pseudo, $pass, $idMembre);
}

function isAdmin(){
	$pseudoMembre = $_COOKIE['pseudo'];
	$passMembre = $_COOKIE['pass'];
	$idMembre = $_COOKIE['id'];
	return isAdminM($pseudoMembre, $passMembre, $idMembre);
}

function deconnexion(){
	setcookie('pseudo', '');
	setcookie('pass', '');
	setcookie('id', '');
	require('view/deconnexion.php');
}

function listeMembres(){
	$listMembres=getListeMembres();
	$listAdmins=getListeAdmins();

    $membres = $listMembres->fetchAll();
    $admins = $listAdmins->fetchAll();

    require('view/listeMembres.php');
}

function listeMembresMembre(){
	$listMembres=getListeMembres();
	$listAdmins=getListeAdmins();

    $membres = $listMembres->fetchAll();
    $admins = $listAdmins->fetchAll();

    require('view/listeMembresMembre.php');
}

function setAdmin(){
	$idMembre = $_POST['idMembre'];
	$affectedLines = setAdminM($idMembre);
	if($affectedLines === false){
		http_response_code(404); // 404 car ressource non créée
		$listMembres=getListeMembres();
		$listAdmins=getListeAdmins();

	    $membres = $listMembres->fetchAll();
	    $admins = $listAdmins->fetchAll();
	    require('view/listeMembres.php');
		exit;
    }
    else{
    	http_response_code(201); // 201 car créée
    	$listMembres=getListeMembres();
		$listAdmins=getListeAdmins();

	    $membres = $listMembres->fetchAll();
	    $admins = $listAdmins->fetchAll();
	    require('view/listeMembres.php');
    }
}

function deleteMembre(){
	parse_str(file_get_contents('php://input'), $_DELETE);

	$idMembre = $_DELETE['idMembre'];
	$affectedLines = deleteMembreM($idMembre);
	if ($affectedLines === false) {
        http_response_code(404); // 404 car ressource non trouvée
		header('HTTP/1.0 404 Not Found');
		include('view/404.php');
		exit;
    }
    else{
    	$listMembres=getListeMembres();
		$listAdmins=getListeAdmins();

	    $membres = $listMembres->fetchAll();
	    $admins = $listAdmins->fetchAll();
	    require('view/listeMembres.php');
    }
}

function rechercheMembre(){
	$nomRechercheMembre = $_GET['nomRechercheMembre'];
	$listMembres = rechercheMembreM($nomRechercheMembre);
	$listAdmins=getListeAdmins();

    $membres = $listMembres->fetchAll();
    $admins = $listAdmins->fetchAll();
    if($listMembres->rowCount()==0){
		http_response_code(404); // 404 car ressource non trouvée
	}
    require('view/listeMembresRecherche.php');
}

function rechercheMembreMembre(){
	$nomRechercheMembre = $_GET['nomRechercheMembre'];
	$listMembres = rechercheMembreM($nomRechercheMembre);
	$listAdmins=getListeAdmins();

    $membres = $listMembres->fetchAll();
    $admins = $listAdmins->fetchAll();
    if($listMembres->rowCount()==0){
		http_response_code(404); // 404 car ressource non trouvée
	}
    require('view/listeMembresRechercheMembre.php');
}