<?php
	
User::addSqlQuery('LISTE_LOGINS',
'SELECT LOGIN FROM UTILISATEUR');

//SELECT VILLE.NOM, villa.NOM FROM VILLE, VILLE villa, chemin WHERE VILLE.NO_VILLE= chemin.NO_VILLE AND villa.NO_VILLE= chemin.`VIL_NO_VILLE` 
//SELECT VILLE.NOM, villa.NOM FROM VILLE, VILLE villa, DESTINATION WHERE VILLE.NO_VILLE= DESTINATION.NO_VILLE AND villa.NO_VILLE= DESTINATION.`VIL_NO_VILLE` 

//SELECT VILLE.NOM, villa.NOM, `NB_FOIS_UTILISE` FROM VILLE, VILLE villa, chemin WHERE VILLE.NO_VILLE= chemin.NO_VILLE AND villa.NO_VILLE= chemin.`VIL_NO_VILLE` ORDER BY `NB_FOIS_UTILISE` DESC 
?>