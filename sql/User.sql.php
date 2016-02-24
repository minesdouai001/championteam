<?php
	
User::addSqlQuery('LISTE_LOGINS',
'SELECT username FROM user');
User::addSqlQuery('USER_LIST',
'SELECT * FROM user ORDER BY username');
User::addSqlQuery('INFOS_USER',
'SELECT * FROM user WHERE id_user=: id_user');
User::addSqlQuery('CREER_USER',
'INSERT INTO Uuser (username, password, admin)
VALUES(: login, : password, 0');
User::addSqlQuery('TRY_LOGIN',
'SELECT id_user FROM user WHERE username=: username AND password=: password');
?>