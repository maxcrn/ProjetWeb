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
			</tr>
		</thead>
	<?php
	while($equipeTournoi=$equipesTournoi->fetch()){
		?>
	 	<tbody>
	  	<?php
	    echo '<th scope="row">' . $equipeTournoi['nomEquipe'] .'</th>';
		?>
	<?php
	}

	?>
		</tbody>
	</table>
</div>
</body>
</html>