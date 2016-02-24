<?php

class CarteWagon extends Model {

    public function __construct($id) {
        parent::__construct();
    }

    //***************************************************Accesseurs****************************************************************
    //************************************************************************************************************
    //*********************************Methodes pour executer les requetes SQL******************************************************
    public static function creer_cartes_wagon($no_partie) {
        $sql = self::$queries['CREER_CARTE_WAGON'];
        $params = array(': couleur', ': no_partie');
        $args = array('locomotive', $no_partie);
        for ($i = 1; $i < 110; $i++) {
            switch (true) {
                case ($i >= 1) && ($i <= 13):
                    $couleur = 'locomotive';
                    break;
                case ($i >= 14) && ($i <= 25):
                    $couleur = 'blanc';
                    break;
                case ($i >= 26) && ($i <= 37):
                    $couleur = 'noir';
                    break;
                case ($i >= 38) && ($i <= 49):
                    $couleur = 'rouge';
                    break;
                case ($i >= 50) && ($i <= 61):
                    $couleur = 'vert';
                    break;
                case ($i >= 62) && ($i <= 73):
                    $couleur = 'bleu';
                    break;
                case ($i >= 74) && ($i <= 85):
                    $couleur = 'rose';
                    break;
                case ($i >= 86) && ($i <= 97):
                    $couleur = 'orange';
                    break;
                default:
                    $couleur = 'jaune';
                    break;
            }
            $sql = $sql . ", VALUES($couleur, : no_partie)";
        }
        parent::exec($sql);
    }

    public static function distribuer($no_partie) {
        $sql = self::$queries['DISTRIBUER'];
        $params = array(': no_utilisateur', ': no_partie');
        $args = array($_SESSION['user_id'], $no_partie);        
        parent::exec($sql, $params, $args);
        Joueur::update_nb_cartes_wagon();
    }

    public static function piocher($no_partie) {
        $sql = self::$queries['PIOCHER'];
        $params = array(': no_utilisateur', ': no_partie');
        $args = array($_SESSION['user_id'], $no_partie);
        parent::exec($sql,$params, $args);
        Joueur::update_nb_cartes_wagon();        
    }

    public static function defausser($nb_cartes, $no_partie, $couleur) {
        $sql = self::$queries['DEFAUSSER'];
        $params = array(': no_utilisateur', ': nb_cartes', ': no_partie', ': couleur');
        $args = array($_SESSION['user_id'], $nb_cartes, $no_partie, $couleur);        
        parent::exec($sql, $params, $args);
        Joueur::update_nb_cartes_wagon();
    }

}
?>