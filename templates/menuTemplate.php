
<nav class="navbar navbar-default navbar-fixed-top">

<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="."> Cantine Champion </a>
</div>
<div id="navbar" class="collapse navbar-collapse">
<ul class="nav navbar-nav">

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=".">  </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">

<li><a href="index.php">Menu</a></li>
<li><a href="index.php?action=Camera">Camera</a></li>

                <li><a href="index.php?action=leJeu">FAQ</a></li>

<li><a href="index.php?action=Connexion">Connexion</a></li>
</li>
	</ul>
</ul>
</div><!--/.nav-collapse -->

            </ul>   
            
                <form class="form-signina" action="index.php?action=connexion" method="post">
                    <ul class="nav navbar-nav navbar-right">
                        <li>                        
                        <?php
                        if (isset($conErrorText))
                            echo ' <span class="error"> ' . $conErrorText . ' </span> <br>';
                        ?>         
                        <input type="text" name="conLogin" class="form-inline" placeholder="Login" value="<?php if (isset($_POST['conLogin'])) echo $_POST['conLogin'] ?>" required autofocus> 
                        <input type="password" name="conPassword" class="form-inline" placeholder="Mot de passe" required>   
                        <button class="btn btn-primary" type="submit" style="margin-top: 5px;">Connexion</button><br>
                    </ul>
                </form>
            
            

        </div><!--/.nav-collapse -->


    </div>
</nav>


</div>

