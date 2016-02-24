			<div class="container">
				<table id="statsTable" class="table table-striped table-bordered table-condensed">
					<thead>
						<tr>
							 <th>Destination</th>
							 <th>Jouée</th>
							 <th>Réussie</th>							 
						</tr>
					</thead>
					<tbody> 
						<?php
						$classement = Model::destinations();						
						for($i=0; $i< count($classement); $i++)
						echo '<tr> <th>'.$classement[$i]->NOM.' <-> '.$classement[$i]->NOM2.'</th> <th>'.$classement[$i]->NB_FOIS_JOUEE.'</th>
								<th>'.$classement[$i]->NB_FOIS_REUSSIE.'</th></tr>'
						?>
					</tbody>
				</table>
			</div>


<div class="container">
<table id="classement" class="table table-striped table-bordered table-condensed">
<thead>
<tr>
<th>Login</th>
<th>Victoires</th>
<th>Ratio</th>
<th>Parties jouées</th>
<th>Score total</th>
</tr>
</thead>
<tbody>
<?php
    $classement = User::tableau_classement();
    for($i=0; $i< count($classement); $i++)
    echo '<tr> <th>'.$classement[$i]->LOGIN.'</th> <th>'.$classement[$i]->VICTOIRES.'</th>
    <th>'.$classement[$i]->RATIO.'</th> <th>'.$classement[$i]->NB_PARTIES.'</th>
    <th>'.$classement[$i]->SCORE_TOTAL.'</th> </tr>'
    ?>
</tbody>
</table>
</div>
<script>
$(document).ready(function(){
                  $('#statsTable').DataTable({
						"order": [[ 1, "desc" ]]
					} );
				  
				  $('#classement').DataTable({
						"order": [[ 1, "desc" ]]
					} );
} );
					
</script>

