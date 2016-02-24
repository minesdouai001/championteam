<div class="col-lg-8 col-lg-offset-2">
    
    
        <form class="form-signina" action="index.php" method="post">
            <h2 class="form-signin-heading">Choisir une date : </h2>
            <input type="date" name="dateMenu">
            <INPUT TYPE="submit" NAME="valider" VALUE="Valider">
        </form>
    
        
        <h2 class="form-signin-heading">Menu du jour 
            <?php   date_default_timezone_set('Europe/Paris'); 
                    if($dateMenu != ""){
                        echo($dateMenu);
                    } 
                    else{
                        echo(date("Y-m-d"));
                        
                    }
            ?>
        </h2>
		<?php
			if (isset($conErrorText))
			echo ' <span class="error"> ' . $conErrorText . ' </span> <br>';
		?>
        <h3 class="form-signin-heading">Entrée</h3>
        <h3 class="form-signin-heading">Plat</h3>
        <h3 class="form-signin-heading">Dessert</h3>
        
</div>
