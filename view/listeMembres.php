<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<?php require("view/headerMembres.html"); ?>
</head>
<h3>Liste des membres</h3>

<form method="get" action = "home.php">
	<input type=hidden value=rechercheMembre name=action>
	<input type=text name=nomRechercheMembre placeholder="Pseudo du membre ?">
	<input type=submit value = "Rechercher">
</form>
<div class="table-responsive">
<table class="table">
		<thead>
			<tr>
			  <th scope="col">Pseudo</th>
			  <th scope="col">Role</th>
			  <th scope="col">Adresse mail</th>
			  <th scope="col">Changer son rôle</th>
			  <th scope="col">Supprimer</th>
			</tr>
		</thead>
	<?php
	foreach($membres as $membre){
		echo '<tbody>'.'<th scope="row">' . $membre['pseudoMembre'] .'</th>';
		?>
		<?php
		$roleMembre='Membre';
		foreach($admins as $admin){
            if($admin['idMembre'] == $membre['idMembre']){
                $roleMembre='Admin';
            }
        }
        echo '<td>' . $roleMembre . '</td>'; 
        echo '<td>' . $membre['mailMembre'] . '</td>';
        if($roleMembre!='Admin'){
        ?>
			<td>
				<form method=post action="home.php?action=setAdmin">
					<input type=hidden value="<?php echo $membre['idMembre']; ?>" name = idMembre>
					<input type=submit value ="Rendre admin">
				</form>
			</td>
			<td>
				<form method=post action="home.php?action=deleteMembre">
					<input type="hidden" name='_METHOD' value="DELETE">
					<input type=hidden value = "<?php echo $membre['idMembre']; ?>" name = idMembre>
					<input type=submit value ="Supprimer ce membre">
				</form>
			</td>
		<?php } ?>

	<?php 
		}

	?>
		</tbody>
	</table>
</div>