<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<?php require("view/header.html"); ?>
</head>
<body>
<a href = home.php>Retour à la liste des tournois</a>
	<h3>Résultat de la recherche</h3>
<?php
	if(!$tournois){
		echo 'Aucun résultat pour cette recherche !';
	}
	else{ ?>
		<div class="table-responsive">
		<table class="table">
		<thead>
			<tr>
			  <th scope="col">Tournoi</th>
			  <th scope="col">Lieu</th>
			  <th scope="col">Liste des équipes</th>
			  <th scope="col">Liste des matchs</th>
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
			<form method="get" action="home.php">
				<input type=hidden value = listeEquipesTournoi name=action>
				<input type=hidden value="<?php echo $tournoi['idTournoi']; ?>" name=tournoi>
				<input type=submit value="Voir équipes">
			</form>
		</td>
		<td>
			<form method="get" action="home.php">
				<input type=hidden value=listeMatchTournoi name=action>
				<input type=hidden value="<?php echo $tournoi['idTournoi']; ?>" name=tournoi>
				<input type=submit value="Voir la liste des matchs">
			</form>
		</td>
	<?php
	}
}
	?>
		</tbody>
	</table>
</div>
</body>
</html>