<div class="form-signin" id="content">

<h2 class="form-signin-heading">Vos Informations</h2>

  <?php echo $user->login() ?>
  <?php
                $nom = $user->nom();
                if(isset($nom))
                    echo $nom;
                    ?>

<?php
    $prenom = $user->prenom();
    if(isset($prenom))
        echo $prenom;
    ?>


<?php
    $mail = $user->mail();
    if(isset($mail))
    echo $mail;
    ?>

<?php
    $pays = $user->pays();
    if(isset($pays))
    echo $pays;
    ?>

<?php
    $age = $user->age();
    if(isset($age))
    echo $age;
    ?>

<?php
    $sexe = $user->sexe();
    if(isset($sexe))
    echo $sexe;
    ?>

<?php
    $sexe = $user->sexe();
    if(isset($sexe))
    echo $sexe;
    ?>

<?php
    $sexe = $user->sexe();
    if(isset($sexe))
    echo $sexe;
    ?>

<?php
    $nbv = $user->victoires();
    if(isset($nbv))
    echo $nbv;
    ?>

<?php
    $nbd = $user->defaites();
    if(isset($nbd))
    echo $nbd;
    ?>


<a href="index.php?controller=user&user=<?php echo $id ?>&action=modificationProfil">
<button class="btn btn-lg btn-primary btn-block" type="submit">Modifier profil</button>
</a>
<a href="index.php?controller=user&user=<?php echo $id ?>&action=modificationPassword">
<button class="btn btn-lg btn-primary btn-block" type="submit">Changer mot de passe</button>
</a>

</div>