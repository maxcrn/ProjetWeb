<?php

require_once('model/tournoi.php');

function listTournois(){
	$tournois = getTournois();
	if(!$tournois){
		http_response_code(404); // 404 car ressource non trouvée
		header('HTTP/1.0 404 Not Found');
		include('view/404.php');
		exit;
	}
	require('view/homeView.php');
}

function listTournoisMembre(){
	$tournois = getTournois();
	if(!$tournois){
		http_response_code(404); // 404 car ressource non trouvée
		header('HTTP/1.0 404 Not Found');
		include('view/404.php');
		exit;
	}
	require('view/listeTournoiMembre.php');
}

function ajoutTournoi(){
	$nbEquipesTournoi = htmlspecialchars($_POST['nbEquipesTournoi']);
	$nomTournoi = htmlspecialchars($_POST['nomTournoi']);
	$paysTournoi = htmlspecialchars($_POST['paysTournoi']);
	$affectedLines = ajoutTournoiM($nbEquipesTournoi, $nomTournoi, $paysTournoi);

	if ($affectedLines === false) {
        http_response_code(404); // 404 car ressource non créée
		header('HTTP/1.0 404 Not Found');
		include('view/404.php');
		exit;
    }
    else{
    	http_response_code(201); // 201 car créée
    	$tournois = getTournois();
    	require('view/homeView.php');
    }
}

function supprimerTournoi(){
	parse_str(file_get_contents('php://input'), $_DELETE);
	$idTournoi = $_DELETE['tournoi'];
	$affectedLines = supprimerTournoiM($idTournoi);
	if ($affectedLines === false) {
        http_response_code(404); // 404 car ressource non trouvée
		header('HTTP/1.0 404 Not Found');
		include('view/404.php');
		exit;
    }
    else{
    	$tournois = getTournois();
    	require('view/homeView.php');
    }
}

function gererTournoi(){
	$idTournoi = $_GET['tournoi'];
	$equipesTournoi = getEquipesTournoi($idTournoi);
	if(!$equipesTournoi){
		http_response_code(404); // 404 car ressource non trouvée
		header('HTTP/1.0 404 Not Found');
		include('view/404.php');
		exit;
	}
	require('view/equipesTournoi.php');
}

function listeEquipesTournoiMembre(){
	$idTournoi = $_GET['tournoi'];
	$equipesTournoi = getEquipesTournoi($idTournoi);
	if(!$equipesTournoi){
		http_response_code(404); // 404 car ressource non trouvée
		header('HTTP/1.0 404 Not Found');
		include('view/404.php');
		exit;
	}
	require('view/equipesTournoiMembre.php');
}

function modifTournoi(){
	parse_str(file_get_contents('php://input'), $_PUT);
	$idTournoi = htmlspecialchars($_PUT['idTournoi']);
	$nbEquipesTournoi = htmlspecialchars($_PUT['nbEquipesTournoi']);
	$nomTournoi = htmlspecialchars($_PUT['nomTournoi']);
	$paysTournoi = htmlspecialchars($_PUT['paysTournoi']);
	$affectedLines = modifTournoiM($idTournoi, $nbEquipesTournoi, $nomTournoi, $paysTournoi);

	if ($affectedLines === false) {
        http_response_code(404); // 404 car ressource non créée
		header('HTTP/1.0 404 Not Found');
		include('view/404.php');
		exit;
    }
    else{
    	$tournois = getTournois();
    	require('view/homeView.php');
    }
}

function rechercheTournoi(){
	echo 'coucou Contro ';
	$nomTournoi = $_GET['nomRechercheTournoi'];
	$tournois = rechercheTournoiM($nomTournoi);
	if($tournois->rowCount()==0){
		http_response_code(404); // 404 car ressource non trouvée
	}
	require("view/rechercheTournoi.php");
}

function rechercheTournoiMembre(){
	$nomTournoi = $_GET['nomRechercheTournoi'];
	$tournois = rechercheTournoiM($nomTournoi);
	if($tournois->rowCount()==0){
		http_response_code(404); // 404 car ressource non trouvée
	}
	require("view/rechercheTournoiMembre.php");
}


?>