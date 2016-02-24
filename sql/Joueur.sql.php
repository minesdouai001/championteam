<?php
	
/*User::addSqlQuery('LISTE_LOGINS',
'SELECT LOGIN FROM UTILISATEUR');
User::addSqlQuery('USER_LIST',
'SELECT * FROM UTILISATEUR ORDER BY LOGIN');
User::addSqlQuery('CLASSEMENT',
'SELECT LOGIN, VICTOIRES, IF(NB_PARTIES = 0,0,VICTOIRES/NB_PARTIES ) AS RATIO,NB_PARTIES, SCORE_TOTAL FROM UTILISATEUR ORDER BY VICTOIRES DESC'); */
Joueur::addSqlQuery('CREER_JOUEUR',
'INSERT INTO JOUEUR (NO_UTILISATEUR, NO_PARTIE, COULEUR)
VALUES(: no_utilisateur, : no_partie, : couleur)');
/*Joueur::addSqlQuery('INFOS_JOUEURS',
'SELECT UTILISATEUR.NO_UTILISATEUR, LOGIN, NB_WAGONS, COULEUR_WAGONS, SCORE
FROM JOUEUR, UTILISATEUR
WHERE JOUEUR.NO_UTILISATEUR = UTILISATEUR.NO_UTILISATEUR AND NO_PARTIE=: no_partie ');*/
Joueur::addSqlQuery('MA_PARTIE',
'SELECT JOUEUR.NO_PARTIE
FROM JOUEUR,PARTIE
WHERE JOUEUR.NO_UTILISATEUR=: no_utilisateur');
Joueur::addSqlQuery('INCREMENTER_CARTE_WAGON',
'UPDATE JOUEUR SET NB_CARTES_: COULEUR = NB_CARTES_: COULEUR +1
WHERE NO_UTILISATEUR=: no_utilisateur');
Joueur::addSqlQuery('INFOS_JOUEURS',
'SELECT UTILISATEUR.NO_UTILISATEUR,LOGIN, NB_CARTES_NOIR, NB_CARTES_BLEU, NB_CARTES_VERT, NB_CARTES_JAUNE, NB_CARTES_ORANGE,
NB_CARTES_ROUGE, NB_CARTES_BLANC, NB_CARTES_ROSE, NB_CARTES_LOCOMOTIVE, NB_WAGONS, COULEUR_WAGONS, SCORE, NB_CARTES_DESTINATIONS
FROM JOUEUR, UTILISATEUR
WHERE JOUEUR.NO_UTILISATEUR =UTILISATEUR.NO_UTILISATEUR AND NO_PARTIE=: no_partie ');
Joueur::addSqlQuery('UPDATE_NB_CARTES_WAGON',
"UPDATE JOUEUR SET NB_CARTES_ROUGE= (SELECT COUNT(NO_UTILISATEUR) AS NB_CARTES_NOIRES FROM CARTE_WAGON
WHERE NO_UTILISATEUR=: no_utilisateur AND COULEUR='rouge'), NB_CARTES_VERT= (SELECT COUNT(NO_UTILISATEUR) AS NB_CARTES_NOIRES FROM CARTE_WAGON
WHERE NO_UTILISATEUR=: no_utilisateur AND COULEUR='vert'), NB_CARTES_JAUNE= (SELECT COUNT(NO_UTILISATEUR) AS NB_CARTES_NOIRES FROM CARTE_WAGON
WHERE NO_UTILISATEUR=: no_utilisateur AND COULEUR='jaune'), NB_CARTES_NOIR= (SELECT COUNT(NO_UTILISATEUR) AS NB_CARTES_NOIRES FROM CARTE_WAGON
WHERE NO_UTILISATEUR=: no_utilisateur AND COULEUR='noir') , NB_CARTES_LOCOMOTIVE= (SELECT COUNT(NO_UTILISATEUR) AS NB_CARTES_NOIRES FROM CARTE_WAGON
WHERE NO_UTILISATEUR=: no_utilisateur AND COULEUR='locomotive') , NB_CARTES_BLANC= (SELECT COUNT(NO_UTILISATEUR) AS NB_CARTES_NOIRES FROM CARTE_WAGON
WHERE NO_UTILISATEUR=: no_utilisateur AND COULEUR='blanc') ,  NB_CARTES_BLEU= (SELECT COUNT(NO_UTILISATEUR) AS NB_CARTES_NOIRES FROM CARTE_WAGON
WHERE NO_UTILISATEUR=: no_utilisateur AND COULEUR='bleu'), NB_CARTES_ORANGE= (SELECT COUNT(NO_UTILISATEUR) AS NB_CARTES_NOIRES FROM CARTE_WAGON
WHERE NO_UTILISATEUR=: no_utilisateur AND COULEUR='orange'),  NB_CARTES_ROSE= (SELECT COUNT(NO_UTILISATEUR) AS NB_CARTES_NOIRES FROM CARTE_WAGON
WHERE NO_UTILISATEUR=: no_utilisateur AND COULEUR='rose') WHERE NO_UTILISATEUR=: no_utilisateur");
Joueur::addSqlQuery('UPDATE_NB_CARTES_DESTINATION',
"UPDATE JOUEUR SET NB_CARTES_DESTINATIONS=(SELECT COUNT(NO_UTILISATEUR) AS NB_CARTES_DESTINATION
FROM carte_destination
WHERE NO_UTILISATEUR=: no_utilisateur) WHERE NO_UTILISATEUR=: no_utilisateur");
Joueur::addSqlQuery('PREMIER_ID',
'SELECT JOUEUR.NO_UTILISATEUR
FROM JOUEUR,PARTIE
WHERE JOUEUR.NO_PARTIE =: no_partie
LIMIT 1');
Joueur::addSqlQuery('ID_SUIVANT',
'SELECT JOUEUR.NO_UTILISATEUR
FROM JOUEUR,PARTIE
WHERE JOUEUR.NO_PARTIE = : no_partie AND JOUEUR.NO_UTILISATEUR > PARTIE.JOUEUR_COURANT
LIMIT 1');
/**/

?>