<?php

class Menu extends Model {
    
 //***************************************************Accesseurs****************************************************************
    private $infos_menu;
    public function __construct($id) {
        $this->infos_menu['id'] = $id;
        $this->getMenuInformation($this->infos_menu['id']);
    }

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
    
    public static function afficheMenuEntree($dateMenu){
        $sql = self::$queries['MENU_ENTREE'];
        $params = array(': dateMenu');
        $args = array("'$dateMenu'");
        return parent::exec($sql, $params, $args);
    }
    
    public static function afficheMenuPlat($dateMenu){
        $sql = self::$queries['MENU_PLAT'];
        $params = array(': dateMenu');
        $args = array("'$dateMenu'");
        return parent::exec($sql, $params, $args);
    }
    
    public static function afficheMenuDessert($dateMenu){
        $sql = self::$queries['MENU_DESSERT'];
        $params = array(': dateMenu');
        $args = array("'$dateMenu'");     
        return parent::exec($sql, $params, $args);
    }
    
    public function getMenuInformation($id) {
        $request = static::infos_menu($id);
        $data = $request->fetch(PDO::FETCH_OBJ);
        if (!empty($data)) {
            $this->infos_user['id_menu'] = $data->id_menu;
            $this->infos_user['date_menu'] = $data->date_menu;
            $this->infos_user['id_user'] = $data->id_user;
        }
    }
    
    public static function infos_menu($id) {
        $sql = self::$queries['INFOS_MENU'];
        $params = array(': id_menu');
        $args = array($id);
        return parent::exec($sql, $params, $args);
    }
}

?>