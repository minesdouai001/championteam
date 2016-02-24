<?php

class GameController extends Controller {

    protected $request;
    protected $id, $no_partie, $cp, $players, $coupJoues;
    protected static $args;

    public function __construct($request) {
        parent:: __construct($request); //*****************************************************A factoriser
        $this->request = $request;
        $user = NULL;
        if (isset($_SESSION['user_id'])) {
            $this->id = $_SESSION['user_id'];
            $user = new User($this->id);
            $this->no_partie = Joueur::ma_partie();
            $this->cp = Partie::joueur_courant($this->no_partie);
            $this->players = Joueur::joueurs($this->no_partie);
            $this->coupJoues = Coup::tableau_coups_joues($this->no_partie);
        }
        self::$args['user'] = $user;
    }

    public function defaultAction($args) {
        if (isset($_POST['dernier_chemin'])) {
            $lastCoup = $_POST['dernier_chemin'];
            Coup::attribuer_coup($lastCoup, $this->no_partie);
            Partie::joueur_suivant($this->no_partie);
            unset($_POST['dernier_chemin']);

            $newRequest = Request::getCurrentRequest();
            $newRequest->write('controller', 'game');
            $newRequest->write('user', $this->id);
            $newRequest->write('action', 'jouer');
            $controller = Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
            $controller->redirect("index.php?controller=game&user=" . $_SESSION['user_id'] . "&action=jouer");
        }
        $view = new UserView($this, 'game', self::$args);
        $view->setArg('id', $this->id);
        $view->setArg('login', self::$args['user']->login());
        $view->setArg('cp', $this->cp);
        $view->setArg('players', $this->players);
        $view->setArg('coupJoues', $this->coupJoues);
        $view->render();
    }

    public function piocherCarteWagon($args) {


        if ($this->cp == $_SESSION['user_id']) {
            CarteWagon::piocher($this->no_partie);
            Partie::joueur_suivant($this->no_partie);
            $this->cp = Partie::joueur_courant($this->no_partie);
        }
        $newRequest = Request::getCurrentRequest();
        $newRequest->write('controller', 'game');
        $newRequest->write('user', $this->id);
        $newRequest->write('action', 'jouer');
        $controller = Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
        $controller->redirect("index.php?controller=game&user=" . $_SESSION['user_id'] . "&action=jouer");         
    }
    
    public function piocherCarteDestination() {
        if ($this->cp == $_SESSION['user_id']) {
            CarteDestination::piocher($this->no_partie);
            Partie::joueur_suivant($this->no_partie);
            $this->cp = Partie::joueur_courant($this->no_partie);
        }
        $newRequest = Request::getCurrentRequest();
        $newRequest->write('controller', 'game');
        $newRequest->write('user', $this->id);
        $newRequest->write('action', 'jouer');
        $controller = Dispatcher::getCurrentDispatcher()->dispatch($newRequest);
        $controller->redirect("index.php?controller=game&user=" . $_SESSION['user_id'] . "&action=jouer");
    }
    

}

?>