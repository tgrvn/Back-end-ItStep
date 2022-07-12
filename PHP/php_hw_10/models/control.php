<?php

class Control
{
    protected $_background;
    protected $_width;
    protected $_height;

    function getBackground()
    {
        return $this->_background;
    }

    function getWidth()
    {
        return $this->_width;
    }

    function getHeight()
    {
        return $this->_height;
    }

    function setBackground($color)
    {
        $this->_background = $color;
    }

    function setWidth($px)
    {
        $this->_width = $px;
    }

    function setHeight($px)
    {
        $this->_height = $px;
    }
}
