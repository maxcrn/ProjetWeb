<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<?php require("view/header.html"); ?>
</head>
<body>
	<h3>Liste des tournois</h3>
	<form method="get" action = "home.php">
		<input type=hidden value=rechercheTournoi name=action>
		<input type=text name=nomRechercheTournoi placeholder="Nom du tournoi ?">
		<input type=submit value = "Rechercher">
	</form>
<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
			  <th scope="col">Tournoi</th>
			  <th scope="col">Lieu</th>
			  <th scope="col">Liste des équipes</th>
			  <th scope="col">Liste des matchs</th>
			  <th scope="col">Modifier</th>
			  <th scope="col">Supprimer</th>
			</tr>
		</thead>
	<?php
	while($tournoi=$tournois->fetch()){
		?>
	 	<tbody>
	  	<?php
	    echo '<th scope="row">' . $tournoi['nomTournoi'] .'</th> <td>'. $tournoi['lieuTournoi'] . '</td>';
		?>
		<td>
			<a href="listeEquipes/<?php echo $tournoi['idTournoi']; ?>">Voir la liste</a>
		</td>
		<td>
			<form method="get" action="accueil">
				<input type=hidden value=creerMatchTournoi name=action>
				<input type=hidden value="<?php echo $tournoi['idTournoi']; ?>" name=tournoi>
				<input type=submit value="Voir les matchs">
			</form>
		</td>
		<td>
			<a href="pageModifTournoi/<?php echo $tournoi['idTournoi']; ?>">
				<button type="button" class="btn btn-default" aria-label="Modifier le tournoi">
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</button>
			</a>
		</td>
		<td>
			<form method="post" action="Projet/suppTournoi">
				<input type="hidden" name='_METHOD' value="DELETE">
				<input type=hidden value="<?php echo $tournoi['idTournoi']; ?>" name=tournoi>
				<input type=submit value="Supprimer le tournoi">
			</form>
		</td>
	<?php
	}

	?>
		</tbody>
	</table>
</div>
	<a href="creerTournoi">
		<button type="button" class="btn btn-default" aria-label="Ajouter un tournoi">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
		</button>
	</a>
</body>
</html>