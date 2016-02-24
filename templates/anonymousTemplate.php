
<form class="form-signin" action="index.php?action=connexion" method="post">
        <h2 class="form-signin-heading">Connexion</h2>
		<?php
			if (isset($conErrorText))
			echo ' <span class="error"> ' . $conErrorText . ' </span> <br>';
		?>         
        <input type="text" name="conLogin" class="form-control" placeholder="Login" value="<?php if(isset($_POST['conLogin'])) echo $_POST['conLogin'] ?>" required autofocus>        
        <input type="password" name="conPassword" class="form-control" placeholder="Mot de passe" required>        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button><br>
		<p>Pas encore inscrit ?<br>
		<a href="./index.php?action=inscription">Créer un compte maintenant</a></p>
</form>