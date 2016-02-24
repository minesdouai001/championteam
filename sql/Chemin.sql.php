<?php

Chemin::addSqlQuery('INFOS_CHEMIN',
'SELECT LONGUEUR,COULEUR
FROM chemin WHERE CHEMIN=: chemin)');
?>