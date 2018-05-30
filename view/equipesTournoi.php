<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<?php require("view/header.html"); ?>
</head>
<body>
	<h3>Liste des équipes</h3>
	<form method="get" action = "/">
		<input type=hidden value=rechercheEquipeTournoi name=action>
		<input type=text name=nomRechercheEquipeTournoi placeholder="Nom de l'équipe ?">
		<input type=hidden name=idTournoi value = "<?php echo $idTournoi; ?>">
		<input type=submit value = "Rechercher">
	</form>
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
			  <th scope="col">Nom de l'équipe</th>
			  <th scope="col">Modifier le nom</th>
			  <th scope="col">Supprimer</th>
			</tr>
		</thead>
	<?php
	while($equipeTournoi=$equipesTournoi->fetch()){
		?>
	 	<tbody>
	  	<?php
	    echo '<th scope="row">' . $equipeTournoi['nomEquipe'] .'</th>';
		?>
		<td>
			<form method=post action="/modifEquipeTournoi">
				<input type="hidden" name='_METHOD' value="PUT">
				<input type=hidden value = "<?php echo $idTournoi; ?>" name = tournoi>
				<input type=hidden value = "<?php echo $equipeTournoi['idEquipe']; ?>" name=equipe>
				<input type = text name = nomEquipe>
				<input class="btn btn-warning" type=submit value ="Modifier">
			</form>
		</td>
		<td>
			<form method=post action="/suppEquipeTournoi">
				<input type="hidden" name='_METHOD' value="DELETE">
				<input type=hidden value = "<?php echo $idTournoi; ?>" name = tournoi>
				<input type=hidden value = "<?php echo $equipeTournoi['idEquipe']; ?>" name=equipe>
				<input class="btn btn-danger" type=submit value ="Supprimer cette équipe">
			</form>
		</td>
	<?php
	}

	?>
		</tbody>
	</table>
</div>
	<form method = "POST" action = "/ajoutEquipeTournoi">
		<input type=hidden value="<?php echo $idTournoi; ?>" name="tournoi">
		<input type=text name="nomEquipeAjout">
		<input class="btn btn-success" type=submit value="Ajouter une équipe">
	</form>
</body>
</html>