<?php

namespace Figure;

class Textbox extends AbstractFigure
{
    protected $width, $height, $text;

    public function __construct($width = 0, $height = 0, $text = "")
    {
        $this->width = (int) $width;
        $this->height = (int) $height;
        $this->text = $text;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getText()
    {
        return $this->text;
    }
}