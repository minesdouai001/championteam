<div class="col-lg-8 col-lg-offset-2">
    
    
        <form class="form-signina" action="index.php" method="post">
            <h2 class="form-signin-heading">Choisir une date : </h2>
            <input type="date" name="dateMenu">
            <INPUT TYPE="submit" NAME="valider" VALUE="Valider">
        </form>
    
        
        <h2 class="form-signin-heading">Menu du jour 
           <?php   date_default_timezone_set('Europe/Paris'); 
            if(isset($dateMenu) && $dateMenu != ""){
                    echo($dateMenu);
            }
            else{
                echo(date("Y-m-d"));   
            }
            ?>
        </h2>
        <h3 class="form-signin-heading">Entrée</h3>
        <?php if ( isset($entree)){
        echo($entree->title);} ?>
        <h3 class="form-signin-heading">Plat</h3>
        <?php if ( isset($plat)){
        echo($plat->title);} ?>
        <h3 class="form-signin-heading">Dessert</h3>
       <?php  if ( isset($dessert)){
        echo($dessert->title);} ?>
        
</div>
