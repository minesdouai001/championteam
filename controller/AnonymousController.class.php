<?php

class AnonymousController extends Controller {

    protected $request;
    protected $dateMenu;
    protected $args = array();

    public function defaultAction($args) {
        $this->dateMenu = $args->read("dateMenu");
        $view = new AnonymousView($this, 'anonymous');
        $view->setArg('dateMenu', $this->dateMenu);
        $view->render();
       
    }

    public function inscription() {
        $view = new AnonymousView($this, 'inscription');
        $view->render();
    }
    
    public function createmenu() {
        $view = new AnonymousView($this, 'repas');
        $view->render();
    }

    public function connexion($args) {
        $login = $args->read('conLogin');
        $password = $args->read('conPassword');
        $user = User::tryLogin($login, $password);
        if (!isset($user))
            $this->conError('Login / Mot de passe incorrect');

        $_SESSION['user_id'] = $user->id();
        $newRequest = Request::getCurrentRequest();
        $newRequest->write('controller', 'user');
        $newRequest->write('user', $user->id()); //Peut etre a supprimer **************************************************************        
        $controller = Dispatcher::getCurrentDispatcher()->dispatch($newRequest);        
        $controller->redirect("index.php?controller=user&user=".$_SESSION['user_id']."&action=profile");
    }

    public function validateInscription($args) {
        $login = $args->read('inscLogin');
        if (substr_count($login, ' '))
            $this->inscError("Le login ne doit pas contenir d'espace");

        if (User::isLoginUsed($login))
            $this->inscError('Ce login est déjà utilisé');

        $password = $args->read('inscPassword');
        $password2 = $args->read('inscPassword2');

        if ($password != $password2)
            $this->inscError('Les mots de passe doivent correspondre');

        $this->checkPasswordLength($password);

        $nom = $args->read('nom');
        $prenom = $args->read('prenom');
        $mail = $args->read('mail');
        $date_de_naissance = $args->read('annee') . '-' . $args->read('mois') . '-' . $args->read('jour');
        $sexe = $args->read('sexe');
        $pays = $args->read('pays');
        $user = User::create($login, $password, $mail, $nom, $prenom, $date_de_naissance, $sexe, $pays);

        if (!isset($user))
            $this->inscError("Problème d'inscription");

        $_SESSION['user_id'] = $user->id();//Factoriser ces lignes jusque la fin
        $newRequest = Request::getCurrentRequest();
        $newRequest->write('controller', 'user');
        $newRequest->write('user', $user->id());
        $controller = Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
        $controller->redirect("index.php?controller=user&user=".$_SESSION['user_id']."&action=profile");
    }

    //factoriser ces 2 méthodes
    public function inscError($message) {
        $view = new AnonymousView($this, 'inscription');
        $view->setArg('inscErrorText', $message);
        $view->render();
        exit();
    }

    public function conError($message) {
        $view = new AnonymousView($this, 'anonymous');
        $view->setArg('conErrorText', $message);
        $view->render();
        exit();
    }

    public function checkPasswordLength($password) {
        if ((strlen($password) < 6) || (strlen($password) > 18)) {
            $this->inscError('Votre mot de passe doit contenir entre 6 et 18 caractères');
        }
    }

    public function leJeu() {
        $view = new AnonymousView($this, 'leJeu');
        $view->render();
    }

    public function faq() {
        $view = new AnonymousView($this, 'FAQ');
        $view->render();
    }

    public function nousContacter() {
        $view = new AnonymousView($this, 'nousContacter');
        $view->render();
    }

    public function classement() {
        $view = new AnonymousView($this, 'classement');
        $view->render();
    }

    public function statistiques() {
        $view = new AnonymousView($this, 'statistiques');
        $view->render();
    }

}

?>