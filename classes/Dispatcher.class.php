<?php

class Dispatcher extends MyObject {

    protected static $instance;

    public static function getCurrentDispatcher() {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public static function dispatch($request) {

        $nameRequest = $request->getControllerName();

        if (isset($_SESSION['user_id'])) {
            if ($nameRequest == 'Anonymous')
                $request->write('controller', 'user');
            $user_id = $_GET['user_id'] = $_SESSION['user_id'];
            $request->write('user', $user_id);
        }

        $nameRequest = $request->getControllerName();
        $controllerName = ucfirst($nameRequest) . 'Controller';

        if (!class_exists($controllerName))
            throw new Exception("$controllerName does not exist");    

        return new $controllerName($request);
    }

}

?>