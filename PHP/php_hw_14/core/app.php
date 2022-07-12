<?php

namespace core;

class App
{

    private $controllerName;
    protected $actionName;
    protected $layout = "master";

    public function __construct()
    {
        $this->controllerName = $_GET["controller"] ?? "default";
        $this->actionName = $_GET["action"] ?? "register";
    }

    public function setActionName($name)
    {
        $this->actionName = $name;
    }

    public function setController($name)
    {
        $this->controllerName = $name;
    }

    public function setLayout($name)
    {
        $this->layout = $name;
    }

    public function run()
    {
        $className = ucfirst($this->controllerName) . "Controller";
        $class = "controllers\\" . $className;

        if (!file_exists($class . ".php")) throw new \Exception("Not found Exception");

        $controller = new $class();

        $controller->setControllerName($this->controllerName);
        $controller->setLayoutTemplate($this->layout);

        echo $controller->{$this->actionName}();
    }
}
