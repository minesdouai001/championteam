			<form class="form-signin" action="index.php?controller=user&user=<?php echo $id ?>&action=creerPartie" method="post">

				<div class="form-signin" id="content">

					<h2 class="form-signin-heading">Création de partie</h2>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Nombre de joueurs maximum</h3>
						</div>
						<div class="panel-body">
							<select name="nbreMax">
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Publique / Privée</h3>
						</div>
						<div class="panel-body">
							<select name="estPublique">
								<option value="publique">Publique</option>
								<option value="privee">Privée</option>
							</select>
						</div>
					</div>

					<button class="btn btn-lg btn-primary btn-block" type="submit">Confirmer</button>
					<a href="index.php?controller=user&user=<?php echo $id ?>&action=profile">
						<button class="btn btn-lg btn-primary btn-block" type="submit">Annuler</button>
					</a>
			</form>

		</div>