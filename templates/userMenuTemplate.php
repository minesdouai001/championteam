
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
                            <li><a href="index.php?action=camera">Camera</a></li>

                        </ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo "$login" ?><span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="logOut.php">Déconnexion   <span class="glyphicon glyphicon-log-out"></span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
