
<nav class="navbar navbar-default navbar-fixed-top">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
					<a href="." class="navbar-brand">Ch'min'ots</a>
				</div>
				<!-- Collection of nav links and other content for toggling -->
				<div id="navbarCollapse" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="index.php?controller=game&user=<?php echo $id ?>&action=jouer">Jouer</a></li>
                        <li><a href="index.php?controller=user&user=<?php echo $id ?>&action=leJeu">FAQ</a></li>
                        <li><a href="index.php?controller=user&user=<?php echo $id ?>&action=statistiques">Statistiques</a></li>

                        <li><a href="index.php?controller=user&user=<?php echo $id ?>&action=nousContacter">Nous contacter</a></li>
						<li><a href="index.php?controller=user&user=<?php echo $id ?>&action=profile">Profil</a></li>


					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo "$login" ?><span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="index.php?controller=user&user=<?php echo $id ?>">Profil</a></li>
								<li><a href="logOut.php">Déconnexion   <span class="glyphicon glyphicon-log-out"></span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
