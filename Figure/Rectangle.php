<?php

namespace Figure;

class Rectangle extends  AbstractFigure
{
    protected $width, $height;

    public function __construct($width = 0, $height = 0)
    {
        $this->width = (int) $width;
        $this->height = (int) $height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }
}