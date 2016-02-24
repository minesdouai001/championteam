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
    public function username() {
        return $this->infos_user['username'];
    }


    public function id_user() {
        return $this->infos_user['id_user'];
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
            self::$instance = new self($data->id_user);
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
            $this->infos_user['username'] = $data->username;
            $this->infos_user['password'] = $data->password;
            $this->infos_user['id_user'] = $data->id_user;
            $this->infos_user['admin'] = $data->admin;
            $this->infos_user['user_id_user'] = $data->user_id_user;

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
        $params = array(': id_user');
        $args = array($id);
        return parent::exec($sql, $params, $args);
    }

    public static function try_login($username, $password) {
        $sql = self::$queries['TRY_LOGIN'];
        $params = array(': username', ': password');
        $args = array("'$username'", "'$password'");
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