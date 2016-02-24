<?php

class User extends Model {

    protected static $instance;
    private $infos_user;

    //Pouvoir changer dae naissance sexe ...		

    public function __construct($id) {
        $this->infos_user['id'] = $id;
        $this->getUserInformation($this->infos_user['id']);
    }

    //***************************************************Accesseurs****************************************************************
    public function login() {
        return $this->infos_user['login'];
    }

    public function nom() {
        return $this->infos_user['nom'];
    }

    public function prenom() {
        return $this->infos_user['prenom'];
    }

    public function mail() {
        return $this->infos_user['mail'];
    }

    public function pays() {
        return $this->infos_user['pays'];
    }

    public function nb_parties() {
        return $this->infos_user['nb_parties'];
    }

    public function victoires() {
        return $this->infos_user['victoires'];
    }

    public function defaites() {
        return $this->infos_user['nb_parties'] - $this->infos_user['victoires'];
    }

    public function score_total() {
        return $this->infos_user['score_total'];
    }

    public function sexe() {
        if ($this->infos_user['sexe'] == 'H')
            return 'Homme';
        else if ($this->infos_user['sexe'] == 'F')
            return 'Femme';
        else
            return 'non renseigné';
    }

    public function age() {
        if ($this->infos_user['date_de_naissance'] == '0000-00-00')
            return 'non renseigné';
        $date = explode("-", $this->infos_user['date_de_naissance']);
        $anneeNaissance = $date[0];
        $moisNaissance = $date[1];
        $jourNaissance = $date[2];
        date_default_timezone_set("UTC");
        $anneeActuelle = date("Y");
        $moisActuel = date("n");
        $jourActuel = date("j");
        $age = $anneeActuelle - $anneeNaissance;
        if ($moisActuel <= $moisNaissance) {
            if ($moisActuel < $moisNaissance || $jourActuel < $jourNaissance) {
                $age--;
            }
        }
        return $age;
    }

    public function id() {
        return $this->infos_user['id'];
    }

    /* public function roleId(){
      return $this->props[self::$table_name.'_ROLE'];
      }

      public function role(){
      return Role::getWithId($this->roleId());
      }

      public function isAdmin(){
      return ($this->role()->isAdmin()) || ($this->role()->isSuperAdmin());
      }

      public function isSuperAdmin(){
      return $this->role()->isSuperAdmin();
      } */

    //************************************************************************************************************

    public static function isLoginUsed($login) {
        $used = false;
        $request = static::liste_logins();
        $data = $request->fetch(PDO::FETCH_OBJ);

        while (!empty($data)) {
            if ($data->LOGIN == $login) {
                $used = true;
            }
            $data = $request->fetch(PDO::FETCH_OBJ);
        }
        return $used;
    }

    public static function tryLogin($login, $password) {
        $request = static::try_login($login, $password);
        $data = $request->fetch(PDO::FETCH_OBJ);
        if (!empty($data)) {
            self::$instance = new self($data->NO_UTILISATEUR);
            return self::$instance;
        } else
            return null;
    }

    public static function create($login, $password, $mail, $nom, $prenom, $date_de_naissance, $sexe, $pays) {
        static::creer_user($login, $password, $mail, $nom, $prenom, $date_de_naissance, $sexe, $pays);
        return static::tryLogin($login, $password);
    }

    public function getUserInformation($id) {
        $request = static::infos_user($id);
        $data = $request->fetch(PDO::FETCH_OBJ);
        if (!empty($data)) {
            $this->infos_user['login'] = $data->LOGIN;
            $this->infos_user['password'] = $data->PASSWORD;
            $this->infos_user['mail'] = $data->MAIL;
            $this->infos_user['nom'] = $data->NOM;
            $this->infos_user['prenom'] = $data->PRENOM;
            $this->infos_user['id'] = $data->NO_UTILISATEUR;
            $this->infos_user['pays'] = $data->PAYS;
            $this->infos_user['sexe'] = $data->SEXE;
            $this->infos_user['date_de_naissance'] = $data->DATE_DE_NAISSANCE;
            $this->infos_user['nb_parties'] = $data->NB_PARTIES;
            $this->infos_user['victoires'] = $data->VICTOIRES;
            $this->infos_user['score_total'] = $data->SCORE_TOTAL;
        }
    }

    public static function tableau_classement() {
        $request = static::classement();
        $data = $request->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    //*********************************Methodes pour executer les requetes SQL******************************************************
    public static function creer_user($login, $password, $mail, $nom, $prenom, $date_de_naissance, $sexe, $pays) {
        $sql = self::$queries['CREER_USER'];
        $params = array(': login', ': password', ': mail', ': nom', ': prenom', ': date_de_naissance', ': sexe', ': pays');
        $args = array("'$login'", "'$password'", "'$mail'", "'$nom'", "'$prenom'", "'$date_de_naissance'", "'$sexe'", "'$pays'");
        parent::exec($sql, $params, $args);
    }

    public static function liste_logins() {
        $sql = self::$queries['LISTE_LOGINS'];
        return parent::exec($sql);
    }

    public static function user_list() {
        $sql = self::$queries['USER_LIST'];
        return parent::exec($sql);
    }

    public static function infos_user($id) {
        $sql = self::$queries['INFOS_USER'];
        $params = array(': no_utilisateur');
        $args = array($id);
        return parent::exec($sql, $params, $args);
    }

    public static function try_login($login, $password) {
        $sql = self::$queries['TRY_LOGIN'];
        $params = array(': login', ': password');
        $args = array("'$login'", "'$password'");
        return parent::exec($sql, $params, $args);
    }

    public static function classement() {
        $sql = self::$queries['CLASSEMENT'];
        return parent::exec($sql);
    }

    public static function update_password($newPassword) {
        $sql = self::$queries['UPDATE_PASSWORD'];
        $params = array(': password', ': no_utilisateur');
        $args = array("'$newPassword'", $_SESSION['user_id']);
        parent::exec($sql, $params, $args);
    }

    public static function updateProfile($newNom, $newPrenom, $newMail, $newPays) {
        $sql = self::$queries['UPDATE_PROFILE'];
        $params = array(': nom', ': prenom', ': mail', ': pays', ': no_utilisateur');
        $args = array("'$newNom'", "'$newPrenom'", "'$newMail'", "'$newPays'", $_SESSION['user_id']);
        parent::exec($sql, $params, $args);
    }

}

?>	