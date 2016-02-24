<?php

class DatabasePDO extends PDO {

    protected static $instance;

    public function __construct($address, $login, $password) {
        $instance = parent::__construct("mysql:host=" . $address . ";dbname=championteam", $login, $password, array(PDO:: MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

    public static function getCurrentDB() {
        if (!isset(self::$instance)) {
            self::$instance = new self('127.0.0.1', 'root', 'root');
        }
        return self::$instance;
    }

}

?>