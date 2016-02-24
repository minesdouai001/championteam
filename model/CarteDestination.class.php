<?php

class CarteDestination extends Model {

    public function __construct($id) {
        parent::__construct();
    }

    //***************************************************Accesseurs****************************************************************

    public static function creer_cartes_destination($no_partie) {
        $sql = self::$queries['CREER_CARTE_DESTINATION'];
        $params = array(': destination', ': no_partie');
        $args = array(1, $no_partie);
        for ($i = 1; $i < 30; $i++) {            
            $sql = $sql . ', VALUES('.($i+1).', : no_partie)';
        }        
        parent::exec($sql);
    }

    public static function distribuer($no_partie) {
        $sql = self::$queries['DISRIBUER_CARTE_DESTINATION'];
        $params = array(': no_utilisateur', ': no_partie');
        $args = array($_SESSION['user_id'], $no_partie);
        parent::exec($sql, $params, $args);
        Joueur::update_nb_cartes_destination();
    }

    public static function piocher($no_partie) {
        $sql = self::$queries['PIOCHER_CARTE_DESTINATION'];
        $params = array(': no_utilisateur', ': no_partie');
        $args = array($_SESSION['user_id'], $no_partie);
        parent::exec($sql,$params, $args);
        Joueur::update_nb_cartes_destination();
    }

    public static function defausser($no_partie, $destination) {
        $sql = self::$queries['DEFAUSSER_CARTE_DESTINATION'];
        $params = array(': no_partie', ': destination');
        $args = array($no_partie, $destination);
        parent::exec($sql, $params, $args);
        Joueur::update_nb_cartes_destination();
    }

}
?>

