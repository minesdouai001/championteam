<?php

class Joueur extends Model {

    private $login, $nb_cartes;

    public function __construct($id) {
        
    }

    //***************************************************Accesseurs****************************************************************

    public function login() {
        
    }

    public function nb_cartes_noir() {
        $this->nb_cartes['noir'];
    }

    public function nb_cartes_bleu() {
        $this->nb_cartes['bleu'];
    }

    public function nb_cartes_vert() {
        $this->nb_cartes['vert'];
    }

    public function nb_cartes_jaune() {
        $this->nb_cartes['jaune'];
    }

    public function nb_cartes_orange() {
        $this->nb_cartes['orange'];
    }

    public function nb_cartes_rouge() {
        $this->nb_cartes['rouge'];
    }

    public function nb_cartes_blanc() {
        $this->nb_cartes['blanc'];
    }

    public function nb_cartes_rose() {
        $this->nb_cartes['rose'];
    }

    public function nb_cartes_locomotive() {
        $this->nb_cartes['locomotive'];
    }

    public function nb_cartes_destinations() {
        $this->nb_cartes['destinations'];
    }

    //************************************************************************************************************

    public static function create($login, $password, $mail, $nom) {
        static::creer_joueur($login, $password, $mail, $nom);
    }

    public static function joueurs($no_partie) {
        $request = self::infos_joueurs($no_partie);
        $data = $request->fetch(PDO::FETCH_OBJ);
        while (!empty($data)) {
            $player['noir'] = (int) $data->NB_CARTES_NOIR;
            $player['bleu'] = (int) $data->NB_CARTES_BLEU;
            $player['vert'] = (int) $data->NB_CARTES_VERT;
            $player['jaune'] = (int) $data->NB_CARTES_JAUNE;
            $player['orange'] = (int) $data->NB_CARTES_ORANGE;
            $player['rouge'] = (int) $data->NB_CARTES_ROUGE;
            $player['blanc'] = (int) $data->NB_CARTES_BLANC;
            $player['rose'] = (int) $data->NB_CARTES_ROSE;
            $player['locomotive'] = (int) $data->NB_CARTES_LOCOMOTIVE;
            $player['max'] = max($player);                                                  
            $player['couleur'] = $data->COULEUR_WAGONS;
            $player['wagons'] = $data->NB_WAGONS;
            $player['score'] = (int) $data->SCORE;
            $player['name'] = $data->LOGIN;            
            $player['id'] = (int) $data->NO_UTILISATEUR;

            $players[$data->NO_UTILISATEUR] = $player;
            unset($player);
            $data = $request->fetch(PDO::FETCH_OBJ);
        }
        return $players;
    }

    //*********************************Methodes pour executer les requetes SQL******************************************************
    public static function creer_joueur($no_utilisateur, $no_partie, $couleur) {
        $sql = self::$queries['CREER_JOUEUR'];
        $params = array(': no_utilisateur', ': no_partie', ': couleur');
        $args = array("'$no_utilisateur'", "'$no_partie'", "'$couleur'");
        parent::exec($sql, $params, $args);
    }

    public static function infos_joueurs($no_partie) {
        $sql = self::$queries['INFOS_JOUEURS'];
        $params = array(': no_partie');
        $args = array($no_partie);
        return parent::exec($sql, $params, $args);
    }
    
    public static function id_suivant($no_partie) {
        $sql = self::$queries['ID_SUIVANT'];
        $params = array(': no_partie');
        $args = array($no_partie);
        return parent::exec($sql, $params, $args);
    }

    public static function premier_id($no_partie) {
        $sql = self::$queries['PREMIER_ID'];
        $params = array(': no_partie');
        $args = array($no_partie);
        return  parent::exec($sql, $params, $args);
    }
    
    public static function update_nb_cartes_wagon() {
        $sql = self::$queries['UPDATE_NB_CARTES_WAGON'];
        $params = array(': no_utilisateur');
        $args = array($_SESSION['user_id']);
        parent::exec($sql, $params, $args);
    }
    
    public static function update_nb_cartes_destination() {
        $sql = self::$queries['UPDATE_NB_CARTES_DESTINATION'];
        $params = array(': no_utilisateur');
        $args = array($_SESSION['user_id']);
        parent::exec($sql, $params, $args);
    }

    /* public static function nb_cartes_wagon(){
      $sql = self::$queries['NB_CARTE_WAGON'];
      }

      public static function nb_cartes_destination(){
      $sql = self::$queries['NB_CARTE_DESTINATION'];
      } */

    public static function ma_partie() {
        $sql = self::$queries['MA_PARTIE'];
        $params = array(': no_utilisateur');
        $args = array($_SESSION['user_id']);
        $request = parent::exec($sql, $params, $args);
        return $request->fetch(PDO::FETCH_OBJ)->NO_PARTIE;
    }

    public static function incrementer_carte_wagon($couleur) {
        $sql = self::$queries['INCREMENTER_CARTE_WAGON'];
        $params = array(': COULEUR', ': no_utilisateur');
        $args = array(strtoupper($couleur), $_SESSION['user_id']);
        parent::exec($sql, $params, $args);
    }

    /* SELECT UTILISATEUR.NO_UTILISATEUR,LOGIN, NB_CARTES_NOIR, NB_CARTES_BLEU, NB_CARTES_VERT, NB_CARTES_JAUNE, NB_CARTES_ORANGE, NB_CARTES_ROUGE, NB_CARTES_BLANC, NB_CARTES_ROSE, NB_CARTES_LOCOMOTIVE, NB_WAGONS, COULEUR_WAGONS, SCORE, NB_CARTES_DESTINATIONS 
      FROM joueur,UTILISATEUR
      WHERE JOUEUR.NO_UTILISATEUR =UTILISATEUR.NO_UTILISATEUR AND NO_PARTIE=1 */
}

?>