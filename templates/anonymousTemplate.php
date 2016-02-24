
<form class="form-signin" action="index.php?action=connexion" method="post">
        <h2 class="form-signin-heading">Menu du jour</h2>
		<?php
			if (isset($conErrorText))
			echo ' <span class="error"> ' . $conErrorText . ' </span> <br>';
		?>
        <h3 class="form-signin-heading">Entrée</h3>
        <h3 class="form-signin-heading">Plat</h3>
        <h3 class="form-signin-heading">Dessert</h3>
        
</form>