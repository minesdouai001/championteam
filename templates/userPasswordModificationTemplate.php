			
			<form class="form-signin" action="index.php?controller=user&user=<?php echo $id ?>&action=validerModificationPassword" method="post">
				<div class="form-signin" id="content">

					<h2 class="form-signin-heading">Changement de mot de passe</h2>
					
					<?php
						if (isset($passwordErrorText))
							echo ' <span class="error"> ' . $passwordErrorText . ' </span> <br>';
					?>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Mot de passe actuel</h3>
						</div>
						<input type="password" name="oldPassword" class="form-control" placeholder="Ancien mot de passe*" autofocus>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Nouveau mot de passe</h3>
						</div>
						<input type="password" name="newPassword" class="form-control" placeholder="Nouveau mot de passe*">
					</div>

					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Confirmation</h3>
						</div>
						<input type="password" name="newPassword2" class="form-control" placeholder="Confirmer mot de passe*">
					</div>

					<button class="btn btn-lg btn-primary btn-block" type="submit">Modifier le mot de passe</button>
					<a href="index.php?controller=user&user=<?php echo $id ?>&action=profile">
                                            <button class="btn btn-lg btn-primary btn-block" onclick="prec()">Annuler</button>
					</a>
                                        
                                        <script>
                                            function prec(){
                                                windown.history.back();
                                            }
                                        </script>
					
			</form>

					

				</div>