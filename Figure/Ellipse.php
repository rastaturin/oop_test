<?php

namespace Figure;

class Ellipse extends AbstractFigure
{
    protected $horizontal_diameter, $vertical_diameter;

    public function __construct($horizontal_diameter = 0, $vertical_diameter = 0)
    {
        $this->horizontal_diameter = (int) $horizontal_diameter;
        $this->vertical_diameter = (int) $vertical_diameter;
    }

    public function getHDiameter()
    {
        return $this->horizontal_diameter;
    }

    public function getVDiameter()
    {
        return $this->vertical_diameter;
    }
}