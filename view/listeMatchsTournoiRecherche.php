<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<?php require("view/header.html"); ?>
</head>
<h3>Liste des matchs</h3>
	<form method="get" action = "home.php">
		<input type=hidden value=rechercheMatchTournoi name=action>
		<input type=text name=nomRechercheEquipeMatchTournoi placeholder="Nom de l'équipe ?">
		<input type=hidden name=idTournoi value = "<?php echo $idTournoi; ?>">
		<input type=submit value = "Rechercher">
	</form>
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
			  <th scope="col">Tour</th>
			  <th scope="col">Nom de l'équipe 1</th>
			  <th scope="col">Score de l'équipe 1</th>
			  <th scope="col">Score de l'équipe 2</th>
			  <th scope="col">Nom de l'équipe 2</th>
			  <th scope="col">Modifier le match</th>
			  <th scope="col">Supprimer le match</th>
			</tr>
		</thead>
	<?php
	foreach($matchsTournoi as $matchTournoi){

    	if($matchTournoi['tourPartie'] == 16){
		    echo '<tbody>'.'<th scope="row">' . '1/16' .'</th>';
		}
		else if($matchTournoi['tourPartie'] == 8){
		    echo '<tbody>'.'<th scope="row">' . '1/8' .'</th>';
		}
		else if($matchTournoi['tourPartie'] == 4){
		    echo '<tbody>'.'<th scope="row">' . '1/4' .'</th>';
		}
		else if($matchTournoi['tourPartie'] == 2){
		    echo '<tbody>'.'<th scope="row">' . '1/2' .'</th>';
		}
		else if($matchTournoi['tourPartie'] == 1){
		    echo '<tbody>'.'<th scope="row">' . 'Finale' .'</th>';
		}
		?>
		<?php
		foreach($equipesTournoi as $equipeTournoi){
            if($matchTournoi['idEquipe1'] == $equipeTournoi['idEquipe']){
                $nomEquipe1=$equipeTournoi['nomEquipe'];
            }
            else if($matchTournoi['idEquipe2'] == $equipeTournoi['idEquipe']){
                $nomEquipe2=$equipeTournoi['nomEquipe'];
            }
        }
        if($nomEquipe1 != "" and $nomEquipe2 != ""){ ?>
			<td>
				<?php echo $nomEquipe1; ?>
			</td>
			<td>
				<?php echo $matchTournoi['scoreEquipe1']; ?>
			</td>
			<td>
				<?php echo $matchTournoi['scoreEquipe2']; ?>
			</td>
			<td>
				<?php echo $nomEquipe2; ?>
			</td>
			<td>
				<form method=get action="home.php">
					<input type=hidden name=action value=viewModifMatchTournoi>
					<input type=hidden value = "<?php echo $matchTournoi['idPartie']; ?>" name = idMatch>
					<input type=hidden value="<?php echo $idTournoi; ?>" name = tournoi>
					<!-- On passe les idEquipes pour pouvoir diminuer le nb de matchs joués et requalifier les équipes -->
					<input type=hidden value="<?php echo $matchTournoi['idEquipe1']; ?>" name = idEquipe1> 
					<input type=hidden value="<?php echo $matchTournoi['idEquipe2']; ?>" name = idEquipe2>
					<input type=submit value ="Modifier">
				</form>
			</td>
			<td>
				<form method=post action="home.php?action=suppMatchTournoi">
					<input type="hidden" name='_METHOD' value="DELETE">
					<input type=hidden value = "<?php echo $matchTournoi['idPartie']; ?>" name = idPartie>
					<input type=hidden value="<?php echo $matchTournoi['idEquipe1']; ?>" name = idEquipe1> 
					<input type=hidden value="<?php echo $matchTournoi['idEquipe2']; ?>" name = idEquipe2>
					<input type=submit value ="Supprimer ce match">
				</form>
			</td>
	<?php 
		}
	
		
	}

	?>
		</tbody>
	</table>
</div>