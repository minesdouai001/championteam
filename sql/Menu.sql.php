<?php
	
Menu::addSqlQuery('LISTE_ENTREE',
"SELECT TITLE, ID_PLAT FROM PLAT WHERE TYPE='ENTREE'");
Menu::addSqlQuery('LISTE_PLAT',
"SELECT TITLE, ID_PLAT  FROM PLAT WHERE TYPE='PLAT'");
Menu::addSqlQuery('LISTE_DESSERT',
"SELECT TITLE, ID_PLAT  FROM PLAT WHERE TYPE='DESSERT'");

?>