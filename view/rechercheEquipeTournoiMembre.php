<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<?php require("view/header.html"); ?>
</head>
<body>
	<a href = "listeEquipes/<?php echo $idTournoi; ?>">Retourner à la liste des équipes</a>
	<h3>Résultat(s) de la recherche</h3>
	<div class="table-responsive">
	<table class="table">
		<thead>
			<tr>
			  <th scope="col">Nom de l'équipe</th>
			</tr>
		</thead>
	<?php
	while($equipe=$equipes->fetch()){
		?>
	 	<tbody>
	  	<?php
	    echo '<th scope="row">' . $equipe['nomEquipe'] .'</th>';
		?>
	<?php
	}

	?>
		</tbody>
	</table>
</div>
</body>
</html>