<?php
	
Menu::addSqlQuery('LISTE_ENTREE',
"SELECT TITLE, ID_PLAT FROM PLAT WHERE TYPE='ENTREE'");
Menu::addSqlQuery('LISTE_PLAT',
"SELECT TITLE, ID_PLAT  FROM PLAT WHERE TYPE='PLAT'");
Menu::addSqlQuery('LISTE_DESSERT',
"SELECT TITLE, ID_PLAT  FROM PLAT WHERE TYPE='DESSERT'");
Menu::addSqlQuery('MENU_DESSERT',
"SELECT DISTINCT title FROM plat, menu, repas WHERE type='DESSERT' AND menu.id_menu=repas.id_menu AND date_menu=: dateMenu;");
Menu::addSqlQuery('MENU_PLAT',
"SELECT DISTINCT title FROM plat, menu, repas WHERE type='PLAT' AND menu.id_menu=repas.id_menu AND date_menu=: dateMenu;");
Menu::addSqlQuery('MENU_ENTREE',
"SELECT DISTINCT title FROM plat, menu, repas WHERE type='ENTREE' AND menu.id_menu=repas.id_menu AND date_menu=: dateMenu;");

?>
