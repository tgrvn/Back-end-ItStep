<?php

namespace core;

include_once "./core/url.php";

class Controller
{
    protected $layoutDir = "layouts";
    protected $layoutTemplate = "master";
    protected $controllerName;

    public function setControllerName($name)
    {
        $this->controllerName = $name;
    }

    public function setLayoutTemplate($name)
    {
        $this->layoutTemplate = $name;
    }

    protected function render($view, $params = [])
    {
        $layout = "views/" . $this->layoutDir . "/" . $this->layoutTemplate . ".php";
        $viewTemplate = "views/" . $this->controllerName . "/" . $view . ".php";

        ob_start();

        if (count($params) > 0) extract($params);
        include_once $viewTemplate;

        $content = ob_get_contents();

        ob_end_clean();

        $totalContent = "";

        ob_start();

        include_once $layout;
        $totalContent = ob_get_contents();

        ob_end_clean();

        return $totalContent;
    }
}
