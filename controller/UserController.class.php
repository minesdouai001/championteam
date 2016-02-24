<?php

class UserController extends Controller {

    protected $request;
    protected $id;
    protected static $args;

    public function __construct($request) {
        parent:: __construct($request);
        $this->request = $request;
        $user = NULL;
        if (isset($_SESSION['user_id'])) {
            $this->id = $_SESSION['user_id'];
            $user = new User($this->id);
        }
        self::$args['user'] = $user;        
    }

    public function defaultAction($args) {
        $this->profile($args);
    }

    public function profile($args) {
        $view = new UserView($this, 'userProfile', self::$args); //**************************$args?
        $view->setArg('id', $this->id);
        $view->setArg('login', self::$args['user']->login());
        $view->render();
    }

    

    public function leJeu($args) {
        $view = new UserView($this, 'leJeu', self::$args);
        $view->setArg('id', $this->id);
        $view->setArg('login', self::$args['user']->login());
        $view->render();
    }

    public function classement($args) {
        $view = new UserView($this, 'classement', self::$args);
        $view->setArg('id', $this->id);
        $view->setArg('login', self::$args['user']->login());
        $view->render();
    }

    public function statistiques($args) {
        $view = new UserView($this, 'statistiques', self::$args);
        $view->setArg('id', $this->id);
        $view->setArg('login', self::$args['user']->login());
        $view->render();
    }

    public function modificationProfil($args) {
        $view = new UserView($this, 'userProfileModification', self::$args);
        $view->setArg('id', $this->id);
        $view->setArg('login', self::$args['user']->login());
        $view->render();
    }

    public function nousContacter($args) {
        $view = new UserView($this, 'nousContacter', self::$args);
        $view->setArg('id', $this->id);
        $view->setArg('login', self::$args['user']->login());
        $view->render();
    }

    public function validerModificationProfil($args) {
        $newNom = $args->read('newNom');
        $newPrenom = $args->read('newPrenom');
        $newMail = $args->read('newMail');
        $newPays = $args->read('newPays');
        User::updateProfile($newNom, $newPrenom, $newMail, $newPays, $this->id);

        $newRequest = Request::getCurrentRequest();
        $newRequest->write('controller', 'user');
        $newRequest->write('user', $this->id);
        $newRequest->write('action', 'profile');
        Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
    }

    public function modificationPassword($args) {
        $view = new UserView($this, 'userPasswordModification', self::$args);
        $view->setArg('id', $this->id);
        $view->setArg('login', self::$args['user']->login());
        $view->render();
    }

    public function validerModificationPassword($args) {
        $password = $args->read('oldPassword');

        if (User::tryLogin(self::$args['user']->login(), $password) == null)
            $this->passwordError("Mot de passe actuel erroné");
        $newPassword = $args->read('newPassword');
        $newPassword2 = $args->read('newPassword2');

        $this->checkPasswordLength($newPassword);

        if ($newPassword != $newPassword2)
            $this->passwordError('Les mots de passe doivent correspondre');

        User::update_password($newPassword, $this->id);

        $newRequest = Request::getCurrentRequest();
        $newRequest->write('controller', 'user');
        $newRequest->write('user', $this->id);
        $newRequest->write('action', 'profile');
        Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
    }

    public function checkPasswordLength($password) {
        if ((strlen($password) < 6) || (strlen($password) > 18)) {
            $this->passwordError('Votre mot de passe doit contenir entre 6 et 18 caractères');
        }
    }

    public function passwordError($message) {
        $view = new UserView($this, 'userPasswordModification', self::$args);
        $view->setArg('id', $this->id);
        $view->setArg('login', self::$args['user']->login());
        $view->setArg('passwordErrorText', $message);
        $view->render();
        exit();
    }

}

?>