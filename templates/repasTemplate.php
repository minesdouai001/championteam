<form class="form-signin" action="index.php?controller=user&action=creerMenu" method="post">

    <h2 class="form-signin-heading">Création de menus</h2>

    <?php
    if (isset($inscErrorText))
        echo ' <span class="error"> ' . $inscErrorText . ' </span> <br>';
    ?> 
    <h3 class="form-signin-heading">Choisir une date: </h3>
    <input type="date" name="dateMenu">
    <h3 class="form-signin-heading">Choisir une entrée: </h3>
    <select name="entree">
        <option value="">Entrées</option>
        <?php        
        $request = Menu::liste_entrees();
        $entrees = $request->fetchAll(PDO::FETCH_OBJ);
       
        for ($i = 0; $i < count($entrees); $i++) {
            echo "<option value=\"" . $entrees[$i]->ID_PLAT . "\">" . $entrees[$i]->TITLE . "</option>";
        }
        ?>
    </select>
    <h3 class="form-signin-heading">Choisir un plat: </h3>
    <select name="plat">
        <option value="">Plats</option>
        <?php        
        $request = Menu::liste_plats();
        $plats = $request->fetchAll(PDO::FETCH_OBJ);
       
        for ($i = 0; $i < count($plats); $i++) {
            echo "<option value=\"" . $plats[$i]->ID_PLAT . "\">" . $plats[$i]->TITLE . "</option>";
        }
        ?>
    </select>
    <h3 class="form-signin-heading">Choisir un dessert: </h3>
    <select name="dessert">
        <option value="">Desserts</option>
        <?php        
        $request = Menu::liste_desserts();
        $desserts = $request->fetchAll(PDO::FETCH_OBJ);
       
        for ($i = 0; $i < count($desserts); $i++) {
            echo "<option value=\"" . $desserts[$i]->ID_PLAT . "\">" . $desserts[$i]->TITLE . "</option>";
        }
        ?>
    </select>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sauvegarder</button><br>
</form>