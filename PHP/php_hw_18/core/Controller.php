<?php

namespace core;

class Controller
{
    protected $layoutsDir = "layouts";
    protected $layoutsTemplate = "master";
    protected $controllerName;

    public function setControllerName($name)
    {
        $this->controllerName = $name;
    }

    public function render($view, $params = [])
    {
        $layout = "./views/" . $this->layoutsDir . "/" . $this->layoutsTemplate . ".php";
        $viewTemplate = "./views/" . $this->controllerName . "/" . $view . ".php";

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
