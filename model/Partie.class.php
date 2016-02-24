<?php

class Partie extends Model {

    private $no_partie, $createur, $nbMaxJoueurs, $estPublic, $enCours;

    public function __construct($no_partie) {
        
    }

    //***************************************************Accesseurs****************************************************************

    public function no_partie() {
        return $this->no_partie;
    }

    public function createur() {
        return $this->createur;
    }

    public function nbMaxJoueurs() {
        return $this->nbMaxJoueurs;
    }

    public function estPublic() {
        return $this->estPublic;
    }

    public function enCours() {
        return $this->enCours;
    }

    public function joueurCourant() {
        return $this->joueur_courant;
    }

    //************************************************************************************************************
    public static function create($nbMaxJoueurs, $estPublic, $enCours) {
        static::creer_partie($nbMaxJoueurs, $estPublic, $enCours);
    }

    public static function getInfosPartie() {
        
    }

    public static function joueur_suivant($no_partie) {
        $request = Joueur::id_suivant($no_partie);
        if ($request == null) {
            $request = Joueur::premier_id($no_partie);
        }
        $cp = $request->fetch(PDO::FETCH_OBJ)->NO_UTILISATEUR;        
        self::update_joueur_courant($cp);
        
    }

    //*********************************Methodes pour executer les requetes SQL******************************************************
    public static function creer_partie($no_utilisateur, $nbMaxJoueurs, $estPublic, $enCours) {
        $sql = self::$queries['CREER_PARTIE'];
        $params = array(': no_utilisateur', ': nb_max_joueurs', ': est_public', ': en_cours');
        $args = array("'$no_utilisateur'", "'$nbMaxJoueurs'", "'$estPublic'", "'$enCours'");
        parent::exec($sql, $params, $args);
    }

    public static function joueur_courant($no_partie) {
        $sql = self::$queries['JOUEUR_COURANT'];
        $params = array(': no_partie');
        $args = array($no_partie);
        $request = parent::exec($sql, $params, $args);
        return $request->fetch(PDO::FETCH_OBJ)->JOUEUR_COURANT;         
    }

    

    public static function update_joueur_courant($no_utilisateur) {
        $sql = self::$queries['UPDATE_JOUEUR_COURANT'];
        $params = array(': no_utilisateur');
        $args = array("'$no_utilisateur'");
        parent::exec($sql, $params, $args);
    }

    /* public static function infos_partie(){
      $sql = s
      } */

    /* SELECT JOUEUR.NO_UTILISATEUR
      FROM JOUEUR,PARTIE
      WHERE JOUEUR.NO_PARTIE = PARTIE.NO_PARTIE */
}

?>