<?php 

require_once('model/tournoi.php');
require_once('model/equipe.php');

function ajoutEquipeTournoi(){
	$idTournoi = htmlspecialchars($_POST['tournoi']);
	$nomEquipe = htmlspecialchars($_POST['nomEquipeAjout']);
	$affectedLines = ajoutEquipeTournoiM($idTournoi, $nomEquipe);
	if ($affectedLines === false) {
        http_response_code(404); // 404 car ressource non créée
		header('HTTP/1.0 404 Not Found');
		include('view/404.php');
		exit;
    }
    else{
    	http_response_code(201); // 201 car créée
    	$equipesTournoi = getEquipesTournoi($idTournoi);
    	require('view/equipesTournoi.php');
    }
}

function supprimerEquipeTournoi(){
	parse_str(file_get_contents('php://input'), $_DELETE);
	$idTournoi = $_DELETE['tournoi'];
	$idEquipe =  $_DELETE['equipe'];
	$nbMatchs = getNbMatchEquipe($idEquipe);

	if($nbMatchs == 0){
		$affectedLines = supprimerEquipeTournoiM($idTournoi, $idEquipe);
		if ($affectedLines === false) {
	        http_response_code(404); // 404 car ressource non trouvée
			header('HTTP/1.0 404 Not Found');
			include('view/404.php');
			exit;
	    }
	    else{
	    	$equipesTournoi = getEquipesTournoi($idTournoi);
	    	require('view/equipesTournoi.php');
	    }
	}
	else{
		require('view/SuppEquipeMatch.php');
	}
}

function rechercheEquipeTournoi(){
	$nomEquipe = $_GET['nomRechercheEquipeTournoi'];
	$idTournoi = $_GET['idTournoi'];
	$equipes = rechercheEquipeTournoiM($nomEquipe, $idTournoi);
	if($equipes->rowCount()==0){
		http_response_code(404); // 404 car ressource non trouvée
	}
	require("view/rechercheEquipeTournoi.php");
}

function rechercheEquipeTournoiMembre(){
	$nomEquipe = $_GET['nomRechercheEquipeTournoi'];
	$idTournoi = $_GET['idTournoi'];
	$equipes = rechercheEquipeTournoiM($nomEquipe, $idTournoi);
	if($equipes->rowCount()==0){
		http_response_code(404); // 404 car ressource non trouvée
	}
	require("view/rechercheEquipeTournoiMembre.php");
}

function modifEquipeTournoi(){
	parse_str(file_get_contents('php://input'), $_PUT);
	$idTournoi = htmlspecialchars($_PUT['tournoi']);
	$idEquipe =  htmlspecialchars($_PUT['equipe']);
	$nomEquipe = htmlspecialchars($_PUT['nomEquipe']);
	$affectedLines = modifEquipeTournoiM($idTournoi, $idEquipe, $nomEquipe);

	if ($affectedLines === false) {
        http_response_code(404); // 404 car ressource non trouvée
		header('HTTP/1.0 404 Not Found');
		include('view/404.php');
		exit;
    }
    else{
    	$equipesTournoi = getEquipesTournoi($idTournoi);
    	require('view/equipesTournoi.php');
    }
}
