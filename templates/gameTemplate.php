<div class="container-fluid content">
			<div class="row">
				<!-- <div class="col-md-12 col-lg-8">
					<div class="col-md-5 col-centered">
						<div class="btn-group" id="buttonZooms" role="group" aria-label="zoom buttons">
						  <button type="button" class="btn btn-sm btn-default">60%</button>
						  <button type="button" class="btn btn-sm btn-default">80%</button>
						  <button type="button" class="btn btn-sm btn-primary">100%</button>
						  <button type="button" class="btn btn-sm btn-default">120%</button>
						  <button type="button" class="btn btn-sm btn-default">140%</button>
						</div>
					</div>
				</div> -->
                                
				<div id="game" <?php
					
                                        
					echo 'data-players='.json_encode($players).' data-coupjoues='.json_encode($coupJoues).' data-currentplayer='.$cp.
                                            ' data-moi='.$_SESSION['user_id'];?> ></div>
				
				
				
	
				<script src="js/board.js"></script>
				
				
				
				<div class="col-sm-10 col-lg-8">
					<svg id="svg_board" viewBox="0 0 960 600" xmlns="http://www.w3.org/2000/svg">
						<image xlink:href="css/imgs/board-960x600.png" x="0" y="0" height="600px" width="960px"/>
						<!-- // M = move pen to this point ; Q = control point ; final point -->
						<!-- <path class="town_path" d="M57,171 Q180,185 236,291" stroke-dasharray="26,13" /> -->
						<!-- <polyline points="888,342 922,362 910,385" style="stroke-dasharray:25,13;"class="town_path path_selected"/> -->
					</svg>
				</div>
				<div class="col-sm-2">
                                    <table id="dataJoueur" class="table table-striped table-bordered table-condensed">
                                        <tbody>
                                            <h2 id="currentPlayer"></h2>
                                            <tr><th>Cartes Rouges</th><th><h5 id="rouge"></h5></th></tr>
                                            <tr><th>Cartes Bleues</th><th><h5 id="bleu"></h5></th></tr>
                                            <tr><th>Cartes Noires</th><th><h5 id="noir"></h5></th></tr>
                                            <tr><th>Cartes Jaunes</th><th><h5 id="jaune"></h5></th></tr>
                                            <tr><th>Cartes Oranges</th><th><h5 id="orange"></h5></th></tr>
                                            <tr><th>Cartes Blanches</th><th><h5 id="blanc"></h5></th></tr>
                                            <tr><th>Cartes Vertes</th><th><h5 id="vert"></h5></th></tr>
                                            <tr><th>Cartes Roses</th><th><h5 id="rose"></h5></th></tr>
                                            <tr><th>Cartes Locomotives</th><th><h5 id="locomotive"></h5></th></tr>
                                            <tr><th>Wagons</th><th><h5 id="wagon"></h5></th></tr>
                                            <tr><th>Score</th><th><h5 id="score"></h5></th></tr>
                                        </tbody>
                                    </table>
                                        
                                        <a href="index.php?controller=game&user=<?php echo $id ?>&action=piocherCarteWagon" class="btn btn-lg btn-primary btn-block" role="button"
                                           <?php if ($cp != $_SESSION['user_id']) echo 'disabled'; ?>>Piocher une carte wagon</a>
                                        <a href="index.php?controller=game&user=<?php echo $id ?>&action=piocherCarteDestination" class="btn btn-lg btn-primary btn-block" role="button"
                                           <?php if ($cp != $_SESSION['user_id']) echo 'disabled'; ?>>Piocher une carte destination</a>
				</div>
			</div>
</div>
