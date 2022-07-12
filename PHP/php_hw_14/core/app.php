<?php

namespace core;

class App
{

    private $controllerName;
    private $actionName;

    public function __construct()
    {
        $this->controllerName = $_GET["controller"] ?? "default";
        $this->actionName = $_GET["action"] ?? "register";
    }

    public function run()
    {
        $className = ucfirst($this->controllerName) . "Controller";
        $class = "controllers\\" . $className;

        if (!file_exists($class . ".php")) throw new \Exception("Not found Exception");

        $controller = new $class();
        $controller->setControllerName($this->controllerName);

        echo $controller->{$this->actionName}();
    }
}
