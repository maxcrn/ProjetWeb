<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<div class = "container">
	<div class="wrapper">
		<form action="home.php?action=login" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading" style="text-align:center">Bienvenue sur le site de gestion de tournoi ! Merci de vous connecter !</h3>
			  <hr class="colorgraph"><br>
			  
			  <input type="text" class="form-control" name="pseudo" placeholder="Pseudo" required="" autofocus="" />
			  <input type="password" class="form-control" name="pass" placeholder="Mot de passe" required=""/>     		  
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Connexion</button>
			  Vous n'avez pas de compte ? <a href="home.php?action=signin">Cliquez ici !</a>
		</form>			
	</div>
</div>
</html>