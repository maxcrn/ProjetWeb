<html>
<head>
	<link rel="stylesheet1" type="text/css" href="bracket.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<?php require("view/header.html"); ?>
</head>

<body>
	<form method=post action=home.php?action=modifMatchTournoi style="display:inline">
		<input type="hidden" name='_METHOD' value="PUT"> <!-- Methode PUT car modif de données -->
		<input type="hidden" name="idPartie" value="<?php echo $idPartie; ?>">
		<input type="hidden" name="perdantAncien" value = "<?php echo $perdantAncien; ?>">
		<input type="hidden" name="idEquipe1Ancien" value = "<?php echo $idEquipe1; ?>">
		<input type="hidden" name="idEquipe2Ancien" value = "<?php echo $idEquipe2; ?>">
		<?php 
		if($nbEquipes >= 32 and $nbMatch16 < 16){
			echo '<h3>Modifier un match</h3>';
			echo 'Tour du tournoi : ' . '<select name=tourMatch> 
			<option value=16>1/16 de finale</option>
			<option value=8>1/8 de finale</option>
			<option value=4>1/4 de finale</option>
			<option value=2>1/2 finale</option>
			<option value=1>Finale</option> </select><br \>';
		}
		else if($nbEquipes >= 16 and $nbMatch8 < 8){
			echo '<h3>Modifier un match</h3>';
			echo 'Tour du tournoi : ' . '<select name=tourMatch> 
			<option value=8>1/8 de finale</option>
			<option value=4>1/4 de finale</option>
			<option value=2>1/2 finale</option>
			<option value=1>Finale</option> </select><br \>';
		}
		else if($nbEquipes >= 8 and $nbMatch4 < 4){
			echo '<h3>Modifier un match</h3>';
			echo 'Tour du tournoi : ' . '<select name=tourMatch> 
			<option value=4>1/4 de finale</option>
			<option value=2>1/2 finale</option>
			<option value=1>Finale</option> </select><br \>';
		}
		else if($nbEquipes >= 4 and $nbMatch2 < 2){
			echo '<h3>Modifier un match</h3>';
			echo 'Tour du tournoi : ' . '<select name=tourMatch> 
			<option value=2>1/2 finale</option>
			<option value=1>Finale</option> </select> <br \>';
		} 
		else if($nbMatch1 < 1){
			echo '<h3>Modifier un match</h3>';
			echo 'Tour du tournoi : ' . '<select name=tourMatch> 
			<option value=1>Finale</option> </select> <br \>';
		} 
			?>

			<select name=idEquipe1 >
				<?php 
				while($equipe=$equipes1->fetch()){
					if($equipe['qualifEquipe']==1){
						echo '<option value="' . $equipe['idEquipe'] . '">' . $equipe['nomEquipe'] . '</option>';
					}
				} ?>
			</select>
			 <input type=number name=scoreEquipe1> VS <input type=number name=scoreEquipe2> 
			 <select name=idEquipe2 >
				<?php 
				while($equipe=$equipes2->fetch()){
					if($equipe['qualifEquipe']==1){
						echo '<option value="' . $equipe['idEquipe'] . '">' . $equipe['nomEquipe'] . '</option>';
					}
				} ?>
			</select>
			<br \><input type=submit value = "Modifier le match">
		</form>