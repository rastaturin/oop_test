<?php

namespace Figure;

class Circle extends AbstractFigure
{
    protected $radius;

    public function __construct($radius = 0)
    {
        $this->radius = (int) $radius;
    }

    public function getRadius()
    {
        return $this->radius;
    }
}