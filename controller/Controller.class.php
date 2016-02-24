<?php

abstract class Controller extends MyObject {

    protected $request;

    public function __construct($request) {
        $this->request = $request;
    }

    abstract public function defaultAction($request);

    public function execute() {
        $actionName = $this->request->getActionName();
        if (method_exists($this, $actionName))
            $this->$actionName($this->request);
        else
            $this->defaultAction($this->request);
    }

    public function redirect($url) {
        header("location: $url");
    }

}

?>