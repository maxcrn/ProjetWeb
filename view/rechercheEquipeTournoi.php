<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<?php require("view/header.html"); ?>
</head>
<body>
	<div class="table-responsive">
	<a href = "listeEquipes/<?php echo $idTournoi; ?>">Retourner à la liste des équipes</a>
	<h3>Résultat(s) de la recherche</h3>
	<table class="table">
		<thead>
			<tr>
			  <th scope="col">Nom de l'équipe</th>
			  <th scope="col">Modifier le nom</th>
			  <th scope="col">Supprimer</th>
			</tr>
		</thead>
	<?php
	while($equipe=$equipes->fetch()){
		?>
	 	<tbody>
	  	<?php
	    echo '<th scope="row">' . $equipe['nomEquipe'] .'</th>';
		?>
		<td>
			<form method=post action="modifEquipeTournoi">
				<input type="hidden" name='_METHOD' value="PUT">
				<input type=hidden value = "<?php echo $idTournoi; ?>" name = tournoi>
				<input type=hidden value = "<?php echo $equipe['idEquipe']; ?>" name=equipe>
				<input type = text name = nomEquipe>
				<input type=submit value ="Modifier">
			</form>
		</td>
		<td>
			<form method=post action="/suppEquipeTournoi">
				<input type="hidden" name='_METHOD' value="DELETE">
				<input type=hidden value = "<?php echo $idTournoi; ?>" name = tournoi>
				<input type=hidden value = "<?php echo $equipe['idEquipe']; ?>" name=equipe>
				<input type=submit value ="Supprimer cette équipe">
			</form>
		</td>
	<?php
	}

	?>
		</tbody>
	</table>
</div>
</body>
</html>