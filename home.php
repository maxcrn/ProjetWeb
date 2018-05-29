<?php
require_once('controller/match.php');
require_once('controller/tournoi.php');
require_once('controller/match.php');
require_once('controller/equipe.php');
require_once('controller/membre.php');

if(isset($_COOKIE['pseudo']) AND isset($_COOKIE['pass']) AND isset($_COOKIE['id']) AND isAdmin()) { //Actions de l'admin

	if(isset($_GET['action'])){

		if ($_GET['action'] == 'creerTournoi') {
	        require('view/creaTournoi.php');
	    }
	    else if($_GET['action'] == 'ajoutTournoi' AND isset($_POST['nomTournoi'])){
	    	ajoutTournoi();
	    }
	    else if($_GET['action'] == 'gererTournoi' AND isset($_GET['tournoi'])){
	    	gererTournoi();
	    }
	    else if($_GET['action'] == 'rechercheTournoi' AND isset($_GET['nomRechercheTournoi'])){
	    	rechercheTournoi();
	    }
	    else if($_GET['action'] == 'modifTournoi' AND isset($_POST['_METHOD'])){
	    	modifTournoi();
	    }
	    else if($_GET['action'] == 'ajoutEquipeTournoi' AND isset($_POST['tournoi'])){
	    	ajoutEquipeTournoi();
	    }
	    else if($_GET['action'] == 'suppTournoi' AND isset($_POST['_METHOD'])){
	    	supprimerTournoi();
	    }
	    else if($_GET['action'] == 'suppEquipeTournoi' AND isset($_POST['_METHOD'])){
	    	supprimerEquipeTournoi();
	    }
	    else if($_GET['action'] == 'rechercheEquipeTournoi'){
	    	rechercheEquipeTournoi();
	    }
	    else if($_GET['action'] == 'pageModifTournoi'){
	    	require('view/modifTournoi.php');
	    }
	    else if($_GET['action'] == 'pageModifTournoiImpossible'){
	    	require('view/modifTournoiImpossible.php');
	    }
	    else if($_GET['action'] == 'ajoutMatchTournoi' AND isset($_POST['idTournoi'])){
	    	ajoutMatchTournoi();
	    }
	    else if($_GET['action'] == 'creerMatchTournoi' AND isset($_GET['tournoi'])){
	    	creaMatchTournoi();
	    }
	    else if($_GET['action'] == 'modifEquipeTournoi' AND isset($_POST['_METHOD'])){
	    	modifEquipeTournoi();
	    }
	    else if($_GET['action'] == 'viewModifMatchTournoi' AND isset($_GET['tournoi'])){
	    	viewModifMatchTournoi();
	    }
	    else if($_GET['action'] == 'modifMatchTournoi' AND isset($_POST['_METHOD'])){
	    	modifMatchTournoi();
	    }
	    else if($_GET['action'] == 'suppMatchTournoi' AND isset($_POST['_METHOD'])){
	    	suppMatchTournoi();
	    }
	    else if($_GET['action'] == 'rechercheMatchTournoi' AND isset($_GET['nomRechercheEquipeMatchTournoi'])){
	    	rechercheMatchTournoi();
	    }
	    else if($_GET['action'] == 'deconnexion'){
	    	deconnexion();
	    }
	    else if($_GET['action'] == 'listeMembres'){
	    	listeMembres();
	    }
	    else if($_GET['action'] == 'setAdmin' AND isset($_POST['idMembre'])){
	    	setAdmin();
	    }
	    else if($_GET['action'] == 'deleteMembre' AND isset($_POST['_METHOD'])){
	    	deleteMembre();
	    }
	    else if($_GET['action'] == 'rechercheMembre'){
	    	rechercheMembre();
	    }
	    else{
	    	listTournois();
	    }
	}
    else{
    	listTournois();
    }
}

else if(isset($_COOKIE['pseudo']) AND isset($_COOKIE['pass']) AND isset($_COOKIE['id']) AND connecte()) { //Actions d'un membre
	if(isset($_GET['action'])){
		if($_GET['action'] == 'listeEquipesTournoi' AND isset($_GET['tournoi'])){
		    listeEquipesTournoiMembre();
		}
		else if($_GET['action'] == 'listeMatchTournoi' AND isset($_GET['tournoi'])){
	    	listeMatchTournoi();
	    }
		else if($_GET['action'] == 'rechercheTournoi' AND isset($_GET['nomRechercheTournoi'])){
	    	rechercheTournoiMembre();
	    }
	    else if($_GET['action'] == 'rechercheEquipeTournoi'){
	    	rechercheEquipeTournoiMembre();
	    }
	    else if($_GET['action'] == 'rechercheMatchTournoi' AND isset($_GET['nomRechercheEquipeMatchTournoi'])){
	    	rechercheMatchTournoiMembre();
	    }
		else if($_GET['action'] == 'deconnexion'){
	    	deconnexion();
	    }
	    else if($_GET['action'] == 'listeMembres'){
	    	listeMembresMembre();
	    }
	    else if($_GET['action'] == 'rechercheMembre'){
	    	rechercheMembreMembre();
	    }
	    else{
	    	listTournoisMembre();
	    }
	}

	else{
    	listTournoisMembre();
    }
}



else if(isset($_GET['action']) AND $_GET['action'] == 'login' AND isset($_POST['pseudo']) AND isset($_POST['pass'])){
	login();
}


else if(isset($_GET['action']) AND $_GET['action'] == 'signin'){
	if(isset($_POST['pseudo'])){
		if($_POST['pass1'] == $_POST['pass2']){
			signin();
		}
		else{
			require('view/signinScreenErreurPass.php');
		}
	}
	else{
		require('view/signinScreen.php');
	}
}

else{
	require('view/loginScreen.php');
}