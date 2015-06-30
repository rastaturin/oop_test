<?php

namespace Figure;

class Square extends AbstractFigure
{
    protected $size;

    public function __construct($size = 0)
    {
        $this->size = (int) $size;
    }

    public function getSize()
    {
        return $this->size;
    }
}