<?php

class Input extends Control
{
    protected $_name;
    protected $_value;

    function getName()
    {
        return $this->_name;
    }

    function getValue()
    {
        return $this->_value;
    }

    function setName($name)
    {
        $this->_name = $name;
    }

    function setValue($value)
    {
        $this->_value = $value;
    }
}
