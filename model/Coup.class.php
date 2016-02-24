<?php

class Coup extends Model {

    private $chemin, $auteur, $no_partie;

    public function __construct() {
        
    }

    public function auteur() {
        return $this->auteur;
    }

    public function chemin() {
        return $this->chemin;
    }

    public function no_partie() {
        return $this->no_partie;
    }

    /* public static function create($noUser, $nbMaxJoueurs, $estPublic, $enCours){
      static::creer_partie($noUser, $nbMaxJoueurs, $estPublic, $enCours);
      } */

    public static function tableau_coups_joues($no_partie) {
        $request = self::coups_joues($no_partie);
        if ($request->rowCount() > 0) {
            $data = $request->fetch(PDO::FETCH_OBJ);
            while (!empty($data)) {
                $coupJoues[$data->CHEMIN] = $data->COULEUR_WAGONS;
                $data = $request->fetch(PDO::FETCH_OBJ);
            }
        } else
            $coupJoues = array();
        return $coupJoues;
    }

    public static function coups_joues($no_partie) {
        $sql = self::$queries['COUPS_JOUES'];
        $params = array(': no_partie');
        $args = array($no_partie);
        return parent::exec($sql, $params, $args);
    }

    public static function creer_coups($no_partie) {
        $sql = self::$queries['CREER_COUPS'];
        $params = array(': chemin', ': no_partie');
        $args = array(0, $no_partie);
        for ($i = 1; $i < 100; $i++) {
            $sql = $sql . ", VALUES($i, : no_partie)";
        }
        parent::exec($sql, $params, $args);
    }

    public static function attribuer_coup($chemin, $no_partie) {
        $sql = self::$queries['ATTRIBUER_COUP'];
        $params = array(': no_utilisateur', ': chemin', ': no_partie');
        $args = array($_SESSION['user_id'], $chemin, $no_partie);
        parent::exec($sql, $params, $args);
    }

}

?>	