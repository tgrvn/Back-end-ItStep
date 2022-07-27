<?php

namespace core;

include_once "./utils/url.php";
include_once "./utils/sorts.php";

class App
{
    private $controller;
    private $action;

    function __construct()
    {
        $this->controller = $_GET["controller"] ?? "default";
        $this->action = $_GET["action"] ?? "index";
    }

    public function run()
    {
        $className = ucfirst($this->controller) . "Controller";
        $class = "controllers\\$className";

        if (!file_exists($class . ".php")) throw new \Exception("Class not found");

        $controller = new $class();
        $controller->setControllerName($this->controller);

        echo $controller->{$this->action}();
    }
}
