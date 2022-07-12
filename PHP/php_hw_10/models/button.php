<?php

class Button extends Input
{
    public function __construct($background, $width, $height, $name, $value)
    {
        $this->setBackground($background);
        $this->setWidth($width);
        $this->setHeight($height);
        $this->setName($name);
        $this->setValue($value);
    }

    function render()
    {
        include_once "./views/_button.php";
    }
}
