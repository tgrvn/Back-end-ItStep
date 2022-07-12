<?php

class Text extends Input
{
    protected $_placeholder;

    public function __construct($background, $width, $height, $name, $value, $placeholder)
    {
        $this->setBackground($background);
        $this->setWidth($width);
        $this->setHeight($height);
        $this->setName($name);
        $this->setValue($value);
        $this->setPlaceholder($placeholder);
    }

    function getPlaceholder()
    {
        return $this->_placeholder;
    }

    function setPlaceholder($placeholder)
    {
        $this->_placeholder = $placeholder;
    }

    function render()
    {
        include_once "./views/_input.php";
    }
}
