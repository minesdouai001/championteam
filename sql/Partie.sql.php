<?php

Partie::addSqlQuery('CREER_PARTIE',
'INSERT INTO PARTIE (NO_UTILISATEUR, NB_MAX_JOUEURS, EST_PUBLIC, EN_COURS )
VALUES (: no_utilisateur, : nb_max_joueurs, : est_public, : en_cours)');
Partie::addSqlQuery('JOUEUR_COURANT',
'SELECT JOUEUR_COURANT
FROM PARTIE WHERE NO_PARTIE=: no_partie');
Partie::addSqlQuery('JOUEURS',
'SELECT JOUEUR.NO_UTILISATEUR
FROM JOUEUR,PARTIE
WHERE JOUEUR.NO_PARTIE =: no_partie');
Partie::addSqlQuery('UPDATE_JOUEUR_COURANT',
'UPDATE PARTIE SET JOUEUR_COURANT= : no_utilisateur');


?> 