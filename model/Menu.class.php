<?php

class Menu extends Model {
    
 //***************************************************Accesseurs****************************************************************
    

//*********************************Methodes pour executer les requetes SQL******************************************************
    public static function liste_entrees() {
        $sql = self::$queries['LISTE_ENTREE'];
        return parent::exec($sql);
    }
    public static function liste_plats() {
        $sql = self::$queries['LISTE_PLAT'];
        return parent::exec($sql);
    }
    
    public static function liste_desserts() {
        $sql = self::$queries['LISTE_DESSERT'];
        return parent::exec($sql);
    }
}

?>