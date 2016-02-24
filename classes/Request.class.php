<?php

class Request {

    protected static $instance;
    protected $name;

    protected function __construct() {
        
    }

    public static function getCurrentRequest() {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function getControllerName() {
        if (isset($_GET['controller'])) {
            return $_GET['controller'];
        } else
            return "Anonymous";
    }

    public function getActionName() {
        if (isset($_GET['action'])) {
            return $_GET['action'];
        }
    }

    public function read($champ) {
        if (isset($_POST[$champ])) {
            return $_POST[$champ];
        }
        if (isset($_GET['user'])) {
            return $_GET['user'];
        }
    }

    public function write($key, $value) {
        $_GET[$key] = $value;
    }

    public function has($champ) {
        if (isset($_GET[$champ])) {
            return true;
        } else
            return false;
    }

}

?>			