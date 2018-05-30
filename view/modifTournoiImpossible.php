<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<?php require("view/header.html"); ?>
	<h3> Modification d'un tournoi </h3>
</head>
<body>
	<form method=post action="/modifTournoi">
		<p style=color:red>Le nombre d'équipes doit être supérieur au nombre d'équipes déjà créées.</p>
		Nombre d'équipes : 
		<input type="hidden" name='_METHOD' value="PUT">
		<input type="hidden" name='idTournoi' value = "<?php echo $idTournoi; ?>">
		<input type = radio name = nbEquipesTournoi value = 4> 4 
		<input type = radio name = nbEquipesTournoi value = 8> 8 
		<input type = radio name = nbEquipesTournoi value = 16> 16 
		<input type = radio name = nbEquipesTournoi value = 32> 32 <br \>
		Nom du tournoi : <input type = text name = nomTournoi> <br \>
		Lieu du tournoi : <input type = text name = paysTournoi> <br \>
		<input class="btn btn-warning" type=submit value = "Modifier le tournoi">
	</form>
</body>
</html>