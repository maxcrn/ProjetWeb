<?php

require_once('model/match.php');
require_once('model/tournoi.php');
require_once('model/equipe.php');

function creaMatchTournoi(){
	$idTournoi = $_GET['tournoi'];
	$equipes1=getEquipesTournoi($idTournoi);
	$equipes2=getEquipesTournoi($idTournoi);
	$nbEquipes = getNbEquipesTournoi($idTournoi);

	$listEquipesTournoi = getEquipesTournoi($idTournoi);
    $equipesTournoi = $listEquipesTournoi->fetchAll();

    $listMatchsTournoi = getMatchsTournoi($idTournoi);
    $matchsTournoi = $listMatchsTournoi->fetchAll();

    $nbMatch16 = getNbMatch($idTournoi,16);
    $nbMatch8 = getNbMatch($idTournoi,8);
    $nbMatch4 = getNbMatch($idTournoi,4);
    $nbMatch2 = getNbMatch($idTournoi,2);
    $nbMatch1 = getNbMatch($idTournoi,1);
	include("view/matchTournoi.php");
}

function listeMatchTournoi(){
	$idTournoi = $_GET['tournoi'];
	$listEquipesTournoi = getEquipesTournoi($idTournoi);
    $equipesTournoi = $listEquipesTournoi->fetchAll();

    $listMatchsTournoi = getMatchsTournoi($idTournoi);
    $matchsTournoi = $listMatchsTournoi->fetchAll();

    require('view/listeMatchTournoiMembre.php');
}

function ajoutMatchTournoi(){
	$idTournoi = htmlspecialchars($_POST['idTournoi']);
	$tourMatch = htmlspecialchars($_POST['tourMatch']);
	$idEquipe1 = htmlspecialchars($_POST['idEquipe1']);
	$idEquipe2 = htmlspecialchars($_POST['idEquipe2']);
	$scoreEquipe1 = htmlspecialchars($_POST['scoreEquipe1']);
	$scoreEquipe2 = htmlspecialchars($_POST['scoreEquipe2']);
	$nbMatchJoue1 = getNbMatchEquipe($idEquipe1);
	$nbMatchJoue2 = getNbMatchEquipe($idEquipe2);
	
	if($scoreEquipe1 == $scoreEquipe2 or $idEquipe1 == $idEquipe2 or $nbMatchJoue1 != $nbMatchJoue2){
		$equipes1=getEquipesTournoi($idTournoi);
		$equipes2=getEquipesTournoi($idTournoi);
		$nbEquipes = getNbEquipesTournoi($idTournoi);
		$nbMatch16 = getNbMatch($idTournoi,16);
	    $nbMatch8 = getNbMatch($idTournoi,8);
	    $nbMatch4 = getNbMatch($idTournoi,4);
	    $nbMatch2 = getNbMatch($idTournoi,2);
	    $nbMatch1 = getNbMatch($idTournoi,1);
	    $listEquipesTournoi = getEquipesTournoi($idTournoi);
    	$equipesTournoi = $listEquipesTournoi->fetchAll();
    	$listMatchsTournoi = getMatchsTournoi($idTournoi);
    	$matchsTournoi = $listMatchsTournoi->fetchAll();
    	$nbEquipes = getNbEquipesTournoi($idTournoi);
    	http_response_code(404); // 404 car ressource non créée
    	if($scoreEquipe1 == $scoreEquipe2){
    		require("view/matchTournoiEgalite.php");
    	}
		else if($idEquipe1 == $idEquipe2){
			require("view/matchTournoiMemeEquipe.php");
		}
		else if($nbMatchJoue1 != $nbMatchJoue2){
			require("view/matchTournoiMauvaisTour.php");
		}
		exit;
	}
	if($scoreEquipe1 > $scoreEquipe2){
		$idGagnantPartie = $idEquipe1;
		setEquipeDisqualif($idEquipe2);
	}
	else if($scoreEquipe1 < $scoreEquipe2){
		$idGagnantPartie = $idEquipe2;
		setEquipeDisqualif($idEquipe1);
	}
	augmentMatchJoueEquipe($idEquipe1); //Augmentation du nb de matchs joués
	augmentMatchJoueEquipe($idEquipe2);
	$affectedLines = ajoutMatchTournoiM($idTournoi, $tourMatch, $idEquipe1, $idEquipe2, $scoreEquipe1, $scoreEquipe2, $idGagnantPartie);
	$nbMatch16 = getNbMatch($idTournoi,16);
    $nbMatch8 = getNbMatch($idTournoi,8);
    $nbMatch4 = getNbMatch($idTournoi,4);
    $nbMatch2 = getNbMatch($idTournoi,2);
    $nbMatch1 = getNbMatch($idTournoi,1);
	if ($affectedLines === false) {
        http_response_code(404); // 404 car ressource non créée
		header('HTTP/1.0 404 Not Found');
		include('view/404.php');
		exit;
    }
    else{
    	http_response_code(201); // 201 car créée
    	$equipes1=getEquipesTournoi($idTournoi);
		$equipes2=getEquipesTournoi($idTournoi);
    	$listEquipesTournoi = getEquipesTournoi($idTournoi);
    	$equipesTournoi = $listEquipesTournoi->fetchAll();
    	$listMatchsTournoi = getMatchsTournoi($idTournoi);
    	$matchsTournoi = $listMatchsTournoi->fetchAll();
    	$nbEquipes = getNbEquipesTournoi($idTournoi);
    	require('view/matchTournoi.php');
    }
}

function viewModifMatchTournoi(){
	$idTournoi = $_GET['tournoi'];
	$idEquipe1 = $_GET['idEquipe1'];
	$idEquipe2 = $_GET['idEquipe2'];
	$idPartie = $_GET['idMatch'];

	setEquipeQualif($idEquipe1); //Remise à zéro de la variable gérant le fait qu'une équipe soit encore qualifiée ou non
	setEquipeQualif($idEquipe2);

	$equipes1=getEquipesTournoi($idTournoi);
	$equipes2=getEquipesTournoi($idTournoi);
	$nbEquipes = getNbEquipesTournoi($idTournoi);

	$listEquipesTournoi = getEquipesTournoi($idTournoi);
    $equipesTournoi = $listEquipesTournoi->fetchAll();

    $listMatchsTournoi = getMatchsTournoi($idTournoi);
    $matchsTournoi = $listMatchsTournoi->fetchAll();

    $gagnantAncien = getEquipeGagnante($idPartie);

    if($gagnantAncien == $idEquipe1){
    	$perdantAncien = $idEquipe2;
    }
    else if($gagnantAncien == $idEquipe2){
    	$perdantAncien = $idEquipe1;
    }

    $nbMatch16 = getNbMatch($idTournoi,16);
    $nbMatch8 = getNbMatch($idTournoi,8);
    $nbMatch4 = getNbMatch($idTournoi,4);
    $nbMatch2 = getNbMatch($idTournoi,2);
    $nbMatch1 = getNbMatch($idTournoi,1);
    $tourPartie = getTourPartie($idPartie);
    if($tourPartie == 16){
    	$nbMatch16 = $nbMatch16-1;
    }
    else if($tourPartie == 8){
    	$nbMatch8 = $nbMatch8-1;
    }
    else if($tourPartie == 4){
    	$nbMatch4 = $nbMatch4-1;
    }
    else if($tourPartie == 2){
    	$nbMatch2 = $nbMatch2-1;
    }
    else if($tourPartie == 1){
    	$nbMatch1 = $nbMatch1-1;
    }
	include("view/modifMatchTournoi.php");

	setEquipeDisqualif($perdantAncien);
}

function modifMatchTournoi(){
	parse_str(file_get_contents('php://input'), $_PUT);

	$idEquipe1Ancien = htmlspecialchars($_PUT['idEquipe1Ancien']);
	$idEquipe2Ancien = htmlspecialchars($_PUT['idEquipe2Ancien']);
	$idPerdantAncien = htmlspecialchars($_PUT['perdantAncien']);


	diminMatchJoueEquipe($idEquipe1Ancien); //Diminution des matchs joués par les équipes concernées par la modif
	diminMatchJoueEquipe($idEquipe2Ancien);

	
	$tourMatch = htmlspecialchars($_PUT['tourMatch']);
	$idEquipe1 = htmlspecialchars($_PUT['idEquipe1']);
	$idEquipe2 = htmlspecialchars($_PUT['idEquipe2']);
	$scoreEquipe1 = htmlspecialchars($_PUT['scoreEquipe1']);
	$scoreEquipe2 = htmlspecialchars($_PUT['scoreEquipe2']); 
	$idPartie = htmlspecialchars($_PUT['idPartie']); 
	$idTournoi = getIdTournoiFromPartie($idPartie);
	//On récupère le premier gagnant de la partie pour rétablir la variable qualifiée si il y a une erreur dans la modification



	$nbMatchJoue1 = getNbMatchEquipe($idEquipe1);
	$nbMatchJoue2 = getNbMatchEquipe($idEquipe2);

	if($scoreEquipe1 == $scoreEquipe2 or $idEquipe1 == $idEquipe2 or $nbMatchJoue1 != $nbMatchJoue2){
		$equipes1=getEquipesTournoi($idTournoi);
		$equipes2=getEquipesTournoi($idTournoi);
		$nbEquipes = getNbEquipesTournoi($idTournoi);
		$nbMatch16 = getNbMatch($idTournoi,16);
	    $nbMatch8 = getNbMatch($idTournoi,8);
	    $nbMatch4 = getNbMatch($idTournoi,4);
	    $nbMatch2 = getNbMatch($idTournoi,2);
	    $nbMatch1 = getNbMatch($idTournoi,1);
	    $listEquipesTournoi = getEquipesTournoi($idTournoi);
    	$equipesTournoi = $listEquipesTournoi->fetchAll();
    	$listMatchsTournoi = getMatchsTournoi($idTournoi);
    	$matchsTournoi = $listMatchsTournoi->fetchAll();
    	$nbEquipes = getNbEquipesTournoi($idTournoi);
		augmentMatchJoueEquipe($idEquipe1Ancien); //Rétablissement du nb de match joué si modif invalide
		augmentMatchJoueEquipe($idEquipe2Ancien);
		http_response_code(404); // 404 car ressource non trouvée
    	if($scoreEquipe1 == $scoreEquipe2){
    		require("view/modifMatchTournoiEgalite.php");
    	}
		else if($idEquipe1 == $idEquipe2){
			require("view/modifMatchTournoiMemeEquipe.php");
		}
		else if($nbMatchJoue1 != $nbMatchJoue2){
			require("view/modifMatchTournoiMauvaisTour.php");
		}
		exit;
	}

	augmentMatchJoueEquipe($idEquipe1); //Augmentation du nb de matchs joués
	augmentMatchJoueEquipe($idEquipe2);

	if($scoreEquipe1 > $scoreEquipe2){
		$idGagnantPartie = $idEquipe1;
		setEquipeDisqualif($idEquipe2);
		if($idPerdantAncien != $idEquipe2){
			setEquipeQualif($idPerdantAncien);
		}
	}
	else if($scoreEquipe1 < $scoreEquipe2){
		$idGagnantPartie = $idEquipe2;
		setEquipeDisqualif($idEquipe1);
		if($idPerdantAncien != $idEquipe1){
			setEquipeQualif($idPerdantAncien);
		}
	}


	$affectedLines = modifMatchTournoiM($tourMatch, $idEquipe1, $idEquipe2, $scoreEquipe1, $scoreEquipe2, $idGagnantPartie, $idPartie);

	$nbMatch16 = getNbMatch($idTournoi,16);
    $nbMatch8 = getNbMatch($idTournoi,8);
    $nbMatch4 = getNbMatch($idTournoi,4);
    $nbMatch2 = getNbMatch($idTournoi,2);
    $nbMatch1 = getNbMatch($idTournoi,1);
	if ($affectedLines === false) {
        http_response_code(404); // 404 car ressource non créée
		header('HTTP/1.0 404 Not Found');
		include('view/404.php');
		exit;
    }
    else{
    	$equipes1=getEquipesTournoi($idTournoi);
		$equipes2=getEquipesTournoi($idTournoi);
    	$listEquipesTournoi = getEquipesTournoi($idTournoi);
    	$equipesTournoi = $listEquipesTournoi->fetchAll();
    	$listMatchsTournoi = getMatchsTournoi($idTournoi);
    	$matchsTournoi = $listMatchsTournoi->fetchAll();
    	$nbEquipes = getNbEquipesTournoi($idTournoi);
    	require('view/matchTournoi.php');
    }
}

function suppMatchTournoi(){
	parse_str(file_get_contents('php://input'), $_DELETE);
	$idEquipe1 = htmlspecialchars($_DELETE['idEquipe1']);
	$idEquipe2 = htmlspecialchars($_DELETE['idEquipe2']);
	$idPartie = htmlspecialchars($_DELETE['idPartie']); 
	$idTournoi = getIdTournoiFromPartie($idPartie);
	$affectedLines = suppMatchTournoiM($idPartie);
	if ($affectedLines === false) {
        http_response_code(404); // 404 car ressource non trouvée
		header('HTTP/1.0 404 Not Found');
		include('view/404.php');
		exit;
    }
    else{
    	setEquipeQualif($idEquipe1); //Remise à zéro de la variable gérant le fait qu'une équipe soit encore qualifiée ou non
		setEquipeQualif($idEquipe2);
		diminMatchJoueEquipe($idEquipe1); //Diminution des matchs joués par les équipes concernées par la suppression
		diminMatchJoueEquipe($idEquipe2);
		//Création des variables nécessaires à la vue à afficher
		$nbMatch16 = getNbMatch($idTournoi,16);
	    $nbMatch8 = getNbMatch($idTournoi,8);
	    $nbMatch4 = getNbMatch($idTournoi,4);
	    $nbMatch2 = getNbMatch($idTournoi,2);
	    $nbMatch1 = getNbMatch($idTournoi,1);
    	$equipes1=getEquipesTournoi($idTournoi);
		$equipes2=getEquipesTournoi($idTournoi);
    	$listEquipesTournoi = getEquipesTournoi($idTournoi);
    	$equipesTournoi = $listEquipesTournoi->fetchAll();
    	$listMatchsTournoi = getMatchsTournoi($idTournoi);
    	$matchsTournoi = $listMatchsTournoi->fetchAll();
    	$nbEquipes = getNbEquipesTournoi($idTournoi);
    	require('view/matchTournoi.php');
    }
}

function rechercheMatchTournoi(){
	$nomEquipe = $_GET['nomRechercheEquipeMatchTournoi'];
	$idTournoi = $_GET['idTournoi'];
	$listMatchsTournoi=rechercheMatchTournoiM($nomEquipe,$idTournoi);
	if($listMatchsTournoi->rowCount()==0){
		http_response_code(404); // 404 car ressource non trouvée
	}
	$matchsTournoi = $listMatchsTournoi->fetchAll();
	$listEquipesTournoi = getEquipesTournoi($idTournoi);
    $equipesTournoi = $listEquipesTournoi->fetchAll();
    require('view/listeMatchsTournoiRecherche.php');
}

function rechercheMatchTournoiMembre(){
	$nomEquipe = $_GET['nomRechercheEquipeMatchTournoi'];
	$idTournoi = $_GET['idTournoi'];
	$listMatchsTournoi=rechercheMatchTournoiM($nomEquipe,$idTournoi);
	if($listMatchsTournoi->rowCount()==0){
		http_response_code(404); // 404 car ressource non trouvée
	}
	$matchsTournoi = $listMatchsTournoi->fetchAll();
	$listEquipesTournoi = getEquipesTournoi($idTournoi);
    $equipesTournoi = $listEquipesTournoi->fetchAll();
    require('view/listeMatchsTournoiRechercheMembre.php');
}