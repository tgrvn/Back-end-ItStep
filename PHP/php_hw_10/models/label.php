<?php

class Label extends Control
{
    protected $_for;
    protected $_value;

    public function __construct($background, $width, $height, $value, $classObj)
    {
        $this->setBackground($background);
        $this->setWidth($width);
        $this->setHeight($height);
        $this->_value = $value;
        $this->_for = $classObj->getName();
    }

    function getParentName()
    {
        return $this->_for;
    }

    function render()
    {
        include_once "./views/_label.php";
    }
}
