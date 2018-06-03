<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<?php require("view/headerMembres.html"); ?>
</head>
<h3>Liste des utilisateurs</h3>

<form method="get" action = "/">
	<input type=hidden value=rechercheMembre name=action>
	<input type=text name=nomRechercheMembre placeholder="Pseudo de l'utilisateur ?">
	<input type=submit value = "Rechercher">
</form>
<div class="table-responsive">
<table class="table">
		<thead>
			<tr>
			  <th scope="col">Pseudo</th>
			  <th scope="col">Role</th>
			  <th scope="col">Adresse mail</th>
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
        ?>
		<?php } ?>
		</tbody>
	</table>
</div>