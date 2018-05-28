<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<div class = "container">
	<div class="wrapper">
		<form action="home.php?action=signin" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading" style="text-align:center">Inscription</h3>
			  <hr class="colorgraph"><br>
			  
			  <input type="text" class="form-control" name="pseudo" placeholder="Pseudo" required="" autofocus="" />
			  <input type="password" class="form-control" name="pass1" placeholder="Mot de passe" required=""/>
			  <input type="password" class="form-control" name="pass2" placeholder="Retapez votre mot de passe" required=""/>
			  <input type="email" class="form-control" name="mail" placeholder="Entrez votre adresse mail" required=""/>
			  <p style='color:red'>Vos mots de passe ne correspondent pas</p>
			 
			  <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Signin" type="Submit">Connexion</button>
		</form>			
	</div>
</div>
</html>